<?php
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = $this->title ? $this->title.' - ' : '';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title.Yii::$app->config->site_title) ?></title>
    <meta name="keywords" content="<?= Html::encode(Yii::$app->config->site_keywords) ?>" >
	<meta name="description" content=""<?= Html::encode(Yii::$app->config->site_description) ?>>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header navbar navbar-expand-md navbar-light">
	<div class="container">
		<a class="navbar-brand" href="#">Container</a>
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars"
		 aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
		<div class="collapse navbar-collapse" id="navbars">
			<?php 
			echo \app\widgets\Menu::widget([
			    'options' => ['class' => 'mr-auto'],
			]);
			?>
			<div class="sp-phone d-none d-md-block">
				<i class="fa fa-phone"></i>
				<div class="d-inline-block ml-2">
					<div class="phone-text">咨询热线</div>
					<div class="phone-no">123156465</div>
				</div>
			</div>
		</div>
	</div>
</header>

<?= $content ?>
<footer class="dark-footer skin-dark-footer style-2">
	<div class="footer-middle">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="footer_widget">
						<div class="footlogo"><img src="images/logo-light.png" class="img-fluid mb-3" alt="" /></div>
						<p>一段话介绍公司的宣传语一段话介绍公司的宣传语</p>
						<ul class="footer-bottom-social d-none d-sm-block">
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<img class='img-fluid' src='images/ewm_app.png'>"><i class="fa fa-wechat"></i></a></li>
							<li><a href="#"><i class="fa fa-weibo"></i></a></li>
							<li><a href="#"><i class="fa fa-qq"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 d-none d-sm-block">
					<div class="footer_widget">
						<h4 class="widget_title">关于我们</h4>
						<ul class="footer-menu">
							<li><a href="#">公司介绍</a></li>
							<li><a href="#">企业文化</a></li>
							<li><a href="#">联系我们</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 d-none d-sm-block">
					<div class="footer_widget">
						<h4 class="widget_title">服务案例</h4>
						<ul class="footer-menu">
							<li><a href="#">服务项目</a></li>
							<li><a href="#">案例展示</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 d-none d-sm-block">
					<div class="footer_widget">
						<h4 class="widget_title">新闻动态</h4>
						<ul class="footer-menu">
							<li><a href="#">公司动态</a></li>
							<li><a href="#">行业动态</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="footer_widget">
						<h4 class="widget_title">联系方式</h4>
						<ul class="footer-menu">
							<li class="d-flex">
								<span class="mr-2"><i class="fa fa-home" aria-hidden="true"></i></span>
								<span>379 5Th Ave New York,Nyc 10018 </span>
							</li>
							<li class="d-flex">
								<span class="mr-2"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
								<span>xxxx@xxx.com </span>
							</li>
							<li class="d-flex">
								<span class="mr-2"><i class="fa fa-phone" aria-hidden="true"></i></span>
								<span>12345678999<br>12345678999</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12 col-md-12">
					<p class="mb-0">© <?= date('Y') ?> Verio. Designd By <a href="http://www.igkcms.com/">igkcms</a></p>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php $this->endBody() ?>
<?= $this->render('_flash') ?>
<div style="display:none">
<?= Yii::$app->config->site_statics_script ?>
</div>
</body>
</html>
<?php $this->endPage() ?>
