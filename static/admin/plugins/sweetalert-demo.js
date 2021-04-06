$("#sa-success").click(function() {
	Swal.fire({
		title: '操作成功',
		type: 'success',
		showConfirmButton: false
	})
})
$("#sa-info").click(function() {
	parent.swal({
		title: '操作成功',
		type: 'info'
	})
})
$("#sa-error").click(function() {
	parent.swal({
		title: '操作成功',
		type: 'error'
	})
})
$("#sa-warning").click(function() {
	swal(
		'操作成功!',
		'一个成功的提示!',
		'warning'
	)
})
$("#sa-question").click(function() {
	swal(
		'操作成功!',
		'一个成功的提示!',
		'question'
	)
})
$("#sa-title").click(function() {
	parent.swal({
		title: '再给我俩秒钟',
		text: '2秒后关闭弹框',
		timer: 2000
	})
})

$("#sa-warning1").click(function() {
	parent.swal({
		title: '删除',
		text: "你确定删除么?",
		type: 'warning', //感叹号图标
		showCancelButton: true, //显示取消按钮
		

	}).then(function() { //大部分，then是通用的回调函数
		parent.swal(
			'Deleted!',
			'Your file has been deleted.',
			'success'
		)
	}, function(dismiss) {
		// dismiss can be 'cancel', 'overlay',
		// 'close', and 'timer'
		if (dismiss === 'cancel') {
			parent.swal(
				'Cancelled',
				'Your imaginary file is safe :)',
				'error'
			)
		}
	})
})
//下面可以使用ajax进行异步操作
$("#prompt").click(function() {
	swal({
		title: '输入一段不为空的值，且格式是email格式', //标题
		input: 'email', //封装的email类型  列如qq@qq.com
		showCancelButton: true,
		confirmButtonText: 'Submit', //同上，重复的我就不注释了哈~
		showLoaderOnConfirm: true,
		preConfirm: function(email) { //功能执行前确认操作，支持function
			return new Promise(function(resolve, reject) {
				setTimeout(function() { //添加一个时间函数，在俩秒后执行，这里可以用作异步操作数据
					if (email === 'taken@example.com') { //这里的意思是：如果输入的值等于'taken@example.com',数据已存在，提示信息
						reject('用户已存在') //提示信息
					} else {
						resolve() //方法出口
					}
				}, 2000)
			})
		},
		allowOutsideClick: false
	}).then(function(email) {
		swal({
			type: 'success',
			title: 'Ajax request finished!',
			html: '提交的email是 ' + email
		})
	})
})

$("#checkbox").click(function() {
	swal({
		title: 'checkbox验证',
		input: 'checkbox',
		inputValue: 1,
		inputPlaceholder: //设置复选框的值
			'只有选中那个复选框，按钮才有效',
		confirmButtonText: //支持html格式，<i class="fa fa-arrow-right></i>这一块使用了一个样式，就是那个箭头
			'Continue <i class="fa fa-arrow-right></i>',
		inputValidator: function(result) {
			return new Promise(function(resolve, reject) {
				if (result) {
					resolve() //默认不选中复选框
				} else {
					reject('你需要选中checkbox') //否则提示信息
				}
			})
		}
	}).then(function(result) { //回调函数
		swal({
			type: 'success',
			text: 'You agreed with T&C :)'
		})
	})
})

$("#form").click(function() {
	swal({
		title: 'Multiple inputs',
		html: //html标签，在弹出框中直接写相关代码，相当于可以再嵌套一个网页！ 

			'<input id="swal-input1" class="swal2-input" autofocus>' + //支持css样和式其他jquery方法
			'<input id="swal-input2" class="swal2-input">',
		preConfirm: function() {
			return new Promise(function(resolve) { //默认信息不能为空

				resolve([
					$('#swal-input1').val(), //获取文本值
					$('#swal-input2').val()
				])

			})
		}
	}).then(function(result) {
		swal(JSON.stringify(result)) //转换成json输出
	})

})
