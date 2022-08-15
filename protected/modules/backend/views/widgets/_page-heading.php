<?php
/**
* page-heading 
*
* @author  Allen
* @date  2020-4-7 上午11:32:00
* @copyright  Copyright igkcms
*/
use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;

?>
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0"><?= Html::encode($this->title) ?></h4>
    <div class="page-title-right">
        <?= Breadcrumbs::widget([
        'homeLink' => false,
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
    ?>
    </div>

</div>
