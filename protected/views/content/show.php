<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => $categoryModel->catname, 'url' => ['index', 'catdir' => $categoryModel->catdir]];
$this->params['breadcrumbs'][] = '详情';
\yii\web\YiiAsset::register($this);
?>
<section class="page-banner" style="background-image: url(<?=$bannerImg ?>);">
	<div class="container">
		<div class="content-box">
			<div class="title">
				<h2><?= Html::encode($categoryModel->catname) ?></h2>
			</div>
			<?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			    'options' => ['class' => 'bread-crumb clearfix'],
            ]) ?>
		</div>
	</div>
</section>

<div class="container">
	<div class="single-content-full bg-white pt-5">
		<h1 class="article-title"><?= Html::encode($this->title) ?></h1>
		<div class="article-date"><i class="fa fa-calendar"></i> <?= date('Y-m-d', $model->created_at) ?></div>
	
		<div class="article-content">
			<?= $model->content ?>
	
	
		</div>
	</div>
	
</div>

