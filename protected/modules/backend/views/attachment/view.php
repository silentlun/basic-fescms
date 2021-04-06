<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

?>
<style>
img{max-width:100%; margin:20px auto;}
</style>

<div class="modal-header">
    <h4 class="modal-title" id="ajaxModalLabel">查看附件</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  <div class="modal-body">
    <?= Html::img(Yii::$app->config->site_upload_url.$model->filepath) ?>
    
  </div>
