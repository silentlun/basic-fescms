<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\widgets\ActiveForm;

?>
<div class="modal-header">
    <h4 class="modal-title">推送到推荐位</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  <?php $form = ActiveForm::begin([
      'id' => 'verify-from',
      'enableAjaxValidation' =>true,
      'enableClientValidation' => false,
      'validationUrl' => Url::toRoute(['push']),
      'fieldConfig' => [
          'template' => "{input}\n{hint}\n{error}",
      ],
      'fieldClass' => 'backend\widgets\ActiveField',
  ]); ?>
  <div class="modal-body">
    <?= $form->field($model, 'posid')->checkboxList(\app\models\Tag::getTags()) ?>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
    <button type="submit" class="btn btn-primary">保存</button>
  </div>
  <?php ActiveForm::end(); ?>




