<?php

use yii\helpers\Html;
use backend\widgets\Bar;
use backend\components\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Position Datas');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/widgets/_page-heading') ?>
  <div class="card">
        <?php Pjax::begin(['id' => 'pjax-container']); ?>
    <div class="card-toolbar clearfix">
      
      <div class="toolbar-btn-action">
      <?= Bar::widget(['template' => '{listorder} {remove}']) ?>
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
                'attribute' => 'title',
                'width' => '',
            ],
            [
                'attribute' => 'catid',
                'label' => '所属栏目',
                'width' => '150',
                'value' => function($model){
                return $model->category->catname;
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
                    'update' => function($url, $model, $key) use ($module){
                    return Html::a('<i class="fa fa-edit"></i> 编辑', ['content/update', 'id' => $key], [
                            'title' => '编辑',
                            'data-pjax' => '0',
                            'class' => 'btn btn-success btn-xs m-r-5',
                        ]);
                    },
                    'remove' => function($url, $model, $key) use ($module){
                    return Html::a('<i class="fa fa-edit"></i> '.Yii::t('app', 'Remove'), ['remove', 'id' => $key, 'module' => $module], [
                        'class' => 'btn btn-danger btn-xs',
                        'title' => Yii::t('app', 'Remove'),
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to remove this data?'),
                            'method' => 'post',
                            'params' => json_encode(['id' => $key]),
                        ]
                    ]);
                    },
                ],
                'template' => '{update} {remove}',
            ],
        ],
    ]); ?>
        
    </form>  
    </div>
        <?php Pjax::end(); ?>
  </div>