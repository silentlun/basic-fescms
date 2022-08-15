
var App = function () {
	return {
		ajax:function(settings){
			var settings = settings || {};
			let option = $.extend({}, {
				dataType:'json',
				type:'get',
				data:{},
				success: function(data){}
			}, settings);
			$.ajax({
			    url: option.url,
			    dataType: option.dataType,
			    type: option.type,
			    data: option.data,
			    beforeSend: function () {
					parent.App.loading();
			        //parent.layer.load(2);
			    },
			    success: function (data) {
					parent.App.closeAll();
			        //parent.layer.closeAll('loading');
					option.success(data);
			    },
			    error: function (jqXHR, textStatus, errorThrown) {
			        if( jqXHR.hasOwnProperty("responseJSON") ){
						parent.swal({title: jqXHR.responseJSON.message, type: 'error'})
			            //parent.layer.alert(jqXHR.responseJSON.message, {icon: 2})
			        }else{
						parent.swal({title: jqXHR.responseText, type: 'error'})
			            //parent.layer.alert(jqXHR.responseText, {icon: 2})
			        }
			    },
			    complete: function () {
					parent.App.closeAll();
			        //parent.layer.closeAll('loading');
			    }
			});
		},
		loading:function(){
			var div = document.createElement("div");
			div.id = 'loadingDiv';
			div.style.position = 'fixed';
			div.style.top = 0;
			div.style.left = 0;
			div.style.right = 0;
			div.style.bottom = 0;
			div.style.zIndex = '99999';
			div.style.background = 'rgba(0,0,0,0)';
			div.innerHTML = '<div class="spinner-border text-primary" style="border-width: 0.125rem;position: absolute;left: 50%;top: 50%;margin: -1rem 0 0 -1rem;display: block;"></div>';
			document.body.appendChild(div);
		
		},
		closeAll:function(){
			document.getElementById("loadingDiv")&&document.body.removeChild(document.getElementById("loadingDiv"));
		}
	};
}();

yii.confirm = function(message, ok, cancel) {
    var url = $(this).attr('href');
    var if_pjax = $(this).attr('data-pjax') ? $(this).attr('data-pjax') : 0;
    var method = $(this).attr('data-method') ? $(this).attr('data-method') : "post";
    var data = $(this).attr('data-params') ? JSON.parse( $(this).attr('data-params') ) : '';
	parent.swal({
		title: message,
		type: 'question',
		showConfirmButton: true,
		showCancelButton: true,
	}).then(function() {
		if( parseInt( if_pjax ) ){
		    !ok || ok();
		}else {
			App.ajax({
				url: url,
				type: method,
				data: data,
				success: function (data) {
					if(data.code == 200){
						parent.swal({title: data.message, type: 'success', timer: 2000}).then(function() {location.reload();})
					}else{
						parent.swal({title: data.message, type: 'error'})
					}
					
					
				}
			});
		}
	}, function(dismiss) {
		!cancel || cancel();
	})
}
$(function() {

	var container = "#pjax-container"; //容器
	if ($.support.pjax) {
		$(document).pjax('a[data-pjax],form[data-pjax]', container);
	}

	$(container).on('pjax:beforeSend', function(args) {
		//alert('beforeSend');
		parent.App.loading();
		//parent.layer.load(2);
	})
	$(container).on('pjax:error', function(args) {
		//alert('error');
	})
	$(container).on('pjax:complete', function(args) {
		//alert('success');
		parent.App.closeAll();
		//parent.layer.closeAll('loading');
	})
	//多选后处理ajax
	$(container).on('click','.multi-operate-ajax',function(e){
	    e.preventDefault();
		var that = $(this);
	    var url = $(this).attr('href');
	    var method = $(this).attr('data-method') ? $(this).attr('data-method') : "post";
	    var paramSign = that.attr('param-sign') ? that.attr('param-sign') : "id";
	    var ids = [];
	    $(container+" input[name='selection[]']:checked").each(function(){
	        ids.push($(this).val());
	    });
	    if(ids.length <= 0){
			parent.swal({title: '未选中任何数据！', type: 'info', timer: 2000})
			//parent.layer.alert('未选中任何数据！', {icon: 2})
	        return false;
	    }
		parent.swal({
			title: $(this).attr("data-confirm"),
			type: 'question',
			showConfirmButton: true,
			showCancelButton: true,
		}).then(function() {
			if( that.hasClass("jump") ){//含有jump的class不做ajax处理，跳转页面
			    var jumpUrl = url.indexOf('?') !== -1 ? url + '&' + paramSign + '=' + ids : url + '?' + paramSign + '=' + ids;
			    location.href = jumpUrl;
			    return false;
			}
			App.ajax({
				url: url,
				type: method,
				data: {id:ids},
				success: function (data) {
					location.reload();
				}
			});
		}, function(dismiss) {
			parent.App.closeAll();
		})
	    return false;
	})
	$(document).on('click','.multi-operate-modal',function(event){
		event.preventDefault();
		var url = $(this).attr('href');
		var ids = [];
		$("input[name='selection[]']:checked").each(function(){
		    ids.push($(this).val());
		});
		if(ids.length <= 0){
			parent.swal({title: '未选中任何数据！', type: 'info', timer: 2000})
		    //parent.layer.alert('未选中任何数据！', {icon: 2})
		    return false;
		}
		$('#customModal').modal('show');
		
		return false;
		
	});
	$(document).on('show.bs.modal','#customModal', function (e) {
		var modal = $(this);
		var url = $('.multi-operate-modal').attr('href');
		var ids = [];
		$("input[name='selection[]']:checked").each(function(){
			ids.push($(this).val());
		});
		var param = ids.join(",");
		url = url.indexOf('?') !== -1 ? url + '&ids=' + param : url + '?ids=' + param;
		
		modal.find('.modal-content').load(url);
	})
	
	//提交表单后除form为none-loading的class显示loading效果
	$("form:not(.none-loading)").on("beforeSubmit", function () {
	    $(this).find("button[type=submit]").attr("disabled", true);
		//parent.App.loading();
	    //layer.load(2);
	})
	//排序
	$(document).on('click','.listorder',function(event){
		event.preventDefault();
		var url = $(this).attr('href');
		App.ajax({
			url: url,
			type: 'post',
			data: $("#myform").serialize(),
			success: function (data) {
				location.reload();
			}
		});
		
		
	});
	$(document).on('beforeSubmit', 'form#form-setting', function() {
		var form = $(this);
		if (form.find('.has-error').length) {
			return false;
		}
		App.ajax({
			url: form.attr('action'),
			type: 'post',
			data: form.serialize(),
			success: function (data) {
				//layer.msg('保存成功');
				parent.swal({title: '保存成功！', type: 'success', showConfirmButton: false, timer: 2000})
			}
		});
		return false;
	});
	
	$("input[name='Category[type]']").on("click",function () {
		//console.log($(this).val());
		if ($("input[name='Category[type]']:checked").val()== 0) {
			$('#category-list-template').show();
			$('#category-page-template').hide();
		} else {
			$('#category-list-template').hide();
			$('#category-page-template').show();
		}
	})
	$(document).on('click','.clear-refresh',function(event){
		event.preventDefault();
		var url = $(this).attr('href');
		App.ajax({
			url: url,
			success: function (data) {
				if(data.code == 200){
					parent.swal({title: '操作成功！', type: 'success', showConfirmButton: false, timer: 2000})
				}
			}
		});
		
		
	});
	
	// 图片/文件选择
	$(document).on("click", ".mailbox-attachment-icon", function (e) {
	    if (!$(this).parent().hasClass('active')) {
	        // 判断是否多选
	        if ($('#rfAttachmentList').data('multiple') != true) {
	            $('#rfAttachmentList .active').each(function (i, data) {
	                $(data).removeClass('active');
	            });
	        }
	
	        $(this).parent().addClass('active');
	    } else {
	        $(this).parent().removeClass('active');
	    }
		var imgUrl = $(this).parent().data('url');
		var modalId = $(this).parent().data('modal');
		parent.window.$("#att-status_"+modalId).html('|' + imgUrl);
	});

});

function ruselinkurl(id){
	if($("#islink").prop('checked')){
		$('#'+id).removeAttr('disabled');
	}else{
		$('#'+id).attr('disabled',true);
	}
}
function copyUrl(url){
        var oInput = document.createElement('input');
        oInput.value = url;
        document.body.appendChild(oInput);
        oInput.select(); // 选择对象
        document.execCommand("Copy"); // 执行浏览器复制命令
        oInput.className = 'hidden';
        oInput.style.display='none';
		layer.msg('复制成功');
}


function reCycleColor(c){var b=["#EC5335","#F7BC32","#8AC14C","#32AEDC","#8B9AD3","#D38BD1"];var a=b.length;if(c>=a){c=c%a}return b[c]}
function renderTicketColor(b,c){var a=reCycleColor(b);$("#"+c+b).css("background",a)}
function set_frame(id,src){
	$("#"+id).attr("src",src); 
}
function remove_div(id) {
	$('#'+id).remove();
}
//parent.layer.load(2);