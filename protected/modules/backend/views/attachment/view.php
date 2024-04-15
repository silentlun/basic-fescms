<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

?>
<style>
img{max-width:100%; margin:20px auto;}
</style>

<div class="modal-header">
    <h5 class="modal-title">查看附件</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
    <?= Html::img(Yii::$app->config->site_upload_url.$model->filepath) ?>
    
  </div>
