<?php
/**
 * ActiveForm.php
 * @author: allen
 * @date  2020年6月11日下午5:41:27
 * @copyright  Copyright igkcms
 */
namespace backend\widgets;

use Yii;

class ActiveForm extends \yii\bootstrap4\ActiveForm
{
    public $layout = 'horizontal';
    public $fieldClass = 'backend\widgets\ActiveField';
    public $options = [];
    /* public $fieldConfig = [
        'template' => "{label}\n<div class=\"col-md-8\">{input}{hint}{error}</div>",
        'labelOptions' => ['class' => 'col-md-2 control-label'],
    ]; */
    public $fieldConfig = [
        'horizontalCssClasses' => [
            'offset' => ['col-md-8', 'offset-md-2'],
            'label' => 'col-md-2 col-form-label',
            'wrapper' => 'col-md-8',
         ],
    ];
    
    
    /**
     * 生成表单确认和重置按钮
     *
     * @param array $options
     * @return string
     */
    
    public function defaultButtons(array $options = [])
    {
        $options['size'] = isset($options['size']) ? $options['size'] : 2;
        $groupClass = $this->layout == self::LAYOUT_HORIZONTAL ? ' row' : '';
        return '<div class="form-group'.$groupClass.'">
                    <div class="col-md-' . $options['size'] . ' offset-md-2">
                        <button class="btn btn-primary btn-block" type="submit">' . Yii::t('app', 'Save') . '</button>
                    </div>
                </div>';
    }
}