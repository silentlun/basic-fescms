<?php
/**
 * treeview.php
 * @author: allen
 * @date  2020年4月24日下午5:45:20
 * @copyright  Copyright igkcms
 */
use backend\widgets\CategoryWidget;
use yii\base\Widget;
use app\widgets\JsBlock;
/* @var $this yii\web\View */
$this->registerJsFile(
    '@web/static/admin/js/jquery.metisMenu.js',
    ['depends' => [\yii\web\YiiAsset::className()]]
    );


?>
<div class="modal-header">
    <h4 class="modal-title" id="ajaxModalLabel">选择栏目</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    
  </div>
  <div class="modal-body ajaxmodal-content">
    <ul class="list-unstyled category-tree" id="categoryTree">
		<?=CategoryWidget::widget(['data'=>$categorys])?>
	</ul>
    
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
    <button type="button" class="btn btn-primary" id="categoryTreeBtn">确定</button>
  </div>



<?php JsBlock::begin()?>
<script>
	var catid,catname;
	$(function () {
		$('#categoryTree').metisMenu({ toggle: false });
		$(':radio').click(function(){
			catid = $(this).val();
			catname = $(this).attr('data-name');
        })
        $('#categoryTreeBtn').click(function(){
            $('input[name="catname"]').val(catname);
            $('#content-catid').val(catid);
            $('#ajaxModal').modal('hide');
        })
    })
	var callbackdata = function(){
		var data={catid:catid,catname:catname};
		return data;
	}
</script>
<?php JsBlock::end()?>


