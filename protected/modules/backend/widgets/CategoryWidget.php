<?php
/**
 * CategoryTree.php
 * @author: allen
 * @date  2020年4月24日下午2:10:00
 * @copyright  Copyright igkcms
 */
namespace backend\widgets;


use yii\base\Widget;
use yii\bootstrap4\Html;

class CategoryWidget extends Widget
{
    public $data = [];
    public $firstLevelLiTemplate = '<li><a href="javascript:;">{name}{arrow}</a>{child}</li>';
    public $liTemplate = '<li><a href="javascript:;">{name}{arrow}</a>{list}</li>';
    public $ulTemplate = '<ul class="list-unstyled nav-second-level category-tree">{list}</ul>';
    
    public function run()
    {
        parent::run();
        $list = '';
        foreach ($this->data as $id => $v){
            if ($v['parent_id'] != 0) continue;
            $arrow = '';
            $child = $this->getChild($id);
            if ($child) {
                $arrow = '<span class="fa arrow"></span>';
                $name = "<i class=\"fa fa-folder\"></i>{$v['catname']}";
            } else {
                $arrow = '';
                //$name = "<label class=\"radio radio-primary\"><input type=\"radio\" name=\"catid\" value=\"{$v['id']}\" data-name=\"{$v['catname']}\"><span><i class=\"fa fa-folder\"></i>{$v['catname']}</span></label>";
                $name = <<< HTML
<label class="custom-control custom-radio">
  <input type="radio" name="catid" class="custom-control-input" value="{$v['id']}" data-name="{$v['catname']}">
  <span class="custom-control-label"><i class="fa fa-folder"></i>{$v['catname']}</span>
</label>
HTML;
            }
            $list .= str_replace(['{arrow}', '{name}', '{child}'], [$arrow, $name, $child], $this->firstLevelLiTemplate);
        }
        return $list;
    }
    
    public function getChild($myid){
        $sublist = '';
        $arrow = '';
        $substr = '';
        foreach ($this->data as $id => $_v){
            if ($_v['parent_id'] != $myid) continue;
            $child = $this->getChild($id);
            if ($child) {
                $arrow = '<span class="fa arrow"></span>';
                $name = "<i class=\"fa fa-folder\"></i>{$_v['catname']}";
            } else {
                $arrow = '';
                //$name = "<label class=\"radio radio-primary\"><input type=\"radio\" name=\"catid\" value=\"{$_v['id']}\" data-name=\"{$_v['catname']}\"><span><i class=\"fa fa-folder\"></i>{$_v['catname']}</span></label>";
                $name = <<< HTML
<label class="custom-control custom-radio">
  <input type="radio" name="catid" class="custom-control-input" value="{$_v['id']}" data-name="{$_v['catname']}">
  <span class="custom-control-label"><i class="fa fa-folder"></i>{$_v['catname']}</span>
</label>
HTML;
            }
            $sublist .= str_replace(['{arrow}', '{name}', '{list}'], [$arrow, $name, $child], $this->liTemplate);
        }
        if ($sublist) {
            $substr = str_replace('{list}', $sublist, $this->ulTemplate);
        }
        
        return $substr;
    }
}