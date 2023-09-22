<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\widgets\ActiveForm;

?>
<div class="modal-header">
    <h5 class="modal-title">推送到推荐位</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <?php $form = ActiveForm::begin([
      'id' => 'verify-from',
      'enableAjaxValidation' =>true,
      'enableClientValidation' => false,
      'validationUrl' => Url::toRoute(['push']),
      'fieldConfig' => [
          'template' => "{input}\n{hint}\n{error}",
      ],
      'layout' => 'default',
  ]); ?>
  <div class="modal-body">
    <?= $form->field($model, 'tag_id')->checkboxList(\app\models\Tag::getTags()) ?>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
    <button type="submit" class="btn btn-primary">确定</button>
  </div>
  <?php ActiveForm::end(); ?>




