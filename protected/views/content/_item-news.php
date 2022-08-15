<?php
use yii\helpers\Html;
use app\helpers\Util;
?>

<div class="card">
	<figure class="image-box"><a href="<?= Util::toViewUrl($model) ?>"><?= Html::img(Util::thumb($model['thumb'], '750', '422'), ['alt' => $model['title']]) ?></a></figure>
	<div class="card-body">
		<div class="post-date mb-2"><i class="fa fa-calendar"></i> <?= date('Y-m-d', $model['created_at']) ?></div>
		<h4 class="ellipsis-2"><a href="<?= Util::toViewUrl($model) ?>"><?= $model['title'] ?></a></h4>
		<p class="ellipsis-2"><?= $model['description'] ?></p>
		<div class="d-flex justify-content-between align-items-center read-button">
			<a href="<?= Util::toViewUrl($model) ?>" class="">继续阅读</a>
		</div>
	</div>
</div>



