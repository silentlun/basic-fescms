<?php

namespace backend\models;

use Yii;
use app\helpers\Tree;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parentid
 * @property string $url
 * @property integer $listorder
 * @property integer $display
 */
class Menu extends \yii\db\ActiveRecord
{
    const DISPLAY_YES = 1;
    const DISPLAY_NO = 0;
    const MENU_SYSTEM = 0;
    const MENU_EVENT = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'route'], 'required'],
            [['parentid', 'type', 'sort', 'display'], 'integer'],
            [['name', 'route', 'icon', 'data'], 'string', 'max' => 255],
            ['parentid', 'default', 'value' => 0],
            [['sort','type'], 'default', 'value' => 0],
            ['display', 'default', 'value' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'parentid' => Yii::t('app', 'Parentid'),
            'route' => Yii::t('app', 'Route'),
            'data' => '参数',
            'type' => '菜单类别',
            'sort' => Yii::t('app', 'Listorder'),
            'display' => Yii::t('app', 'Display'),
        ];
    }
    
    public static function getMenuType()
    {
        return [
            self::MENU_SYSTEM => '系统菜单',
            self::MENU_EVENT => '活动菜单',
        ];
    }
    
    /**
     * 获取分类数组
     */
    protected static function _getMenu(){
        return self::find()->orderBy('sort asc,id asc')->indexBy('id')->asArray()->all();
    }
    /**
     * 获取分类数组
     */
    public static function getMenu(){
        return self::_getMenu();
    }
    /**
     * 获取分类树形结构
     */
    public static function getMenuTree(){
        $treeObj = new Tree(self::_getMenu());
        $treeObj->nbsp = '  ';
        return $treeObj->getTree(0);
    }
    /**
     * 获取分类树形结构
     */
    public static function getMenuGrid(){
        $treeObj = new Tree(self::_getMenu());
        $treeObj->icon = ['&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ '];
        $treeObj->nbsp = '&nbsp&nbsp&nbsp';
        return $treeObj->getGridTree(0);
    }
    public static function getDashboardMenu($type)
    {
        $menus = self::find()->where(['display' => self::DISPLAY_YES, 'type' => $type])->orderBy("sort ASC,id ASC")->all();
        $permissions = Yii::$app->getAuthManager()->getPermissionsByUser(Yii::$app->user->id);
        $permissions = array_keys($permissions);
        
        if (!in_array(Yii::$app->user->id, Yii::$app->getBehavior('access')->superAdminUserIds)) {
            $newMenu = [];
            foreach ($menus as $_k => $menu) {
                
                $url = $menu->route;
                if (in_array($url, $permissions)) {
                    $newMenu[$_k] = $menu;
                }
            }
            return $newMenu;
        }
        return $menus;
    }

    public function beforeSave($insert)
    {
        if (strncmp($this->route, '/', 1) !== 0) $this->route = '/'.$this->route;
        $auth = \Yii::$app->authManager;
        if ($this->isNewRecord){
            if ($auth->getPermission($this->route) === null && $this->route) {
                $permission = $auth->createPermission($this->route);
                $permission->description = $this->name;
                $auth->add($permission);
            }
        }else{
            $name = $this->getOldAttribute('route');
            if ($name) {
                $permission = $auth->getPermission($name);
                if( $permission->name != $this->route ){//修改权限名称
                    $permission->name = $this->route;
                    $permission->description = $this->name;
                    $auth->update($name, $permission);
                }
            }
        }
        return parent::beforeSave($insert);
    }
    
    public function beforeDelete(){
        $auth = \Yii::$app->authManager;
        $permission = $auth->getPermission($this->route);
        $auth->remove($permission);
        return parent::beforeDelete();
    }
}
