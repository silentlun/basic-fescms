<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = '404-';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <title><?= Html::encode($this->title.Yii::$app->config->site_title) ?></title>
    <?php $this->head() ?>
    
    
</head>
<body>
<?php $this->beginBody() ?>
<style>
.error-area {
    height: 100vh;
    text-align: center;
    width: auto;
    margin-left: auto;
    margin-right: auto;
    background-color: #fff;
    position: relative;
}
</style>
<div class="error-area d-flex flex-column justify-content-center">

	<div class="container text-center">
						<div class="row">
							<div class="col-sm-6 text-center text-sm-end">
								<div class="display-1 text-danger font-w700">404</div>
							</div>
							<div class="col-sm-6 text-center d-sm-flex align-items-sm-center">
								<div class="display-1 text-muted font-w300">Error</div>
							</div>
						</div>
						<h1 class="h4 mt-4 mb-3">哎呀.. 你刚刚发现了一个错误页面..</h1>
						<p class="h6 text-muted mb-5" >很抱歉，您访问的页面不存在，它可能已被移动或删除。</p>
						<div class="button">
							<?=Html::a('进入首页', ['site/index'], ['class' => 'btn btn-primary btn-lg px-5'])?>
						</div>
					</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>