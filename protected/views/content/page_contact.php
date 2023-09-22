<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\bootstrap5\ActiveForm;
use yii\captcha\Captcha;
use app\models\Feedback;
use yii\widgets\Breadcrumbs;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
$model = new Feedback();
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
					<div class="col-md-6">
						<div class="sec-title">
							<h2>给我们留言</h2>
							<div class="separator"></div>
						</div>
						<?php $form = ActiveForm::begin([
						    'id' => 'contact-form', 
						    'enableClientScript' => false, 
						    'options' => ['class' => 'contact-form'],
						    'action' => ['site/feedback'],
						]); ?>

                <?= $form->field($model, 'name')->textInput() ?>

                <?= $form->field($model, 'mobile') ?>
                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'content')->textarea(['rows' => 3]) ?>
                
                <div class="form-group">
                  <div class="verify-captcha">
                  	<div class="captcha-tips"><i class="fa fa-shield"></i> 点击完成验证</div>
                  	<div class="captcha-tips-success"><i class="fa fa-check"></i> 验证成功</div>
                  </div>
                </div>
                
                <div class="row justify-content-center">
								<div class="col-6"><?= Html::submitButton('提交留言', ['class' => 'btn btn-primary btn-block btn-lg', 'name' => 'contact-button']) ?></div>
							</div>

            <?php ActiveForm::end(); ?>
						
						
					</div>
					<div class="col-md-6">
						<div class="sec-title">
							<h2>联系方式</h2>
							<div class="separator"></div>
						</div>
						<ul class="list-unstyled">
							<li class="d-flex mb-3">
								<span class="mr-2 h5"><i class="fa fa-home" aria-hidden="true"></i></span>
								<span>北京市东城区朝阳门银河SOHO A座 </span>
							</li>
							<li class="d-flex mb-3">
								<span class="mr-2 h5"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
								<span>xxxx@xxx.com </span>
							</li>
							<li class="d-flex mb-3">
								<span class="mr-2 h5"><i class="fa fa-phone" aria-hidden="true"></i></span>
								<span>12345678999<br>12345678999</span>
							</li>
							<li class="d-flex mb-3">
								<span class="mr-2 h5"><i class="fa fa-qq" aria-hidden="true"></i></span>
								<span>12345678999<br>12345678999</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>


