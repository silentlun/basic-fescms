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
    $model->status = $model::STATUS_ACTIVE;
}

$optionTemplate = "{label}\n<div class=\"col\">{input}\n{hint}\n{error}</div>";
$editorHint = "<div class=\"mt-2 form-inline\"><label><input name=\"add_introduce\" type=\"checkbox\"  value=\"1\" checked>是否截取内容</label><input type=\"text\" name=\"introcude_length\" value=\"100\" size=\"3\" class=\"form-control input-xs\">字符至内容摘要
<label class='ml-3'><input type='checkbox' name='auto_thumb' value=\"1\" checked>是否获取内容第</label><input type=\"text\" name=\"auto_thumb_no\" value=\"1\" size=\"2\" class=\"form-control input-xs\">张图片作为标题图片</div>";
?>
<?= $this->render('/widgets/_page-heading') ?>
<?php $form = ActiveForm::begin([
    'fieldConfig' => [
        'labelOptions' => ['class' => 'col-md-2 col-form-label'],
    ],
	'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
  ]); ?>
<div class="row">
  
  <div class="col-md-9">
    <div class="card">
      <ul class="nav nav-tabs page-tabs">
        <li class="nav-item active"><a class="nav-link">基本信息</a></li>
      </ul>
      <div class="card-body p-3">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'keywords')->textInput(['maxlength' => true])->hint('多关键词之间用空格或者英文逗号“,”隔开') ?>
        
        
        <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
        <?= $form->field($model, 'content')->widget('backend\widgets\ueditor\Ueditor',[
			'options'=>[
				'initialFrameWidth' => '100%',
				'initialFrameHeight' => 400
			]
        ])->hint($editorHint) ?>
		<?= $form->field($model, 'tagValues')->checkboxList(\app\models\Tag::getTags()) ?>
		
		<?= $form->field($model, 'url')->linkInput() ?>
		
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <ul class="nav nav-tabs page-tabs">
        <li class="nav-item active"><a class="nav-link">属性</a></li>
      </ul>
      <div class="card-body p-3">
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
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary btn-block']) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
<?php ActiveForm::end(); ?>

