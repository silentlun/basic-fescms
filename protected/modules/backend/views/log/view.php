<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="modal-header">
    <h4 class="modal-title" id="ajaxModalLabel">日志详情</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  <div class="modal-body ajaxmodal-content">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'admin.username',
            'route',
            'description:html',
            'created_at:datetime',
        ],
        'template' => '<tr><th style="width: 80px;">{label}</th><td class="text-break">{value}</td></tr>',
    ]) ?>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
  </div>
