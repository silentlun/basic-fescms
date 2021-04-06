<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = $categoryModel->catname;
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="page-banner" style="background-image: url(<?=$bannerImg ? $bannerImg : '/static/images/page-title.jpg' ?>);">
	<div class="container">
		<div class="content-box">
			<div class="title">
				<h1><?=Html::encode($categoryModel->catname)?></h1>
			</div>
			<?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			    'options' => ['class' => 'bread-crumb clearfix'],
            ]) ?>
		</div>
	</div>
</section>
		
		<section class="section">
			<div class="container">
				<div class="row">
					<div class="video-column col-md-6">
						<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<!--Video Box-->
							<div class="video-box">
								<figure class="image"><img src="images/video-image.jpg" alt=""></figure><a href="https://www.youtube.com/watch?v=kxPCFljwJws"
								 class="lightbox-image overlay-box"><i class="play-now flaticon-play-button"></i></a>
							</div>
						</div>
					</div><!-- Content Column -->
					<div class="content-column col-md-6">
						<div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<!-- Sec Title -->
							<div class="sec-title">
								<h2>
									我们是谁？
								</h2>
								<div class="separator"></div>
							</div>
							<div class="text">
								<p>
									我们公司创立于2009年，是全球领先的云计算及人工智能科技公司，致力于以在线公共服务的方式，提供安全、可靠的计算和数据处理能力，让计算和人工智能成为普惠科技。阿里云服务着制造、金融、政务、交通、医疗、电信、能源等众多领域的领军企业，包括中国联通、12306、中石化、中石油、飞利浦、华大基因等大型企业客户，以及微博、知乎、锤子科技等明星互联网公司。
								</p>
								<p>
									在全球各地部署高效节能的绿色数据中心，利用清洁计算为万物互联的新世界提供源源不断的能源动力，目前开服的区域包括中国、新加坡、美国、欧洲、中东、澳大利亚、日本。
								</p>
							</div>
							<a href="contact.html" class="btn btn-primary rounded-pill px-4">
								联系我们
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="parallax kit-overlay1" style="background-image: url(images/bg-01.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-md-4 p-tb-30">
						<div class="counter-box d-flex flex-column align-items-center">
							<span class="counter">450</span>
							<span class="text-uppercase">项目</span>
						</div>
					</div>
					<div class="col-md-4 p-tb-30">
						<div class="counter-box d-flex flex-column align-items-center">
							<span class="counter">205</span>
							<span class="text-uppercase">顾问</span>
						</div>
					</div>
					<div class="col-md-4 p-tb-30">
						<div class="counter-box d-flex flex-column align-items-center">
							<span class=""><span class="counter">95</span>% </span>
							<span class="text-uppercase">满意率 </span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="section bg-light">
			<div class="container">
				<div class="sec-title centered">
					<h2>公司环境</h2>
					<div class="separator"></div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<a href="#" class="hover-img"><img class="img-fluid" src="images/project-01.jpg"></a>
					</div>
					<div class="col-md-4">
						<a href="#" class="hover-img"><img class="img-fluid" src="images/project-02.jpg"></a>
					</div>
					<div class="col-md-4">
						<a href="#" class="hover-img"><img class="img-fluid" src="images/project-03.jpg"></a>
					</div>
				
					
				</div>
				
				
			</div>
		</section>
		<section class="section bg-light">
			<div class="container">
				<div class="sec-title centered">
					<h2>员工风采</h2>
					<div class="separator"></div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<a href="#" class="hover-img"><img class="img-fluid" src="images/team//team01.jpg"></a>
					</div>
					<div class="col-md-3">
						<a href="#" class="hover-img"><img class="img-fluid" src="images/team//team02.jpg"></a>
					</div>
					<div class="col-md-3">
						<a href="#" class="hover-img"><img class="img-fluid" src="images/team//team03.jpg"></a>
					</div>
					<div class="col-md-3">
						<a href="#" class="hover-img"><img class="img-fluid" src="images/team//team04.jpg"></a>
					</div>
					
				</div>
				
				
			</div>
		</section>
		<section class="section">
			<div class="container">
				<div class="sec-title centered">
					<h2>合作伙伴</h2>
					<div class="separator"></div>
				</div>
				<div class="owl-carousel client-items">
					<div class="client-item"><img src="images/clients4/1.png" alt=""></div>
					<div class="client-item"><img src="images/clients4/2.png" alt=""></div>
					<div class="client-item"><img src="images/clients4/4.png" alt=""></div>
					<div class="client-item"><img src="images/clients4/5.png" alt=""></div>
					<div class="client-item"><img src="images/clients4/6.png" alt=""></div>
					<div class="client-item"><img src="images/clients4/7.png" alt=""></div>
					<div class="client-item"><img src="images/clients4/8.png" alt=""></div>
					<div class="client-item"><img src="images/clients4/9.png" alt=""></div>
				</div>
				
				
				
			</div>
		</section>
