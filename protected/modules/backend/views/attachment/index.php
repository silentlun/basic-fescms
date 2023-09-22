<?php

use yii\helpers\Html;
use backend\widgets\Bar;
use backend\components\grid\GridView;
use yii\widgets\Pjax;
use app\widgets\JsBlock;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Attachments');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/widgets/_page-heading') ?>
  <div class="card animated fadeInRight">
        <?php Pjax::begin(['id' => 'pjax-container']); ?>
    <div class="card-header">
      
      <div class="card-toolbar">
      <?= Bar::widget(['template' => '{delete} {address}']) ?>
      </div>
    </div>
    <div class="card-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn', 'headerOptions' => ['width' => '40']],

            'id',
            'module',
            [
                'attribute' => 'filename',
                'width' => '',
                'format' => 'raw',
                'value' => function($model){
                $icon = \app\helpers\Util::attachmentIcon($model->fileext);
                $thumb = glob(dirname(Yii::getAlias('@uploads/').$model->filepath).'/thumb_*'.basename($model->filepath));
                $showthumb = $thumb ? ' '.Html::button('管理缩略图', ['class' => 'btn btn-xs btn-success',
                    'data-toggle' => 'modal',
                    'data-target' => '#ajaxModalLg',
                    'data-remote' => Url::toRoute(['attachment/thumbs', 'filepath' => $model->filepath]),
                    'data-pjax' => '0']) : '';
                return '<i class="fa '.$icon.'"></i> '.$model->filename.$showthumb;
            }
            ],
            'fileext',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model){
                return $model->status == 1 ? '<label class="badge bg-light-success">已使用</label>' : '<label class="badge bg-light-dark">未使用</label>';
            }
            ],
            [
                'attribute' => 'filesize',
                'width' => '150',
                'value' => function($model){
                if($model->filesize >= 1073741824) {
                    $filesize = round($model->filesize / 1073741824 * 100) / 100 . ' GB';
                } elseif($model->filesize >= 1048576) {
                    $filesize = round($model->filesize / 1048576 * 100) / 100 . ' MB';
                } elseif($model->filesize >= 1024) {
                    $filesize = round($model->filesize / 1024 * 100) / 100 . ' KB';
                } else {
                    $filesize = $model->filesize . ' Bytes';
                }
                return $filesize;
            }
            ],
            [
                'attribute' => 'created_at',
                'class' => 'backend\components\grid\DateColumn',
            ],

            [
                'class' => 'backend\components\grid\ActionColumn',
                'headerOptions' => ['width' => 120],
                'template' => '{view-layer} {delete}',
            ],
        ],
    ]); ?>
        
      
    </div>
        <?php Pjax::end(); ?>
  </div>
  
<?php JsBlock::begin() ?>
<script>

    function showthumb(url, name) {
    	layer.open({
            type: 2,
            title: name,
            maxmin: true,
            shadeClose: true, //点击遮罩关闭层
            area: ['70%', '80%'],
            content: url,
        });
        return false;
    }
</script>
<?php JsBlock::end() ?>