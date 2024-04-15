<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Content */
$this->title = Yii::t('app', 'Attachments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attachments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Attachment address');
?>
<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  
  <div class="card-body">
  <h4 class="header-title"><?= Yii::t('app', 'Attachment address') ?> </h4>
  <div class="alert alert-warning" role="alert">
  <p>1. 当您的附件访问地址，发生修改的时候，可以使用本功能对内容中附件地址的批量修改。本功能不要滥用，只在有需要的时候使用，否则会有数据混乱的风险。</p>
  <p>2. 请在使用本功能之前做好数据备份，否则使用后无法恢复。</p>
</div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'old_attachment_path')->textInput() ?>

    <?= $form->field($model, 'new_attachment_path')->textInput() ?>


    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>


