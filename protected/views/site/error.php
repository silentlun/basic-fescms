<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class="error-wrap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-10">
				<div class="text-center"><img src="/static/images/404.png" class="img-fluid">
					<p class="mt-3">Web服务器正在处理您的请求时，发生了以上错误。</p>
					<p>如果您认为这是服务器错误，请与我们联系。 谢谢您。</p>
					<a class="btn btn-primary" href="/">返回首页</a>
				</div>
			</div>
		</div>
	</div>
</section>
