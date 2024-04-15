<?php

use yii\helpers\Html;
use app\widgets\JsBlock;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Content */

?>
<div class="modal-header">
    <h5 class="modal-title">缩略图管理</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
  	<div class="row">
		<?php foreach($thumbs as $thumb) {?>
		<div class="col-md-3">
			<div class="card">
              <?= Html::img($thumb['thumb_url'], ['class' => 'card-img-top']) ?>
              <div class="card-footer d-flex justify-content-between px-2">
                <span><?= $thumb['width']?> X <?= $thumb['height']?></span>
                <?=Html::button('<i class="fa fa-close"></i> 删除', ['class' => 'btn btn-xs btn-danger',
                    'onclick' => "thumbDelete('".urlencode($thumb['thumb_filepath'])."',this)"])?>
              </div>
            </div>
		</div>
		<?php } ?>
	</div>
  </div>

<?php JsBlock::begin() ?>
<script>

    function thumbDelete(filepath, obj) {
    	parent.swal({
			title: '<?=Yii::t('app', 'Are you sure you want to delete this data?') ?>',
			type: 'question',
			showConfirmButton: true,
			showCancelButton: true,
		}).then(function() {
			App.ajax({
				url: '<?=Url::toRoute(['attachment/thumbdelete'])?>',
				type: 'post',
                data: {filepath:filepath},
                success: function (data) {
                	if(data.code == 200){
                		$(obj).parent().parent().parent().fadeOut("slow");
                	}
                }
			});
		})
        return false;
    }
</script>
<?php JsBlock::end() ?>
