<?php
use yii\helpers\Html;
use yii\helpers\Url;
use silentlun\daterange\DateRangePicker;
use app\widgets\JsBlock;

$this->title = Yii::t('app', '控制台');
$this->registerJsFile(
    '@web/static/plugins/highcharts/highcharts.js',
    ['depends' => [\backend\assets\AdminAsset::className()]]
    );
$this->registerJsFile(
    '@web/static/plugins/echarts/echarts.min.js',
    ['depends' => [\yii\web\YiiAsset::className()]]
    );

?>
<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <img src="/static/admin/images/user-head.png" class="avatar-md rounded-circle img-thumbnail">
                    </div>
                    <div class="flex-grow-1 align-self-center">
                        <div class="text-muted">
                            <h4 class="mb-2">欢迎回来，<?= Yii::$app->admin->getIdentity()->username ?>！</h4>
                            <h5 class="mb-1"><?= Yii::$app->admin->getIdentity()->getRolesNameString()?></h5>
                            <p class="mb-0">上次登录：<?= date('Y-m-d H:i', Yii::$app->admin->identity->prev_login_time)?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 align-self-center">
                <div class="text-lg-center mt-4 mt-lg-0">
                    <div class="row">
                        <div class="col-4">
                            <div>
                                <p class="text-muted text-truncate mb-2">登录次数</p>
                                <h5 class="mb-0">48</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <p class="text-muted text-truncate mb-2">发布内容</p>
                                <h5 class="mb-0">40</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <p class="text-muted text-truncate mb-2">Clients</p>
                                <h5 class="mb-0">18</h5>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="clearfix mt-4 mt-lg-0 float-end">
                    <a href="<?= Url::toRoute('admin/update-self') ?>" class="btn btn-primary">
        				<i class="fa fa-edit"></i> 编辑个人资料
        			</a>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>

<div class="row py-3">
	<div class="col-md-3 col-6">
		<div class="card widget-flat">
        	<div class="card-body p-4">
        		<div class="float-end h3 text-muted">
        			<i class="fa fa-file-text"></i>
        		</div>
        		<h6 class="text-muted fw-normal mt-0">内容</h6>
        		<h3 class="mt-3 mb-0"><?= $contentCount?></h3>
        	</div>
        </div>
		
	</div>
	<div class="col-md-3 col-6">
		<div class="card widget-flat">
        	<div class="card-body p-4">
        		<div class="float-end h3 text-muted">
        			<i class="fa fa-sitemap"></i>
        		</div>
        		<h6 class="text-muted fw-normal mt-0">栏目</h6>
        		<h3 class="mt-3 mb-0"><?= $categoryCount?></h3>
        	</div>
        </div>
	</div>
	<div class="col-md-3 col-6">
		<div class="card widget-flat">
        	<div class="card-body p-4">
        		<div class="float-end h3 text-muted">
        			<i class="fa fa-commenting"></i>
        		</div>
        		<h6 class="text-muted fw-normal mt-0">留言</h6>
        		<h3 class="mt-3 mb-0"><?= $feedbackCount?></h3>
        	</div>
        </div>
	</div>
	<div class="col-md-3 col-6">
		<div class="card widget-flat">
        	<div class="card-body p-4">
        		<div class="float-end h3 text-muted">
        			<i class="fa fa-paperclip"></i>
        		</div>
        		<h6 class="text-muted fw-normal mt-0">附件</h6>
        		<h3 class="mt-3 mb-0"><?= $attCount?></h3>
        	</div>
        </div>
	</div>
</div>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4>网站访问统计</h4>
    <div class="card-actions"><?php echo DateRangePicker::widget([
            'name' => 'newdaterange',
            'presetDropdown' => true,
            'value' => "{$startDate} 至 {$endDate}",
            'callback' => 'startDate = start.format("YYYY-MM-DD");endDate = end.format("YYYY-MM-DD");loadAjaxCount();',
            'pluginOptions'=>[
                'linkedCalendars' => false,
                'locale'=>[
                    'format' => 'YYYY-MM-DD',
                    'separator' => ' 至 ',
                ]
            ]
        ]);?>
        </div>
  </div>
  <div class="card-body">
    <div class="row py-3 m-0">
    	<div class="col-md-3 col-4">
    		<div class="card widget-stats">
            	<div class="card-body p-0 border-end">
            		<h6 class="text-muted fw-normal mt-0">浏览量(PV)</h6>
            		<h5 class="mt-2 mb-0" id="pvCount">0</h5>
            	</div>
            </div>
    	</div>
    	<div class="col-md-3 col-4">
    		<div class="card widget-stats">
            	<div class="card-body p-0 border-end">
            		<h6 class="text-muted fw-normal mt-0">访客数(UV)</h6>
            		<h5 class="mt-2 mb-0" id="uvCount">0</h5>
            	</div>
            </div>
    	</div>
    	<div class="col-md-3 col-4">
    		<div class="card widget-stats">
            	<div class="card-body p-0">
            		<h6 class="text-muted fw-normal mt-0">独立IP数</h6>
            		<h5 class="mt-2 mb-0" id="ipCount">0</h5>
            	</div>
            </div>
    	</div>
    </div>
    <div id="countStat" style="min-width:100%;height:300px"></div>
  </div>
</div>
        
<div class="row m-t-20">
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>热门文章TOP5</h4>
          </div>
          <div class="card-body p-3">
            <div class="table-responsive">
            <table class="table table-centered table-nowrap table-hover mb-0">
            <thead>
            	<tr>
            		<th>标题</th>
            		<th width="150" class="text-end">浏览量</th>
            	</tr>
            </thead>
            <tbody>
            	<?php foreach ($topViews as $r){?>
                <tr>
            		<td><?=Html::a($r['title'], ['/content/view', 'id' => $r['id']])?></td>
            		<td class="text-end"><?=$r['views']?></td>
            	</tr>
            	<?php }?>
            </tbody>
        </table>
            </div>
          </div>
        </div>
      
    </div>
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>系统信息</h4>
          </div>
          <div class="card-body p-3">
            <div class="chart-widget-list">
                <p>
                    <i class="fa fa-square text-primary"></i> Web Server
                    <span class="float-end"><?= $info['OPERATING_ENVIRONMENT'] ?></span>
                </p>
                <p>
                    <i class="fa fa-square text-danger"></i> PHP版本
                    <span class="float-end"><?= $info['PHP_VERSION'] ?></span>
                </p>
                <p>
                    <i class="fa fa-square text-success"></i> 数据库信息
                    <span class="float-end"><?= $info['DB_INFO'] ?></span>
                </p>
                <p>
                    <i class="fa fa-square text-warning"></i> 文件上传限制
                    <span class="float-end"><?= $info['UPLOAD_MAX_FILE_SIZE'] ?></span>
                </p>
                <p class="mb-0">
                    <i class="fa fa-square text-info"></i> 脚本超时限制
                    <span class="float-end"><?= $info['MAX_EXECUTION_TIME'] ?></span>
                </p>
            </div>
            
            
            
          </div>
        </div>
    </div>
</div>



<?php JsBlock::begin()?>
<script>
Highcharts.setOptions({
	colors: ['#50B432', '#058DC7', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
	exporting: { enabled: false },//隐藏导出图片
	credits: { enabled: false }//隐藏highcharts的站点标志
});
var daysStat = {},weeksStat = {},monthsStat = {};
var groupid,vsgroupid;
var startDate,endDate;

function loadAjaxCount() {
	$.ajax({
        url: "<?=Url::toRoute(['site/main'])?>",
        data: {
        	startDate: startDate,
        	endDate: endDate,
        	groupid: groupid
        },
        dataType: 'json',
        success: function (res) {
        	App.renderChartLine('countStat', res.data);
        	$('#pvCount').text(res.pvTotal);
        	$('#uvCount').text(res.uvTotal);
        	$('#ipCount').text(res.ipTotal);
        }
    });
}

function renderChartLine(container, csv, title = null) {
	var chart = Highcharts.chart(container, {
		data: {
			csv: csv
		},
		chart: {
			type: 'spline',
			backgroundColor: 'rgba(0,0,0,0)'
		},
		title: {
			text: title
		},
		xAxis: {
			tickInterval: 7 * 24 * 3600 * 1000,
			tickWidth: 0,
			gridLineWidth: 1,
			dateTimeLabelFormats: {
				week: '%m-%d'
			}
		},
		yAxis: [{
			title: {
				text: '数量'
			},
			showFirstLabel: false
		}],
		legend: {
		},
		tooltip: {
			shared: true,
			crosshairs: true,
			dateTimeLabelFormats: {
				day: '%Y-%m-%d'
			}
		},
		plotOptions: {
			series: {
				cursor: 'pointer',
				marker: {
					lineWidth: 1
				}
			}
		},
	});
	
}


$(function () {
	loadAjaxCount();
});



</script>
<?php JsBlock::end()?>
