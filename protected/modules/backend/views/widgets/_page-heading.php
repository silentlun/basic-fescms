<?php
/**
* page-heading 
*
* @author  Allen
* @date  2020-4-7 上午11:32:00
* @copyright  Copyright igkcms
*/
use yii\helpers\Html;
use app\widgets\bootstrap5\Breadcrumbs;

?>
<div class="page-title-box">
	<div class="page-title-right">
		<?= Breadcrumbs::widget([
            'homeLink' => false,
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
        ?>
	</div>
	<h4 class="page-title"><?= Html::encode($this->title) ?></h4>
</div>
