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
<div id="layout-wrapper">
	
	        
	        <header id="page-topbar">
	            <div class="navbar-header">
	                <div class="d-flex">
	                    <!-- LOGO -->
	                    <div class="navbar-brand-box">
	                        <a href="<?= Url::toRoute('site/index') ?>" class="logo logo-dark">
								<span class="logo-sm">FES</span>
	                            <span class="logo-lg">
	                                FesAdmin
	                            </span>
	                        </a>
	
	                        <a href="<?= Url::toRoute('site/index') ?>" class="logo logo-light">
								<span class="logo-sm">FES</span>
	                            
	                            <span class="logo-lg">
	                                FesAdmin
	                            </span>
	                        </a>
	                    </div>
	
	                    <button type="button" class="btn px-3 font-size-24 header-item" id="vertical-menu-btn">
	                        <i class="fa fa-bars align-middle"></i>
	                    </button>

	                </div>
	
	                <div class="d-flex">
						<div class="dropdown">
						    <a href="/" target="_blank" class="btn header-item noti-icon" data-toggle="tooltip" data-placement="top" title="访问前台首页"><i class="fa fa-internet-explorer"></i></a>
						</div>
	                    <div class="dropdown">
	                        <a href="<?= Url::toRoute('clear/index') ?>" class="btn header-item noti-icon clear-refresh" data-toggle="tooltip" data-placement="top" title="刷新系统缓存">
	                            <i class="fa fa-refresh"></i>
	                        </a>
	                    </div>
						<div class="dropdown d-none d-md-inline-block">
						    <button type="button" class="btn header-item noti-icon" data-toggle="fullscreen">
						        <i class="fa fa-arrows-alt"></i>
						    </button>
						</div>
	
	                    
	
	                    <div class="dropdown d-inline-block">
	                        <button type="button" class="btn header-item noti-icon right-bar-toggle" >
	                            <i class="fa fa-cogs"></i>
	                        </button>
	                    </div>
	
	                    <div class="dropdown d-inline-block user-dropdown">
	                        <button type="button" class="btn header-item nav-user" id="page-header-user-dropdown" data-toggle="dropdown" aria-expanded="false">
	                            <i class="fa fa-user-circle"></i>
	                            <span class="ms-1"><?= $identity->username ?></span>
	                            <i class="fa fa-angle-down"></i>
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-end">
	                            
	                            <!-- item-->
	                            <a class="dropdown-item notify-item J_menuItem" href="<?= Url::toRoute('admin/update-self') ?>"><i class="fa fa-user"></i> 个人资料</a>
	                            <a class="dropdown-item notify-item" href="<?= Url::toRoute('site/logout') ?>" data-method="post"><i class="fa fa-sign-out"></i> 安全退出</a>
	                        </div>
	                    </div>
	        
	                </div>
	            </div>
	        </header>
	
	        <!-- ========== Left Sidebar Start ========== -->
	        <div class="vertical-menu">
	
	            <div data-simplebar class="h-100">
	
	                <!--- Sidemenu -->
	                <div id="sidebar-menu">
	                    <!-- Left Menu Start -->
	                    <ul class="metismenu list-unstyled" id="side-menu">
	                        <li class="menu-title">菜单导航</li>
	                        <li class="mm-active">
	                            <a href="<?= Url::toRoute('site/main') ?>" class="J_menuItem active">
	                                <i class="fa fa-dashboard"></i>
	                                <span>控制台</span>
	                            </a>
	                        </li>
	
	                        <?= Menu::widget() ?>
	
	                    </ul>
	                </div>
	                <!-- Sidebar -->
	            </div>
	        </div>
	        <!-- Left Sidebar End -->
	
	        
	
	        <!-- ============================================================== -->
	        <!-- Start right Content here -->
	        <!-- ============================================================== -->
	        <div class="main-content">
				<iframe id="J_iframe" width="100%" height="100%" src="<?= Url::toRoute('/backend/site/main') ?>" frameborder="0" seamless></iframe>
	            
	        </div>
	        <!-- end main content-->
	
	    </div>
	    <!-- END layout-wrapper -->
	
	    <!-- Right Sidebar -->
	    <div class="right-bar">
	        <div data-simplebar class="h-100">
	            <div class="rightbar-title d-flex align-items-center bg-dark">
	        
	                <h6 class="m-0 me-2 text-white">布局设定</h6>
	
	                <a href="javascript:void(0);" class="right-bar-toggle ml-auto">
	                    <i class="fa fa-times noti-icon"></i>
	                </a>
	            </div>
	
	            <!-- Settings -->
	
	            <div class="p-4">
	            
	                <h6 class="mt-0 mb-0">配色方案</h6>
	                <hr class="mt-2">
	            	<div class="custom-control custom-switch">
                      <input type="radio" class="custom-control-input" name="layout-mode" id="layout-mode-light" value="light">
                      <label class="custom-control-label" for="layout-mode-light">亮色模式</label>
                    </div>
                    <div class="custom-control custom-switch">
                      <input type="radio" class="custom-control-input" name="layout-mode" id="layout-mode-dark" value="dark">
                      <label class="custom-control-label" for="layout-mode-dark">暗黑模式</label>
                    </div>
					
					<h6 class="mt-4 mb-0 sidebar-setting">侧边栏颜色</h6>
					<hr class="mt-2">
					<div class="custom-control custom-switch">
                      <input type="radio" class="custom-control-input" name="sidebar-color" id="sidebar-color-light" value="light">
                      <label class="custom-control-label" for="sidebar-color-light">亮色</label>
                    </div>
                    <div class="custom-control custom-switch">
                      <input type="radio" class="custom-control-input" name="sidebar-color" id="sidebar-color-dark" value="dark">
                      <label class="custom-control-label" for="sidebar-color-dark">暗黑</label>
                    </div>
	            
	                <h6 class="mt-4 mb-0">顶栏颜色</h6>
	            	<hr class="mt-2">
	                <div class="theme-list">
						<div class="theme-list-item">
							<a href="javascript:;" class="theme-list-link bg-white" data-theme="light">&nbsp;</a>
						</div>
	                	<div class="theme-list-item">
	                		<a href="javascript:;" class="theme-list-link bg-pink" data-theme="pink">&nbsp;</a>
	                	</div>
	                	<div class="theme-list-item">
	                		<a href="javascript:;" class="theme-list-link bg-orange" data-theme="orange">&nbsp;</a>
	                	</div>
	                	<div class="theme-list-item">
	                		<a href="javascript:;" class="theme-list-link bg-green" data-theme="green">&nbsp;</a>
	                	</div>
	                	<div class="theme-list-item">
	                		<a href="javascript:;" class="theme-list-link bg-cyan" data-theme="cyan">&nbsp;</a>
	                	</div>
	                	<div class="theme-list-item">
	                		<a href="javascript:;" class="theme-list-link bg-blue" data-theme="blue">&nbsp;</a>
	                	</div>
	                	<div class="theme-list-item">
	                		<a href="javascript:;" class="theme-list-link bg-purple" data-theme="purple">&nbsp;</a>
	                	</div>
	                	<div class="theme-list-item">
	                		<a href="javascript:;" class="theme-list-link bg-dark" data-theme="dark">&nbsp;</a>
	                	</div>
	                </div>
	            
	            
	            
	            
	            </div>
	
	        </div> <!-- end slimscroll-menu-->
	    </div>
	    <!-- /Right-bar -->
	
	    <!-- Right bar overlay-->
	    <div class="rightbar-overlay"></div>
	
	

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
    $(function(){$(document).on('click', '.J_menuItem',function(){var url=$(this).attr('href');$("#J_iframe").attr('src',url);$(".has-sub").removeClass('active');$(this).parent().parent().parent().addClass('active');$(".J_menuItem").removeClass('active');$(".J_menuItem").parent().removeClass('show');$(this).addClass('active');$("body").removeClass('sidebar-enable');return false;});});
</script>
</html>
<?php $this->endPage() ?>