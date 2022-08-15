<?php
use yii\helpers\Url;
use app\models\Content;
use app\helpers\Util;
/* @var $this yii\web\View */

$this->title = '';
?>
<section class="banner-section">
			<div class="home-carousel owl-theme owl-carousel">
				<div class="slide-item">
					<div class="image-layer" data-background="<?= Url::to('@web/static/images/bg/1.jpg') ?>"></div>
					<div class="container">
						<div class="row">
							<div class="col-xl-8 col-lg-12 col-md-12 content-column">
								<div class="content-box">
									<h1>制定好的计划 <br>发展您的业务</h1>
									<p>我们在提供咨询服务解决方案方面拥有近35年的经验。</p>
									<div class="btn-box"><a href="#" class="btn btn-primary rounded-pill px-4">了解我们</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slide-item">
					<div class="image-layer" data-background="<?= Url::to('@web/static/images/bg/2.jpg') ?>"></div>
					<div class="container">
						<div class="row clearfix">
							<div class="col-xl-8 col-lg-12 col-md-12 content-column">
								<div class="content-box">
									<h1>制定好的计划 <br>发展您的业务</h1>
									<p>我们在提供咨询服务解决方案方面拥有近35年的经验。</p>
									<div class="btn-box"><a href="#" class="btn btn-primary rounded-pill px-4">了解我们</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slide-item">
					<div class="image-layer" data-background="<?= Url::to('@web/static/images/bg/3.jpg') ?>"></div>
					<div class="container">
						<div class="row clearfix">
							<div class="col-xl-8 col-lg-12 col-md-12 content-column">
								<div class="content-box">
									<h1>制定好的计划 <br>发展您的业务</h1>
									<p>我们在提供咨询服务解决方案方面拥有近35年的经验。</p>
									<div class="btn-box"><a href="#" class="btn btn-primary rounded-pill px-4">了解我们</a></div>
								</div>
							</div>
						</div>
					</div>
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
								<figure class="image"><img class="img-fluid" src="<?= Url::to('@web/static/images/video-image.jpg') ?>"></figure>
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
		
		<section class="services-section" style="background-image:url(images/bg/3.png)">
			<div class="container">
				<div class="sec-title centered light">
					<h2>项目服务</h2>
					<div class="separator"></div>
				</div>
				<div class="row">
					<div class="services-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="icon-box"><i class="fa fa-bank"></i></div>
							<h3><a href="services-1.html">经营策略</a></h3>
							<div class="text">Lorem ipsum dolor sit amet adipelit sed.</div>
						</div>
					</div>
					<div class="services-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp" data-wow-delay="250ms" data-wow-duration="1500ms">
							<div class="icon-box"><i class="fa fa-pie-chart"></i></div>
							<h3><a href="services-1.html">数据科学</a></h3>
							<div class="text">Lorem ipsum dolor sit amet adipelit sed.</div>
						</div>
					</div>
					<div class="services-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
							<div class="icon-box"><i class="fa fa-gift"></i></div>
							<h3><a href="services-1.html">UI设计</a></h3>
							<div class="text">Lorem ipsum dolor sit amet adipelit sed.</div>
						</div>
					</div>
					<div class="services-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp" data-wow-delay="750ms" data-wow-duration="1500ms">
							<div class="icon-box"><i class="fa fa-handshake-o"></i></div>
							<h3><a href="services-1.html">市场营销</a></h3>
							<div class="text">Lorem ipsum dolor sit amet adipelit sed.</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="section">
			<div class="container">
				<div class="sec-title centered">
					<h2>客户案例</h2>
					<div class="separator"></div>
				</div>
				<div class="row justify-content-center">
					<div class="col-sm-10 col-md-8 col-lg-4 mb-3">
						<div class="block2 bg-img2 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="background-image: url(images/project-01.jpg);">
							<div class="block2-content">
								<h4 class="block2-title">系统扩展 </h4>
								<p>Lorem ipsum dolor sit amet,consectetur adipiscing elit,sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua,various versions have evolved over the years. </p>
									<a href="projects-detail-01.html" class="d-inline-flex ">Read More </a>
							</div>
						</div>
					</div>
					<div class="col-sm-10 col-md-8 col-lg-4 mb-3">
						<div class="block2 bg-img2 wow fadeInUp" data-wow-delay="250ms" data-wow-duration="1500ms" style="background-image: url(images/project-02.jpg);">
							<div class="block2-content">
								<h4 class="block2-title">训练技巧</h4>
								<p>Lorem ipsum dolor sit amet,consectetur adipiscing elit,sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua,various versions have evolved over the years. </p>
									<a href="projects-detail-01.html" class="d-inline-flex ">Read More </a>
							</div>
						</div>
					</div>
					<div class="col-sm-10 col-md-8 col-lg-4 mb-3">
						<div class="block2 bg-img2 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms" style="background-image: url(images/project-03.jpg);">
							<div class="block2-content">
								<h4 class="block2-title">商业咨询 </h4>
								<p>Lorem ipsum dolor sit amet,consectetur adipiscing elit,sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua,various versions have evolved over the years. </p>
									<a href="projects-detail-01.html" class="d-inline-flex ">Read More </a>
							</div>
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
					<h2>新闻动态</h2>
					<div class="separator"></div>
				</div>
				
				<div class="row">
					<?php foreach (Content::getAllList(6,1) as $r){?>
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm news-card wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<a class="hover-img" href="<?=Util::toViewUrl($r)?>"><img class="card-img-top" src="<?=$r['thumb']?>"></a>
							<div class="card-body">
								<h4><a href="<?=Util::toViewUrl($r)?>" class="trans-02"><?=$r['title']?></a></h4>
								<div class="card-date"><i class="fa fa-calendar"></i> <?=date('Y-m-d', $r['created_at'])?></div>
								<p class="card-text"><?=Util::strCut($r['description'], 36)?></p>
								<a href="<?=Util::toViewUrl($r)?>" class="btn btn-outline-secondary">查看详情</a>
							</div>
						</div>
					</div>
					<?php }?>
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm news-card wow fadeInUp" data-wow-delay="250ms" data-wow-duration="1500ms">
							<a class="hover-img" href="#"><img class="card-img-top" src="images/news-02.jpg" alt="IMG"></a>
							<div class="card-body">
								<h4><a href="news-detail.html" class="trans-02">最新动态标题最新动态标题</a></h4>
								<div class="card-date"><i class="fa fa-calendar"></i> 2020-08-09</div>
								<p class="card-text">动态内容家乐福师大动态内容家乐福师大动态内容家乐福师大动态内容家乐福师大</p>
								<a href="#" class="btn btn-outline-secondary">查看详情</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm news-card wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
							<a class="hover-img" href="#"><img class="card-img-top" src="images/news-03.jpg" alt="IMG"></a>
							<div class="card-body">
								<h4><a href="news-detail.html" class="trans-02">最新动态标题最新动态标题</a></h4>
								<div class="card-date"><i class="fa fa-calendar"></i> 2020-08-09</div>
								<p class="card-text">动态内容家乐福师大动态内容家乐福师大动态内容家乐福师大动态内容家乐福师大</p>
								<a href="#" class="btn btn-outline-secondary">查看详情</a>
							</div>
						</div>
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
