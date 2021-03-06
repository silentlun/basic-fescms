<?php

namespace app\models;

use Yii;
use app\helpers\Tree;
use yii\behaviors\TimestampBehavior;
use app\behaviors\AttachmentBehavior;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $catid
 * @property int $parentid
 * @property string $catname
 * @property string $catdir
 * @property string $category_template
 * @property string $list_template
 * @property string $show_template
 * @property int $listorder
 */
class Category extends \yii\db\ActiveRecord
{
    const TYPE_CATEGORY = 0;
    const TYPE_PAGE = 1;
    const MENU_INACTIVE = 0;
    const MENU_ACTIVE = 1;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'attachment' => [
                'class' => AttachmentBehavior::className(),
                'module' => 'cat',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catname', 'catdir'], 'required'],
            [['catname', 'catdir'], 'trim'],
            [['catname', 'catdir'], 'string', 'max' => 30],
            [['parentid', 'type', 'sort', 'ismenu'], 'integer'],
            [['parentid', 'type', 'sort'], 'default', 'value' => 0],
            [['image', 'category_template', 'list_template', 'show_template', 'page_template'], 'string', 'max' => 255],
            ['ismenu', 'default', 'value' => self::MENU_ACTIVE],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'catid' => Yii::t('app', 'Catid'),
            'type' => Yii::t('app', 'Category Type'),
            'parentid' => Yii::t('app', 'Parentid'),
            'catname' => Yii::t('app', 'Catname'),
            'catdir' => Yii::t('app', 'Catdir'),
            'category_template' => Yii::t('app', 'Category Template'),
            'list_template' => Yii::t('app', 'List Template'),
            'show_template' => Yii::t('app', 'Show Template'),
            'page_template' => Yii::t('app', 'Page Template'),
            'sort' => Yii::t('app', 'Sort'),
            'image' => '????????????',
            'ismenu' => '????????????',
        ];
    }
    
    public static function getTypeLabels()
    {
        return [
            self::TYPE_CATEGORY => '????????????',
            self::TYPE_PAGE => '?????????',
        ];
    }
    
    protected static function _getCategory($parentid = null, $ismenu = null){
        $query = self::find();
        $query->andFilterWhere(['parentid' => $parentid]);
        $query->andFilterWhere(['ismenu' => $ismenu]);
        return $query->orderBy('sort asc,id asc')->indexBy('id')->asArray()->all();
    }
    
    /**
     * ??????????????????
     */
    public static function getCategory(){
        return self::_getCategory('', 1);
    }
    
    /**
     * ?????????????????????
     */
    public static function getChildCategory($parentid){
        return self::_getCategory($parentid);
    }
    
    /**
     * ????????????????????????
     */
    public static function getCategoryTree(){
        $treeObj = new Tree(self::_getCategory());
        $treeObj->nbsp = '  ';
        return $treeObj->getTree(0, 'catname');
    }
    
    /**
     * ????????????????????????
     */
    public static function getCategoryGrid(){
        $treeObj = new Tree(self::_getCategory());
        $treeObj->icon = ['&nbsp;&nbsp;&nbsp;??? ','&nbsp;&nbsp;&nbsp;?????? ','&nbsp;&nbsp;&nbsp;?????? '];
        $treeObj->nbsp = '&nbsp&nbsp&nbsp';
        return $treeObj->getGridTree(0, 'catname');
    }

}
