<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;
use app\models\Category;
use app\helpers\Constants;
use app\helpers\Util;

/* @var $this yii\web\View */
/* @var $model common\models\Content */
/* @var $form yii\widgets\ActiveForm */

$categorys = Category::getCategory();


if ($model->isNewRecord) {
    $model->catid = Yii::$app->request->get('catid');
}

/* if ($model->posid && !is_array($model->posid)) {
 $model->posid = explode(',', $model->posid);
 } */
$inputdisabled = $model->islink ? false : true;

$baseTemplate = "{label}\n<div class=\"col-sm-10\">{input}\n{hint}\n{error}</div>\n";
$optionTemplate = "{label}\n<div class=\"col-sm-12\">{input}\n{hint}\n{error}</div>";
$editorTemplate = "{label}\n<div class=\"col-sm-10\">{input}\n{error}\n<div class=\"alert alert-warning no-margins form-inline\"><label><input name=\"add_introduce\" type=\"checkbox\"  value=\"1\" checked>是否截取内容</label><input type=\"text\" name=\"introcude_length\" value=\"100\" size=\"3\" class=\"form-control input-sm\">字符至内容摘要
<label><input type='checkbox' name='auto_thumb' value=\"1\" checked>是否获取内容第</label><input type=\"text\" name=\"auto_thumb_no\" value=\"1\" size=\"2\" class=\"form-control input-sm\">张图片作为标题图片</div></div>";
?>
<?= $this->render('/widgets/_page-heading') ?>
<?php $form = ActiveForm::begin([
			  'fieldConfig' => [
			      //'template' => $baseTemplate,
				  //'labelOptions' => ['class' => 'col-sm-2 control-label'],              
			  ],
			  'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
  ]); ?>
<div class="row">
  
  <div class="col-md-9">
    <div class="card">
      <ul class="nav nav-tabs page-tabs">
        <li class="nav-item active"><a class="nav-link">基本信息</a></li>
      </ul>
      <div class="card-body p-m">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
        
        
        <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
        <?= $form->field($model, 'content', ['template' => $editorTemplate])->widget('backend\widgets\ueditor\Ueditor',[
			'options'=>[
				'initialFrameWidth' => '100%',
				'initialFrameHeight' => 400
			]
		]) ?>
		<?= $form->field($model, 'tagValues')->checkboxList(\app\models\Tag::getTags()) ?>
		<div class="form-group row field-content-linkurl">
        <label class="col-sm-2  col-form-label" for="content-linkurl">转向链接</label>
        <div class="col-sm-10">
        	<div class="input-group">
        	<?= Html::activeInput('text', $model, 'linkurl', ['class' => 'form-control', 'id' => 'linkurl', 'disabled' => $inputdisabled]) ?>
              <div class="input-group-append">
                <span class="input-group-text"><?= Html::activeCheckbox($model, 'islink', ['onclick' => 'ruselinkurl();', 'id' => 'islink']);?></span>
              </div>
            </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <ul class="nav nav-tabs page-tabs">
        <li class="nav-item active"><a class="nav-link">属性</a></li>
      </ul>
      <div class="card-body p-m">
        <label>栏目分类</label>
        <?= $form->field($model, 'catid',['template' => $optionTemplate])->widget('backend\widgets\CategorySelect',['categorys'=>$categorys])->label(false) ?>
        
        <label>缩略图</label>
        <?= $form->field($model, 'thumb',['template' => $optionTemplate])->widget('backend\widgets\webuploader\Webuploader',['config'=>['fileSingleSizeLimit'=>Yii::$app->config->site_upload_maxsize,'acceptExtensions'=>Yii::$app->config->site_upload_allowext]])->label(false) ?>
        
        <label>内容页模板</label>
        <?= $form->field($model, 'template',['template' => $optionTemplate])->dropdownList(Util::showTemplate('show'),['prompt'=>'选择模板'])->label(false);?>
        
        <label>状态</label>
        <div class="form-horizontal">
          <?= $form->field($model, 'status',['template' => $optionTemplate])->inline()->radioList(Constants::getContentStatus())->label(false) ?>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-block']) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
<?php ActiveForm::end(); ?>

