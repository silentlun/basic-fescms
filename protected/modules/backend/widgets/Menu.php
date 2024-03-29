<?php
namespace backend\widgets;

use Yii;
use backend\models\Menu as BackendMenuModel;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Menu extends \yii\base\Widget
{
    public $items = [];
    
    public $subTemplate = "\n<ul class=\"side-nav-second-level\">\n{items}\n</ul>\n";
    
    public $dropDownCaret = '<span class="menu-arrow"></span>';
    
    public $linkIcon = '<i class="fa {icon}"></i>';
    
    public function init()
    {
        $this->items = $this->getMenus();
        
    }
    
    public function run()
    {
        return $this->renderItems();
    }
    
    public function renderItems()
    {
        $lines = '';
        $items = $this->normalizeItems();
        //print_r($items);exit;
        foreach ($items as $key => $item) {
            $lines .= Html::tag('li', $this->renderItem($item), ['class' => 'side-nav-item']);
        }
        return $lines;
    }
    
    public function renderItem($item)
    {
        $linkOptions = [];
        $linkIcon = strtr($this->linkIcon, [
            '{icon}' => $item['icon'],
        ]);
        $items = ArrayHelper::getValue($item, 'items');
        if (empty($items)) {
            $items = '';
            $linkRoute = $item['route'];
            $linkOptions = ['class' => 'J_menuItem'];
            $this->dropDownCaret = '';
        } else {
            $items = $this->renderDropdown($items);
            $linkRoute = '#sidebar'.$item['id'];
            $linkOptions = ['class' => 'side-nav-link', 'data-bs-toggle' => 'collapse'];
        }
        
        return Html::a($this->dropDownCaret.$linkIcon.'<span>'.$item['name'].'</span>', $linkRoute, $linkOptions).$items;
        
    }
    
    /* 
     *  
     *  */
    protected function renderDropdown($items)
    {
        $lines = '';
        foreach ($items as $item) {
            $lines .= Html::tag('li', Html::a($item['name'], $item['route'], ['class' => 'J_menuItem']));
        }
        $subHtml = strtr($this->subTemplate, ['{items}' => $lines]);
        return Html::tag('div', $subHtml, ['class' => 'collapse', 'id' => 'sidebar'.$item['parent_id']]);
    }
    
    protected function normalizeItems($parentId = 0)
    {
        $items = [];
        foreach ($this->items as $key => $item) {
            if ($item['parent_id'] != $parentId) continue;
            $array['name'] = $item['name'];
            $array['route'] = [$item['route']];
            $array['icon'] = $item['icon'];
            $array['id'] = $item['id'];
            $array['parent_id'] = $item['parent_id'];
            $subMenu = $this->normalizeItems($item['id']);
            //print_r($subMenu);
            if ($subMenu) {
                $array['items'] = $subMenu;
            }
            $items[] = $array;
            unset($this->items[$key],$array);
        }
        return $items;
    }
    

    public function getMenus()
    {
        $menus = BackendMenuModel::find()->where(['display' => BackendMenuModel::DISPLAY_YES])->orderBy("sort asc")->asArray()->all();
        $permissions = Yii::$app->authManager->getPermissionsByUser(Yii::$app->admin->id);
        $permissions = array_keys($permissions);

        if (Yii::$app->admin->id !== 1) {
            $newMenu = [];
            foreach ($menus as $_k => $menu) {
                if (in_array($menu['route'], $permissions)) {
                    $newMenu[$_k] = $menu;
                }
            }
            return $newMenu;
        }
        return $menus;
    }
}