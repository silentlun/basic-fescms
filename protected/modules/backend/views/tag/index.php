<?php

use yii\helpers\Html;
use backend\widgets\Bar;
use backend\components\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tags');
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = Yii::t('app', 'List');
?>
<?= $this->render('/widgets/_page-heading') ?>
  <div class="card animated fadeInRight">
    <?php Pjax::begin(['id' => 'pjax-container']); ?>
    <div class="card-toolbar clearfix">
      
      <div class="toolbar-btn-action">
      <?= Bar::widget(['template' => '{create} {delete}']) ?>
      </div>
    </div>
    <div class="card-body">
    <form id="myform">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn', 'headerOptions' => ['width' => '40']],

            'id',
            [
                'attribute' => 'cname',
                'width' => '',
            ],
            [
                'attribute' => 'name',
                'width' => '',
            ],
            'frequency',

            [
                'class' => 'backend\components\grid\ActionColumn',
                'headerOptions' => ['width' => 260],
                'buttons' => [
                    'create' => function($url, $model, $key){
                    return Html::a('<i class="fa fa-file-text-o"></i> 信息管理', ['tag/data', 'id' => $key], [
                        'title' => '信息管理',
                        'data-pjax' => '0',
                        'class' => 'btn btn-info btn-xs m-r-5',
                    ]);
                }
                ],
                'template' => '{create} {update} {delete}',
            ],
        ],
    ]); ?>
        
    </form>  
    </div>
    
    <?php Pjax::end(); ?>
  </div>