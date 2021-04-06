<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<!--ajax模拟框加载-->
<div class="modal fade" id="ajaxModal" aria-hidden="true" role="dialog" aria-labelledby="ajaxModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?= Html::img('@web/static/admin/images/loading.gif', ['class' => 'loading']) ?>
                <span>加载中... </span>
            </div>
        </div>
    </div>
</div>
<!--ajax大模拟框加载-->
<div class="modal fade" id="ajaxModalLg" aria-hidden="true" role="dialog" aria-labelledby="ajaxModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <?= Html::img('@web/static/admin/images/loading.gif', ['class' => 'loading']) ?>
                <span>加载中... </span>
            </div>
        </div>
    </div>
</div>
<!--ajax小模拟框加载-->
<div class="modal fade" id="ajaxModalMin" aria-hidden="true" role="dialog" aria-labelledby="ajaxModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <?= Html::img('@web/static/admin/images/loading.gif', ['class' => 'loading']) ?>
                <span>加载中... </span>
            </div>
        </div>
    </div>
</div>
<!--ajax自定义模拟框加载-->
<div class="modal fade" id="customModal" aria-hidden="true" role="dialog" aria-labelledby="customModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?= Html::img('@web/static/admin/images/loading.gif', ['class' => 'loading']) ?>
                <span>加载中... </span>
            </div>
        </div>
    </div>
</div>
<!--初始化模拟框-->
<div id="rfModalBody" class="d-none">
    <div class="modal-body">
        <?= Html::img('@web/static/admin/images/loading.gif', ['class' => 'loading']) ?>
        <span>加载中... </span>
    </div>
</div>
<script>
    // 默认模拟框清除
    $('#ajaxModal').on('hide.bs.modal', function (e) {
        if (e.target == this) {
            $(this).removeData("bs.modal");
            $('#ajaxModal').find('.modal-content').html($('#rfModalBody').html());
        }
    }).on('show.bs.modal', function (e) {
 	    var button = $(e.relatedTarget);
 	    var modal = $(this);
 	    modal.find('.modal-content').load(button.data("remote"));
 	 });
    // 大模拟框清除
    $('#ajaxModalLg').on('hide.bs.modal', function (e) {
        if (e.target == this) {
            $(this).removeData("bs.modal");
            $('#ajaxModalLg').find('.modal-content').html($('#rfModalBody').html());
        }
    }).on('show.bs.modal', function (e) {
 	    var button = $(e.relatedTarget);
 	    var modal = $(this);
 	    modal.find('.modal-content').load(button.data("remote"));
 	 });
    // 小模拟框清除
    $('#ajaxModalMin').on('hide.bs.modal', function (e) {
        if (e.target == this) {
            $(this).removeData("bs.modal");
            $('#ajaxModalMax').find('.modal-content').html($('#rfModalBody').html());
        }
    }).on('show.bs.modal', function (e) {
 	    var button = $(e.relatedTarget);
 	    var modal = $(this);
 	    modal.find('.modal-content').load(button.data("remote"));
 	 });
    // 自定义模拟框清除
    /* $('#customModal').on('hide.bs.modal', function (e) {
        if (e.target == this) {
            $(this).removeData("bs.modal");
            $('#customModal').find('.modal-content').html($('#rfModalBody').html());
        }
    }).on('show.bs.modal', function (e) {
 	    var button = $(e.relatedTarget);
 	    var modal = $(this);
 	    var url = button.attr('href');
  	   console.log(url);
  	    var ids = [];
		$("input[name='selection[]']:checked").each(function(){
		    ids.push($(this).val());
		});
		if(ids.length <= 0){
		    parent.layer.alert('未选中任何数据！', {icon: 2});
		    $('#customModal').modal('hide')
		    return false;
		}
		var param = ids.join(",");
		url = url.indexOf('?') !== -1 ? url + '&ids=' + param : url + '?ids=' + param;
		console.log(url);
 	    modal.find('.modal-content').load(url);
 	}); */
    $('#customModal').on('hide.bs.modal', function (e) {
        if (e.target == this) {
            $(this).removeData("bs.modal");
            $('#customModal').find('.modal-content').html($('#rfModalBody').html());
        }
    })

</script>