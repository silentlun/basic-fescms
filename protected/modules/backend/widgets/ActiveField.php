<?php
/**
 * ActiveField.php
 * @author: allen
 * @date  2020年6月12日上午9:03:33
 * @copyright  Copyright igkcms
 */
namespace backend\widgets;

use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;

class ActiveField extends \yii\bootstrap5\ActiveField
{
    public function init()
    {
        parent::init();
    }
    
    /**
     * {@inheritdoc}
     */
    public function linkInput($options = [])
    {
        $options = array_merge($this->inputOptions, $options);
        
        if ($this->form->validationStateOn === ActiveForm::VALIDATION_STATE_ON_INPUT) {
            $this->addErrorClassIfNeeded($options);
        }
        
        $this->addAriaAttributes($options);
        $this->adjustLabelFor($options);
        $options['disabled'] = $this->model->islink ? false : true;
        
        $inputId = Html::getInputId($this->model, $this->attribute);
        $inputHtml = Html::beginTag('div', ['class' => 'input-group-text']) . "\n";
        $inputHtml .= Html::activeCheckbox($this->model, 'islink', ['onclick' => "ruselinkurl('{$inputId}');", 'id' => 'islink']);
        $inputHtml .= Html::endTag('div') . "\n";
        
        $html = Html::beginTag('div', ['class' => 'input-group']) . "\n" .
            Html::activeTextInput($this->model, $this->attribute, $options) . "\n";
        $html .= $inputHtml . "\n";
        $html .= Html::endTag('div') . "\n";
        
        $this->parts['{input}'] = $html;
        return $this;
        
    }
    
    
    
    
}