<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = $categoryModel->catname;
if ($categoryModel->parent_id) $this->params['breadcrumbs'][] = ['label' => $categoryModel->parent->catname, 'url' => ['content/index', 'catdir' => $categoryModel->parent->catdir]];
$this->params['breadcrumbs'][] = $this->title;

?>
<section class="page-banner" style="background-image: url(<?=$bannerImg ?: '/static/images/page-title.jpg' ?>);">
	<div class="container">
		<div class="content-box">
			<div class="title">
				<h1><?=Html::encode($categoryModel->catname)?></h1>
			</div>
			<?= Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'] ?? [],
			    'options' => ['class' => 'bread-crumb clearfix'],
            ]) ?>
		</div>
	</div>
</section>
<section class="blog-grid section">
	<div class="container">
	    <?= ListView::widget([
		    'id' => 'newslist',
            'dataProvider' => $dataProvider,
		    //'options' => ['class' => 'row clearfix'],
		    'itemOptions' => [
		        'tag' => 'div',
		        'class' => 'col-md-4 news-block'
		    ],
		    'itemView' => '_item-news',
		    'layout' => '<div class="row clearfix">{items}</div><div class="d-flex justify-content-center">{pager}</div>',
		    'pager' => [
		        'maxButtonCount' => 10,
		        'nextPageLabel' => '下一页',
		        'prevPageLabel' => '上一页',
		    ],
        ]) ?>
		
	</div>
</section>

