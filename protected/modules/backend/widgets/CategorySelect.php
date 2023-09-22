<?php
/**
 * CategorySelect.php
 * @author: allen
 * @date  2020年4月23日下午2:20:42
 * @copyright  Copyright igkcms
 */
namespace backend\widgets;


use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Url;

class CategorySelect extends InputWidget
{
    public $defaultRoute = 'category/treeview';
    public $categorys = [];
    public function init()
    {
        parent::init();
    }
    public function run()
    {
        $inputValue = Html::getAttributeValue($this->model, $this->attribute);
        $catname = $inputValue ? $this->categorys[$inputValue]['catname'] : '';
        $buttonOptions = [
            'class' => 'btn btn-success',
            'data-remote' => Url::toRoute($this->defaultRoute),
            'data-bs-toggle' => 'modal',
            'data-bs-target' => '#ajaxModal',
        ];
        //$buttonHtml = Html::beginTag('div', ['class' => 'input-group-text']) . "\n";
        $buttonHtml = Html::button('<i class="fa fa-send"></i> 切换', $buttonOptions);
        //$buttonHtml .= Html::endTag('div') . "\n";
        
        $inputHtml = Html::beginTag('div', ['class' => 'input-group']) . "\n";
        $inputHtml .= Html::input('text', 'catname', $catname, ['class' => 'form-control', 'placeholder' => '选择栏目', 'disabled' => true]) . "\n";
        $inputHtml .= $buttonHtml;
        $inputHtml .= Html::endTag('div') . "\n";
        $inputHtml .= Html::activeHiddenInput($this->model, $this->attribute);

        return $inputHtml;
        
    }
}