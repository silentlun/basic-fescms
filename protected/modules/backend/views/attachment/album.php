<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use backend\widgets\ActiveForm;
use silentlun\daterange\DateRangePicker;
use app\widgets\bootstrap5\LinkPager;
use app\widgets\JsBlock;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

?>
<style>
body{background-color: #FFFFFF;}
.container-fluid{padding:0}

.mailbox-attachments {
    border: 1px solid #e7eaec;
}
.mailbox-attachments.active {
    border: 1px solid #62a8ea !important;
    box-sizing: border-box;
}

.mailbox-attachment-name {
	font-weight: bold;
	color: #666
}
.mailbox-attachment-info span {
    width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    margin: 0;
    display: block;
}

.mailbox-attachment-icon,
.mailbox-attachment-info,
.mailbox-attachment-size {
	display: block
}

.mailbox-attachment-info {
	padding: 10px;
	background: #f4f4f4;
}

.mailbox-attachment-size {
	color: #999;
	font-size: 12px
}

.mailbox-attachment-icon {
	text-align: center;
	font-size: 65px;
	color: #666;
	padding: 20px 10px
}

.mailbox-attachment-icon.has-img {
	padding: 0
}

.mailbox-attachment-icon.has-img>img {
	max-width: 100%;
	height: auto
}
			
</style>
<?php $form = ActiveForm::begin([
    'layout' => 'inline',
    'method' => 'get',
    'options' => ['class' => 'none-loading mb-3 row gy-2 gx-3 align-items-center', 'autocomplete' => 'off'],
]); ?>
	<?= $form->field($model, 'createTimeRange')->widget('silentlun\daterange\DateRangePicker',['pluginOptions'=>[
        'locale'=>[
            'format'=>'YYYY-MM-DD'
        ]
    ]]) ?>
	
	<?= $form->field($model, 'filename')->textInput() ?>
	<div class="col-auto">
	<button type="submit" class="btn btn-primary">搜索</button>
	</div>
<?php ActiveForm::end(); ?>

<?=ListView::widget([
    'id' => 'rfAttachmentList',
    'dataProvider' => $dataProvider,
    'itemOptions' => [
        'tag' => 'div',
        'class' => 'col',
    ],
    'itemView' => '_item-album',
    'layout' => '<div class="row  row-cols-4 g-2">{items}</div><div class="mt-3">{pager}</div>',
    'pager' => [
        'class' => LinkPager::class,
        'maxButtonCount' => 5,
        'nextPageLabel' => '下一页',
        'prevPageLabel' => '上一页',
    ],
]);?>
<?php JsBlock::begin()?>
<script>
//图片/文件选择
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
</script>
<?php JsBlock::end()?>
