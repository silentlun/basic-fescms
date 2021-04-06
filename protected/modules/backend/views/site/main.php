<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="row py-3">
	<!-- begin col-3 -->
	<div class="col-md-3 col-6">
		<div class="widget widget-stats bg-green p-20">
			<div class="stats-icon"><i class="fa fa-file-text"></i></div>
			<div class="stats-info">
				<h4>内容</h4>
				<p><?= $contentCount?></p>	
			</div>
		</div>
	</div>
	<!-- end col-3 -->
	<!-- begin col-3 -->
	<div class="col-md-3 col-6">
		<div class="widget widget-stats bg-blue p-20">
			<div class="stats-icon"><i class="fa fa-sitemap"></i></div>
			<div class="stats-info">
				<h4>栏目</h4>
				<p><?= $categoryCount?></p>	
			</div>
		</div>
	</div>
	<!-- end col-3 -->
	<!-- begin col-3 -->
	<div class="col-md-3 col-6">
		<div class="widget widget-stats bg-purple p-20">
			<div class="stats-icon"><i class="fa fa-commenting"></i></div>
			<div class="stats-info">
				<h4>留言</h4>
				<p><?= $feedbackCount?></p>	
			</div>
		</div>
	</div>
	<!-- end col-3 -->
	<!-- begin col-3 -->
	<div class="col-md-3 col-6">
		<div class="widget widget-stats bg-red p-20">
			<div class="stats-icon"><i class="fa fa-paperclip"></i></div>
			<div class="stats-info">
				<h4>附件</h4>
				<p><?= $attCount?></p>	
			</div>
		</div>
	</div>
	<!-- end col-3 -->
</div>


<div class="row m-t-20">
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>个人信息</h4>
          </div>
          <div class="card-body p-20">
            <div class="media media-sm">
				<a href="javascript:;" class="pull-left">
					<img src="/static/admin/images/user-13.jpg" class="media-object rounded-circle">
				</a>
				<div class="media-body">
					<h4 class="media-heading m-t-10">您好，<?= Yii::$app->admin->getIdentity()->username ?></h4>
					<p>角色：<?= Yii::$app->admin->getIdentity()->getRolesNameString()?></p>
				</div>
			</div>
			<hr>
            <ul class="list-group clear-list">
              <li class="list-group-item "> <strong>上次登录时间</strong>：
                <?= date('Y-m-d H:i:s', Yii::$app->admin->identity->prev_login_time)?>
              </li>
              <li class="list-group-item "> <strong>上次登录IP</strong>：
                <?= Yii::$app->admin->getIdentity()->prev_login_ip?>
              </li>
              
            </ul>
            
          </div>
        </div>
      
    </div>
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>系统信息</h4>
          </div>
          <div class="card-body p-r-25 p-l-25">
            <ul class="list-group service-list">
              <li class="list-group-item "><span class="pull-right text-muted"><?= $info['OPERATING_ENVIRONMENT'] ?></span> <span class="badge bg-green ">&nbsp;&nbsp;</span> <strong>Web Server</strong>:
                
              </li>
              <li class="list-group-item "><span class="pull-right text-muted"><?= $info['PHP_VERSION'] ?></span> <span class="badge bg-success">&nbsp;&nbsp;</span> <strong>PHP版本</strong>:
                
              </li>
              <li class="list-group-item"><span class="pull-right text-muted"><?= $info['DB_INFO'] ?></span> <span class="badge bg-blue">&nbsp;&nbsp;</span> <strong>
                数据库信息
                </strong>:
                
              </li>
              <li class="list-group-item"><span class="pull-right text-muted"><?= $info['UPLOAD_MAX_FILE_SIZE'] ?></span> <span class="badge bg-purple">&nbsp;&nbsp;</span> <strong>
                文件上传限制
                </strong>:
                
              </li>
              <li class="list-group-item"><span class="pull-right text-muted"><?= $info['MAX_EXECUTION_TIME'] ?></span> <span class="badge bg-red">&nbsp;&nbsp;</span> <strong>
                脚本超时限制
                </strong>:
                
              </li>
            </ul>
            
            
          </div>
        </div>
    </div>
</div>

<div class="panel panel-primary">
	<div class="panel-body">
		<h4 class="m-t-0 m-b-30">Alert Examples</h4>
		<div class="">
			<div class="row text-center">
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">成功范例</p><button class="btn btn-default waves-effect waves-light" id="sa-success">Basic
						Alert</button>
				</div>
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">信息基本范例</p><button class="btn btn-default waves-effect waves-light" id="sa-info">Basic
						Alert</button>
				</div>
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">错误基本范例</p><button class="btn btn-default waves-effect waves-light" id="sa-error">Basic
						Alert</button>
				</div>
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">警告基本范例</p><button class="btn btn-default waves-effect waves-light" id="sa-warning">Basic
						Alert</button>
				</div>
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">问基本范例</p><button class="btn btn-default waves-effect waves-light" id="sa-question">Basic
						Alert</button>
				</div>
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">标题下带有文字</p><button class="btn btn-default waves-effect waves-light" id="sa-title">Click
						me</button>
				</div>
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">成功的讯息！</p><button class="btn btn-default waves-effect waves-light" id="sa-success1">Click
						me</button>
				</div>
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">警告消息，其功能附加到“确认”按钮上...</p><button class="btn btn-default waves-effect waves-light"
					 id="sa-warning1">Click me</button>
				</div>
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">通过传递参数，您可以对“取消”执行其他操作。</p><button class="btn btn-default waves-effect waves-light"
					 id="sa-params">Click me</button>
				</div>
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">带有自定义图像标题的消息</p><button class="btn btn-default waves-effect waves-light"
					 id="sa-image">Click me</button>
				</div>
				<div class="col-xs-6 col-sm-3 m-b-30">
					<p class="text-muted">带有自动关闭计时器的消息</p><button class="btn btn-default waves-effect waves-light"
					 id="sa-close">Click me</button>
				</div>
			</div>
		</div>
	</div>
</div>

