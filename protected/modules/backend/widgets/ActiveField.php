<?php
/**
 * ActiveField.php
 * @author: allen
 * @date  2020年6月12日上午9:03:33
 * @copyright  Copyright igkcms
 */
namespace backend\widgets;

use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

class ActiveField extends \yii\bootstrap4\ActiveField
{
    public function init()
    {
        parent::init();
    }
    
    /**
     * {@inheritdoc}
     */
    public function checkboxList($items, $options = [])
    {
        if (!isset($options['item'])) {
            $this->template = str_replace("\n{error}", '', $this->template);
            $itemOptions = isset($options['itemOptions']) ? $options['itemOptions'] : [];
            $encode = ArrayHelper::getValue($options, 'encode', true);
            $itemCount = count($items) - 1;
            $error = $this->error()->parts['{error}'];
            $options['item'] = function ($i, $label, $name, $checked, $value) use (
                $itemOptions,
                $encode,
                $itemCount,
                $error
                ) {
                    $options = array_merge($this->checkOptions, [
                        'label' => $encode ? Html::encode($label) : $label,
                        'value' => $value
                    ], $itemOptions);
                    $wrapperOptions = ArrayHelper::remove($options, 'wrapperOptions', ['class' => ['custom-control', 'custom-checkbox']]);
                    if ($this->inline) {
                        Html::addCssClass($wrapperOptions, 'custom-control-inline');
                    }
                    
                    $html = Html::beginTag('div', $wrapperOptions) . "\n" .
                        Html::checkbox($name, $checked, $options) . "\n";
                        $html .= Html::endTag('div') . "\n";
                        if ($itemCount === $i) {
                            $html .= $error . "\n";
                        }
                        
                        return $html;
            };
        }
        
        parent::checkboxList($items, $options);
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function radioList($items, $options = [])
    {
        if (!isset($options['item'])) {
            $this->template = str_replace("\n{error}", '', $this->template);
            $itemOptions = isset($options['itemOptions']) ? $options['itemOptions'] : [];
            $encode = ArrayHelper::getValue($options, 'encode', true);
            $itemCount = count($items) - 1;
            $error = $this->error()->parts['{error}'];
            $options['item'] = function ($i, $label, $name, $checked, $value) use (
                $itemOptions,
                $encode,
                $itemCount,
                $error
                ) {
                    $options = array_merge($this->radioOptions, [
                        'label' => $encode ? Html::encode($label) : $label,
                        'value' => $value
                    ], $itemOptions);
                    $wrapperOptions = ArrayHelper::remove($options, 'wrapperOptions', ['class' => ['custom-control', 'custom-radio']]);
                    if ($this->inline) {
                        Html::addCssClass($wrapperOptions, 'custom-control-inline');
                    }
                    
                    $html = Html::beginTag('div', $wrapperOptions) . "\n" .
                        Html::radio($name, $checked, $options) . "\n";
                        $html .= Html::endTag('div') . "\n";
                        if ($itemCount === $i) {
                            $html .= $error . "\n";
                        }
                        
                        return $html;
            };
        }
        
        parent::radioList($items, $options);
        return $this;
    }
    
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
        $inputHtml = Html::beginTag('div', ['class' => 'input-group-append']) . "\n";
        $inputHtml .= Html::tag('span', Html::activeCheckbox($this->model, 'islink', ['onclick' => "ruselinkurl('{$inputId}');", 'id' => 'islink']), ['class' => 'input-group-text']);
        $inputHtml .= Html::endTag('div') . "\n";
        
        $html = Html::beginTag('div', ['class' => 'input-group']) . "\n" .
            Html::activeTextInput($this->model, $this->attribute, $options) . "\n";
        $html .= $inputHtml . "\n";
        $html .= Html::endTag('div') . "\n";
        
        $this->parts['{input}'] = $html;
        return $this;
        
    }
    
    
    
    
}