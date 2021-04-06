<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Config */

$this->title = Yii::t('app', 'Update Custom Field');
$this->params['url'] = Url::toRoute(['setting/custom-update']);
?>
<?= $this->render('_custom_form', [
    'model' => $model,
]) ?>
