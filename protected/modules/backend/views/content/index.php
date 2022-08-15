<?php

use yii\helpers\Html;
use backend\widgets\Bar;
use backend\components\grid\GridView;
use yii\widgets\Pjax;
use app\helpers\Constants;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contents');
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = Yii::t('app', 'List');
?>
<?= $this->render('/widgets/_page-heading') ?>
<div class="form-row">
  
  <div class="col-md-2">
  <?= $this->render('/widgets/_categorys') ?>
  </div>
  <div class="col-md-10">
    <div class="full-height">
      
      <div class="card">
        <?php Pjax::begin(['id' => 'pjax-container']); ?>
        <div class="card-toolbar clearfix">
          
          <div class="toolbar-btn-action pull-left">
          <?= Bar::widget(['template' => '{create} {listorder} {delete} {push}']) ?>
          </div>
          
        </div>
        <div class="card-body">
        <form id="myform">
          <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn', 'headerOptions' => ['width' => '40']],
            [
                'attribute' => 'sort',
                'class' => 'backend\components\grid\SortColumn',
            ],

            'id',
            [
                'attribute' => 'title',
                'width' => '',
                'format' => 'raw',
                'value' => function($model){
                $thumb = $model->thumb ? ' <i class="fa fa-image text-primary"></i>' : '';
                $posid =  $model->tagValues ? ' <i class="fa fa-flag text-danger"></i>' : '';
                return Html::a($model->title.$thumb.$posid, ['/content/view', 'id' => $model->id]);
                }
            ],
            'views',
            [
                'attribute' => 'status',
                'header' => '状态',
                'width' => '80',
                'format' => 'raw',
                'value'  => function($model){
                    return Constants::getContentStatus($model->status);
                },
                'filter' => Constants::getContentStatus(),
            ],
            [
                'attribute' => 'created_at',
                'filter' => false,
                'class' => 'backend\components\grid\DateColumn',
            ],
            [
                'class' => 'backend\components\grid\ActionColumn',
                'headerOptions' => ['width' => 80],
                'template' =>'{update}',
            ],
        ],
    ]); ?>
        </form>  
        </div>
      <?php Pjax::end(); ?>
      </div>
    </div>
  </div>
</div>
