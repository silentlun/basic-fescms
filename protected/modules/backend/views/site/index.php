<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use backend\widgets\Menu;
use yii\helpers\Url;
use backend\assets\AdminAsset;

AdminAsset::register($this);
$this->title = Yii::t('app', 'Backend Manage System');
$identity = Yii::$app->admin->identity;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    
    <meta name="renderer" content="webkit">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container page-sidebar-fixed page-header-fixed">
    	<div id="header" class="header navbar-default">
    		<div class="navbar-header">
    			<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> FesCMS</a>
    			<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    			</button>
    		</div>
    
    		<ul class="navbar-nav navbar-right">
    			<li><a href="/" target='_blank'><i class="fa fa-internet-explorer"></i> 前台</a></li>
    			<li> <a href="<?= Url::toRoute('clear/index') ?>"><i class="fa fa-refresh"></i> 清除缓存</a> 
                    
                  </li>
    			<li class="dropdown navbar-user">
    				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    					<img src="/static/admin/images/user-13.jpg" alt="" />
    					<span class="d-none d-md-inline"><?= $identity->username ?></span> <b class="caret"></b>
    				</a>
    				<div class="dropdown-menu dropdown-menu-right">
    					<a href="<?= Url::toRoute('admin/update-self') ?>" class="dropdown-item J_menuItem">修改密码</a>
    					<div class="dropdown-divider"></div>
    					<a href="<?= Url::toRoute('site/logout') ?>" data-method="post" class="dropdown-item">退出登录</a>
    				</div>
    			</li>
    			
    		</ul>
    	</div>
    	<div id="sidebar" class="sidebar">
    
    		<div data-scrollbar="true" data-height="100%">
    
    			<ul class="nav">
    				<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="/static/admin/images/user-13.jpg" alt="" /></a>
						</div>
						<div class="info">
							<?= $identity->username ?>
							<small><i class="fa fa-circle text-success"></i> <?= $identity->getRolesNameString()?></small>
						</div>
					</li>
    			</ul>
    
    
    			<ul class="nav">
    				<li class="nav-header">菜单导航</li>
    				<?= Menu::widget() ?>
    
    				<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
    
    			</ul>
    
    		</div>
    
    	</div>
    	<div class="sidebar-bg"></div>
    
    
    	<div id="content" class="content">
    		<iframe id="J_iframe" width="100%" height="100%" src="<?= Url::toRoute('/backend/site/main') ?>" frameborder="0" seamless></iframe>
    	</div>
    </div>
	
	

<?php $this->endBody() ?>
</body>
<script>
    function reloadIframe() {
        var current_iframe = $("iframe:visible");
        current_iframe[0].contentWindow.location.reload();
        return false;
    }
    if (window.top !== window.self) {
        window.top.location = window.location;
    }
    $(function(){$(document).on('click', '.J_menuItem',function(){var url=$(this).attr('href');$("#J_iframe").attr('src',url);$(".has-sub").removeClass('active');$(this).parent().parent().parent().addClass('active');$(".J_menuItem").parent().removeClass('active');$(this).parent().addClass('active');return false;});});
</script>
</html>
<?php $this->endPage() ?>