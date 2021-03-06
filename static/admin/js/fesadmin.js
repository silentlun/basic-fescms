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
			        parent.layer.load(2);
			    },
			    success: function (data) {
			        parent.layer.closeAll('loading');
					option.success(data);
			    },
			    error: function (jqXHR, textStatus, errorThrown) {
			        if( jqXHR.hasOwnProperty("responseJSON") ){
			            parent.layer.alert(jqXHR.responseJSON.message, {icon: 2})
			        }else{
			            parent.layer.alert(jqXHR.responseText, {icon: 2})
			        }
			    },
			    complete: function () {
			        parent.layer.closeAll('loading');
			    }
			});
		}
	};
}();

yii.confirm = function(message, ok, cancel) {
    var url = $(this).attr('href');
    var if_pjax = $(this).attr('data-pjax') ? $(this).attr('data-pjax') : 0;
    var method = $(this).attr('data-method') ? $(this).attr('data-method') : "post";
    var data = $(this).attr('data-params') ? JSON.parse( $(this).attr('data-params') ) : '';
    parent.layer.confirm(message, {icon: 3, title:'提示'}, function(index){
        if( parseInt( if_pjax ) ){
            !ok || ok();
        }else {
			App.ajax({
				url: url,
				type: method,
				data: data,
				success: function (data) {
					parent.layer.msg('操作成功！', {icon: 1}, function(){
						location.reload();
					});
				}
			});
        }
		parent.layer.close(index);
    }, function(){//cancel
        !cancel || cancel();
    });
}
$(function() {
	$('.full-height-scroll').slimscroll({
		height: '100%'
	})

	var container = "#pjax-container"; //容器
	if ($.support.pjax) {
		$(document).pjax('a[data-pjax],form[data-pjax]', container);
	}

	$(container).on('pjax:beforeSend', function(args) {
		//alert('beforeSend');
		//Apps.loading();
		parent.layer.load(2);
	})
	$(container).on('pjax:error', function(args) {
		//alert('error');
	})
	$(container).on('pjax:complete', function(args) {
		//alert('success');
		//Apps.closeAll();
		parent.layer.closeAll('loading');
	})
	//多选后处理ajax
	$(document).on('click','.multi-operate-ajax',function(e){
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
			parent.layer.alert('未选中任何数据！', {icon: 2})
	        return false;
	    }
	    parent.layer.confirm($(this).attr("data-confirm"), {icon: 3, title:'提示'}, function() {
	        if( that.hasClass("jump") ){//含有jump的class不做ajax处理，跳转页面
	            var jumpUrl = url.indexOf('?') !== -1 ? url + '&' + paramSign + '=' + ids : url + '?' + paramSign + '=' + ids;
	            location.href = jumpUrl;
	            return false;
	        }
	        var data = {};
	        data[paramSign] = JSON.stringify(ids);
			App.ajax({
				url: url,
				type: method,
				data: {id:ids},
				success: function (data) {
					parent.layer.closeAll();
					location.reload();
				}
			});
	        
	    }, function (index) {
	        parent.layer.close(index);
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
		    parent.layer.alert('未选中任何数据！', {icon: 2})
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
	    layer.load(2);
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
				layer.msg('保存成功');
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
		parent.window.$("#att-status_"+modalId).html(imgUrl);
	});

});

function ruselinkurl(){
	if($("#islink").prop('checked')){
		$('#linkurl').removeAttr('disabled');
	}else{
		$('#linkurl').attr('disabled',true);
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
//parent.layer.load(2);