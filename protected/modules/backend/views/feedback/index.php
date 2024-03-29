<?php

use yii\helpers\Html;
use backend\widgets\Bar;
use backend\components\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = Yii::t('app', 'List');
?>
<?= $this->render('/widgets/_page-heading') ?>
  <div class="card animated fadeInRight">
    <?php Pjax::begin(['id' => 'pjax-container']); ?>
    <div class="card-header">
      
      <div class="card-toolbar">
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
            'name',
            'email:email',
            'mobile',
            [
                'attribute' => 'content',
                'width' => '',
                'format' => 'ntext',
            ],
            [
                'attribute' => 'created_at',
                'class' => 'backend\components\grid\DateColumn',
            ],

            [
                'class' => 'backend\components\grid\ActionColumn',
                'headerOptions' => ['width' => 60],
                'template' => '{delete}',
            ],
        ],
    ]); ?>
        
    </form>  
    </div>
    
    <?php Pjax::end(); ?>
  </div>