<?php
/**
* categorys
*
* @author  Allen
* @date  2021-1-1 下午17:32:00
* @copyright  Copyright igkcms
*/
use yii\helpers\Url;
use app\widgets\JsBlock;
use app\models\Category;
use backend\widgets\CategoryTree;


$this->registerCssFile("@web/static/admin/plugins/jquery-treeview/css/jquery.treeview.css",['depends'=>['backend\assets\AdminAsset']]);
$this->registerJsFile("@web/static/admin/plugins/jquery-treeview/js/jquery.treeview.js",['depends'=>['backend\assets\AdminAsset']]);


?>
<style type="text/css">
.filetree * { white-space: nowrap; }
.filetree span.folder, .filetree span.file {
	display: auto;
	padding: 1px 0 1px 16px;
}
</style>
<div class="cat-menu card">
  <h4 class="card-header">栏目导航</h4>
  <div class="card-body cat-menubody">
    <div id="treecontrol"><a href="#"><img src="/static/admin/plugins/jquery-treeview/images/minus.gif" /> <img src="/static/admin/plugins/jquery-treeview/images/application_side_expand.png" /> 展开/收缩</a> </div>
        
        <ul class="filetree  treeview">
          <li><span class="folder"><a href="<?php echo Url::toRoute('content/index');?>" data-pjax="1">全部</a></span></li>
        </ul>
        <?php 
        echo CategoryTree::widget([
            'data' => Category::getCategory()
        ]);
        ?>
        
  </div>   
        
</div>
<?php JsBlock::begin()?>
<script>
$(document).ready(function(){
    $("#category_tree").treeview({
			control: "#treecontrol",
			persist: "cookie",
			cookieId: "treeview-black"
	});
    $(".filetree").on('click','a',function(e){
        $('.filetree-item').removeClass('active');
        $(this).addClass('active');
    });
});
</script>
<?php JsBlock::end()?>

