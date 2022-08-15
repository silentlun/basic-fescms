<?php

use yii\helpers\Html;
use backend\components\grid\GridView;
use yii\widgets\Pjax;
use backend\widgets\Bar;
use app\helpers\Util;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Admin Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/widgets/_page-heading') ?>
  <div class="card animated fadeInRight">
    <?php Pjax::begin(['id' => 'pjax-container']); ?>
    <div class="card-toolbar clearfix">
      
      <div class="toolbar-btn-action">
      <?= Bar::widget(['template' => '{delete}']) ?>
      </div>
    </div>
    <div class="card-body">
    <form id="myform">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn', 'headerOptions' => ['width' => '40']],

            'id',
            'admin.username',
            'route',
            [
                'attribute' => 'description',
                'width' => '',
                'format' => 'html',
                'contentOptions' => ['class' => 'text-break'],
                'value' => function ($model, $key, $index, $column) {
                return Util::strCut($model->description, 200);
            }
            ],
            [
                'attribute' => 'created_at',
                'class' => 'backend\components\grid\DateColumn',
            ],

            [
                'class' => 'backend\components\grid\ActionColumn',
                'headerOptions' => ['width' => 150],
                'buttons' => [
                    'view' => function($url, $model, $key){
                    return Html::a('<i class="fa fa-eye"></i> '.Yii::t('app', 'View'), $url, [
                        'class' => 'btn btn-info btn-xs',
                        'title' => Yii::t('app', 'View'),
                        'data-toggle' => 'modal',
                        'data-target' => '#ajaxModalLg',
                        'data-remote' => $url,
                        'data-pjax' => '0'
                    ]);
                    }
                ],
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>
        
    </form>  
    </div>
    
    <?php Pjax::end(); ?>
  </div>

