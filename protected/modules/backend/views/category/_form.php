<?php

use backend\widgets\ActiveForm;
//use yii\bootstrap4\ActiveForm;
use app\helpers\Util;
use app\helpers\Constants;
$model->type = $model->type ? $model->type : 0;
/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
//print_r(Util::showTemplate('category'));exit;
?>

<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  
  <ul class="nav nav-tabs page-tabs">
    <li class="nav-item active"><a class="nav-link"><?= $this->params['subtitle'] ?></a></li>
  </ul>
  <div class="card-body">
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'type')->inline()->radioList($model::getTypeLabels()) ?>

    <?= $form->field($model, 'parentid')->dropdownList($model::getCategoryTree(),['prompt'=>'作为一级菜单']);?>

    <?= $form->field($model, 'catname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catdir')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'image')->widget('backend\widgets\webuploader\Webuploader',['config'=>['fileSingleSizeLimit'=>Yii::$app->config->site_upload_maxsize,'acceptExtensions'=>Yii::$app->config->site_upload_allowext]]) ?>
    
<div id="category-list-template" <?php if ($model->type == 1) echo 'style="display: none"';?>>
    
    
    <?= $form->field($model, 'list_template')->dropdownList(Util::showTemplate('list'),['prompt'=>'选择模板']);?>
    
    <?= $form->field($model, 'show_template')->dropdownList(Util::showTemplate('show'),['prompt'=>'选择模板']);?>
</div>
<div id="category-page-template" <?php if ($model->type == 0) echo 'style="display: none"';?>>
    <?= $form->field($model, 'page_template')->dropdownList(Util::showTemplate('page'),['prompt'=>'选择模板']);?>
</div>
	<?= $form->field($model, 'ismenu')->inline()->radioList(Constants::getYesNoItems()) ?>
	
    <?= $form->field($model, 'sort')->textInput() ?>


    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>
