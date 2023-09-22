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
<div class="wrapper">


	<!-- ========== Topbar Start ========== -->
	<div class="navbar-custom">
		<div class="topbar container-fluid">
			<div class="d-flex align-items-center gap-lg-2 gap-1">

				<!-- Topbar Brand Logo -->
				<div class="logo-topbar">
					<!-- Logo light -->
					<a href="<?= Url::toRoute('site/index') ?>" class="logo-light">
						<span class="logo-lg">
							<img src="/static/admin/images/logo.png" alt="logo">
						</span>
						<span class="logo-sm">
							<img src="/static/admin/images/logo-sm.png" alt="small logo">
						</span>
					</a>

					<!-- Logo Dark -->
					<a href="<?= Url::toRoute('site/index') ?>" class="logo-dark">
						<span class="logo-lg">
							<img src="/static/admin/images/logo-dark.png" alt="dark logo">
						</span>
						<span class="logo-sm">
							<img src="/static/admin/images/logo-dark-sm.png" alt="small logo">
						</span>
					</a>
				</div>

				<!-- Sidebar Menu Toggle Button -->
				<button class="button-toggle-menu">
					<i class="ri-menu-line font-22"></i>
				</button>
				
			</div>

			<ul class="topbar-menu d-flex align-items-center gap-4">

				<li class="d-none d-sm-inline-block">
					<a class="nav-link" href="/" target='_blank' data-bs-toggle="tooltip" data-bs-placement="bottom" title="网站首页">
						<i class="ri-computer-line font-22"></i>
					</a>
				</li>
				<li class="d-none d-sm-inline-block">
					<a class="nav-link" href="<?= Url::toRoute('clear/index') ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="刷新缓存">
						<i class="ri-loop-left-line font-22"></i>
					</a>
				</li>
				<li class="d-none d-sm-inline-block">
					<a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
						<i class="ri-settings-3-line font-22"></i>
					</a>
				</li>

				<li class="d-none d-sm-inline-block">
					<div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="bottom" title="主题模式">
						<i class="ri-moon-line font-22"></i>
					</div>
				</li>
				<li class="d-none d-md-inline-block me-4">
					<a class="nav-link" href="" data-toggle="fullscreen">
						<i class="ri-fullscreen-line font-22"></i>
					</a>
				</li>
				<li class="dropdown">
					<a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
						<span class="account-user-avatar">
							<img src="/static/admin/images/user-head.png" width="32" class="rounded-circle">
						</span>
						<span class="d-lg-flex flex-column gap-1 d-none">
							<h5 class="my-0 font-16"><?= $identity->username ?></h5>
							<h6 class="my-0 font-12"><?= $identity->getRolesNameString()?></h6>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
						<!-- item-->
						<div class=" dropdown-header noti-title">
							<span class="text-overflow m-0">Welcome !</span>
						</div>

						<!-- item-->
						<a class="dropdown-item J_menuItem" href="<?= Url::toRoute('admin/update-self') ?>">
							<i class="ri-account-circle-fill me-1"></i>
							<span>修改资料</span>
						</a>
						<div class="dropdown-divider"></div>
						<!-- item-->
						<a class="dropdown-item" href="<?= Url::toRoute('site/logout') ?>" data-method="post">
							<i class="ri-logout-circle-r-line me-1"></i>
							<span>退出账号</span>
						</a>
					</div>
				</li>

			</ul>
		</div>
	</div>
	<!-- ========== Topbar End ========== -->

	<!-- ========== Left Sidebar Start ========== -->
	<div class="leftside-menu">

		<!-- Brand Logo Light -->
		<a href="<?= Url::toRoute('site/index') ?>" class="logo logo-light">
			<span class="logo-lg">
				<img src="/static/admin/images/logo.png" alt="logo">
			</span>
			<span class="logo-sm">
				<img src="/static/admin/images/logo-sm.png" alt="small logo">
			</span>
		</a>

		<!-- Brand Logo Dark -->
		<a href="<?= Url::toRoute('site/index') ?>" class="logo logo-dark">
			<span class="logo-lg">
				<img src="/static/admin/images/logo-dark.png" alt="dark logo">
			</span>
			<span class="logo-sm">
				<img src="/static/admin/images/logo-dark-sm.png" alt="small logo">
			</span>
		</a>

		<!-- Sidebar Hover Menu Toggle Button -->
		<div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right"
			title="Show Full Sidebar">
			<i class="ri-checkbox-blank-circle-line align-middle"></i>
		</div>

		<!-- Full Sidebar Menu Close Button -->
		<div class="button-close-fullsidebar">
			<i class="ri-close-line align-middle"></i>
		</div>

		<!-- Sidebar -left -->
		<div class="h-100" id="leftside-menu-container" data-simplebar>

			<!--- Sidemenu -->
			<ul class="side-nav">

				<li class="side-nav-title">菜单导航</li>

				<li class="side-nav-item menuitem-active">
					<a href="<?= Url::toRoute('site/main') ?>" class="side-nav-link J_menuItem" target="_blank">
						<i class="fa fa-dashboard"></i>
						<span> 首页 </span>
					</a>
				</li>
				<?= Menu::widget() ?>
				

			</ul>
			<!--- End Sidemenu -->

			<div class="clearfix"></div>
		</div>
	</div>
	<!-- ========== Left Sidebar End ========== -->

	<!-- ============================================================== -->
	<!-- Start Page Content here -->
	<!-- ============================================================== -->

	<div class="content-page">
		<iframe id="J_iframe" width="100%" height="100%" src="<?= Url::toRoute('site/main') ?>" frameborder="0" seamless></iframe>


	</div>

</div>
<!-- END wrapper -->

<!-- Theme Settings -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
	<div class="d-flex align-items-center bg-primary p-4 offcanvas-header">
		<h5 class="text-white m-0">Theme Settings</h5>
		<button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
			aria-label="Close"></button>
	</div>

	<div class="offcanvas-body p-0">
		<div data-simplebar class="h-100">
			<div class="card mb-0 p-3">


				<h5 class="my-3 font-16 fw-bold">主题模式</h5>

				<div class="colorscheme-cardradio">
					<div class="row">
						<div class="col-4">
							<div class="form-check card-radio">
								<input class="form-check-input" type="radio" name="data-bs-theme"
									id="layout-color-light" value="light">
								<label class="form-check-label p-0 avatar-md w-100" for="layout-color-light">
									
										<span class="d-flex h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
													<span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
													<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
													<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
													<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
													<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column bg-white rounded-2">
													<span class="bg-light d-block p-1"></span>
												</span>
											</span>
										</span>
									
								</label>
							</div>
							<h5 class="font-14 text-center text-muted mt-2">明亮</h5>
						</div>

						<div class="col-4">
							<div class="form-check card-radio">
								<input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark" value="dark">
								<label class="form-check-label p-0 avatar-md w-100 bg-black" for="layout-color-dark">
									<span class="d-flex h-100">
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column p-1 px-2">
												<span
													class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
												<span
													class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
											</span>
										</span>
									</span>
									
								</label>
							</div>
							<h5 class="font-14 text-center text-muted mt-2">暗黑</h5>
						</div>
					</div>
				</div>



				<h5 class="my-3 font-16 fw-bold">顶栏颜色</h5>

				<div class="row">
					<div class="col-4">
						<div class="form-check card-radio">
							<input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light" value="light">
							<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
								
								<span class="d-flex h-100">
									<span class="flex-shrink-0">
										<span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
											<span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
											<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
										</span>
									</span>
									<span class="flex-grow-1">
										<span class="d-flex h-100 flex-column">
											<span class="bg-light d-block p-1"></span>
										</span>
									</span>
								</span>
								
							</label>
						</div>
						<h5 class="font-14 text-center text-muted mt-2">浅色</h5>
					</div>

					<div class="col-4" style="--ct-dark-rgb: 64,73,84;">
						<div class="form-check card-radio">
							<input class="form-check-input" type="radio" name="data-topbar-color"
								id="topbar-color-dark" value="dark">
							<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
								
								<span class="d-flex h-100">
									<span class="flex-shrink-0">
										<span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
											<span class="d-block p-1 bg-primary-lighten rounded mb-1"></span>
											<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											<span class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
										</span>
									</span>
									<span class="flex-grow-1">
										<span class="d-flex h-100 flex-column">
											<span class="bg-dark d-block p-1"></span>
										</span>
									</span>
								</span>
								
							</label>
						</div>
						<h5 class="font-14 text-center text-muted mt-2">暗黑</h5>
					</div>

					<div class="col-4">
						<div class="form-check card-radio">
							<input class="form-check-input" type="radio" name="data-topbar-color"
								id="topbar-color-brand" value="brand">
							<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-brand">
								
									<span class="d-flex h-100">
										<span class="flex-shrink-0">
											<span
												class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
												<span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-primary bg-gradient d-block p-1"></span>
											</span>
										</span>
									</span>
								
							</label>
						</div>
						<h5 class="font-14 text-center text-muted mt-2">海蓝</h5>
					</div>
					<div class="col-4">
						<div class="form-check card-radio">
							<input class="form-check-input" type="radio" name="data-topbar-color"
								id="topbar-color-purple" value="purple">
							<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-purple">
								
									<span class="d-flex h-100">
										<span class="flex-shrink-0">
											<span
												class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
												<span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-purple bg-gradient d-block p-1"></span>
											</span>
										</span>
									</span>
								
							</label>
						</div>
						<h5 class="font-14 text-center text-muted mt-2">惑紫</h5>
					</div>
					<div class="col-4">
						<div class="form-check card-radio">
							<input class="form-check-input" type="radio" name="data-topbar-color"
								id="topbar-color-red" value="red">
							<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-red">
								
									<span class="d-flex h-100">
										<span class="flex-shrink-0">
											<span
												class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
												<span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-red bg-gradient d-block p-1"></span>
											</span>
										</span>
									</span>
								
							</label>
						</div>
						<h5 class="font-14 text-center text-muted mt-2">魅红</h5>
					</div>
					<div class="col-4">
						<div class="form-check card-radio">
							<input class="form-check-input" type="radio" name="data-topbar-color"
								id="topbar-color-green" value="green">
							<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-green">
								
									<span class="d-flex h-100">
										<span class="flex-shrink-0">
											<span
												class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
												<span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-green bg-gradient d-block p-1"></span>
											</span>
										</span>
									</span>
								
							</label>
						</div>
						<h5 class="font-14 text-center text-muted mt-2">翠柳</h5>
					</div>
					<div class="col-4">
						<div class="form-check card-radio">
							<input class="form-check-input" type="radio" name="data-topbar-color"
								id="topbar-color-orange" value="orange">
							<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-orange">
								
									<span class="d-flex h-100">
										<span class="flex-shrink-0">
											<span
												class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
												<span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-orange bg-gradient d-block p-1"></span>
											</span>
										</span>
									</span>
								
							</label>
						</div>
						<h5 class="font-14 text-center text-muted mt-2">鎏金</h5>
					</div>
				</div>

				<div>
					<h5 class="my-3 font-16 fw-bold">菜单颜色</h5>

					<div class="row">
						<div class="col-4">
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-menu-color"
									id="leftbar-color-light" value="light">
								<label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-light">
									
										<span class="d-flex h-100">
											<span class="flex-shrink-0">
												<span
													class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
													<span
														class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
													<span
														class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
													<span
														class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
													<span
														class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
													<span
														class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
												</span>
											</span>
										</span>
									
								</label>
							</div>
							<h5 class="font-14 text-center text-muted mt-2">浅色</h5>
						</div>

						<div class="col-4" style="--ct-dark-rgb: 64,73,84;">
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-menu-color"
									id="leftbar-color-dark" value="dark">
								<label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-dark">
									
										<span class="d-flex h-100">
											<span class="flex-shrink-0">
												<span class="bg-dark d-flex h-100 flex-column p-1 px-2">
													<span
														class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
													<span
														class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
													<span
														class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
													<span
														class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
													<span
														class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
												</span>
											</span>
										</span>
									
								</label>
							</div>
							<h5 class="font-14 text-center text-muted mt-2">暗黑</h5>
						</div>
						<div class="col-4">
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-menu-color"
									id="leftbar-color-brand" value="brand">
								<label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-brand">
									
										<span class="d-flex h-100">
											<span class="flex-shrink-0">
												<span
													class="bg-primary bg-gradient d-flex h-100 flex-column p-1 px-2">
													<span
														class="d-block p-1 bg-light-lighten rounded mb-1"></span>
													<span
														class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
													<span
														class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
													<span
														class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
													<span
														class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
												</span>
											</span>
										</span>
									

								</label>
							</div>
							<h5 class="font-14 text-center text-muted mt-2">蓝色</h5>
						</div>
					</div>
				</div>

				<div id="sidebar-size">
					<h5 class="my-3 font-16 fw-bold">侧栏样式</h5>

					<div class="row">
						<div class="col-4">
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidenav-size"
									id="leftbar-size-default" value="default">
								<label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-default">
									<span class="d-flex h-100">
										<span class="flex-shrink-0">
											<span
												class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
												<span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="font-14 text-center text-muted mt-2">默认</h5>
						</div>



						<div class="col-4">
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidenav-size"
									id="leftbar-size-small" value="condensed">
								<label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small">
									<span class="d-flex h-100">
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 border-end flex-column"
												style="padding: 2px;">
												<span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
												<span
													class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="font-14 text-center text-muted mt-2">收起</h5>
						</div>
						<div class="col-4">
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-full" value="full">
								<label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-full">
									<span class="d-flex h-100">
										<span class="flex-shrink-0">
											<span class="d-flex h-100 flex-column">
												<span class="d-block p-1 bg-dark-lighten mb-1"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="font-14 text-center text-muted mt-2">完整布局</h5>
						</div>

						<div class="col-4">
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-fullscreen" value="fullscreen">
								<label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-fullscreen">
									<span class="d-flex h-100">
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="font-14 text-center text-muted mt-2">全屏布局</h5>
						</div>


					</div>
				</div>


			</div>
		</div>

	</div>
	<div class="offcanvas-footer border-top p-3 text-center">
		<div class="row">
			<div class="col-6">
				<button type="button" class="btn btn-light w-100" id="reset-layout">重置</button>
			</div>
			<div class="col-6">
				
			</div>
		</div>
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
    $(function(){$(document).on('click', '.J_menuItem',function(){var url=$(this).attr('href');$("#J_iframe").attr('src',url);$(".side-nav-item").removeClass('menuitem-active');$(this).parent().parent().parent().parent().addClass('menuitem-active');$(".J_menuItem").removeClass('active');$(".J_menuItem").parent().removeClass('show');$(this).addClass('active');$("body").removeClass('sidebar-enable');return false;});});
</script>
</html>
<?php $this->endPage() ?>