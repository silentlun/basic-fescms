<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Setting;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Configs');
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = '自定义设置';
?>
<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  <?php $form = ActiveForm::begin(); ?>
  <div class="card-body">
    <h4 class="header-title">自定义设置</h4>
      <?php foreach ($settings as $index => $setting):
      $deleteUrl = Url::toRoute(['custom-delete', 'id' => $setting->id]);
      $editUrl = Url::toRoute(['custom-update', 'id' => $setting->id]);
      $template = "{label}\n<div class=\"col-md-6\">{input}\n{error}</div>\n{hint}<div class='col-md-2'><p class='form-control-plaintext'><a href='{$editUrl}' title='编辑' data-bs-toggle=\"modal\" data-bs-target=\"#ajaxModalLg\" data-remote=\"{$editUrl}\"><i style='margin-right: 10px;' class='fa fa-edit'></i></a> <a class='btn-delete' href='{$deleteUrl}' data-confirm='" . Yii::t('app', 'Are you sure you want to delete this item?') . "' title='' data-method='' data-pjax='1'><i class='fa fa-trash-o'></i></a></p></div>";
      if ($setting->field == Setting::INPUT_RADIO){
          echo $form->field($setting, "[$index]value", ['template' => $template])->label($setting->fieldlabel)->dropDownList(['0' => '否', '1' => '是']);
      } elseif ($setting->field == Setting::INPUT_TEXTAREA){
          echo $form->field($setting, "[$index]value", ['template' => $template])->label($setting->fieldlabel)->textarea(['rows' => 6]);
      } else {
          echo $form->field($setting, "[$index]value", ['template' => $template])->label($setting->fieldlabel)->textInput();
      }
      endforeach;
      ?>
    
    <div class="form-group row">
        <div class="col-md-2 col-6 offset-md-2">
        <?= Html::submitButton(Yii::t('app', 'Save'),['class' => 'btn btn-primary btn-block']) ?>
        </div>
        <div class="col-md-2 col-6">
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#ajaxModalLg" data-remote="<?=Url::toRoute(['setting/custom-create']) ?>"><?= Yii::t('app', 'Create Custom Field') ?></button>
        </div>
    </div>
  </div>
  <?php ActiveForm::end(); ?>
</div>


