<?php
/**
 * Generator.php
 * @author: allen
 * @date  2021年3月17日上午10:48:30
 * @copyright  Copyright igkcms
 */

namespace backend\components\gii\crud;

use ReflectionClass;

class Generator extends \yii\gii\generators\crud\Generator
{
    /**
     * @param string $attribute
     * @return string
     */
    public function generateActiveSearchField($attribute)
    {
        $tableSchema = $this->getTableSchema();
        if ($tableSchema === false) {
            return "\$form->field(\$model, '$attribute', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'options'=>['class'=>'col-sm-3']])";
        }

        $column = $tableSchema->columns[$attribute];
        if ($column->phpType === 'boolean') {
            return "\$form->field(\$model, '$attribute')->checkbox()";
        }

        return "\$form->field(\$model, '$attribute', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'options'=>['class'=>'col-sm-3']])";
    }

    public function formView()
    {
        $class = new ReflectionClass(\yii\gii\generators\crud\Generator::className());

        return dirname($class->getFileName()) . '/form.php';
    }

}