<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Config */

$this->title = Yii::t('app', 'Create Custom Field');
$this->params['url'] = Url::toRoute(['setting/custom-create']);
?>
<?= $this->render('_custom_form', [
    'model' => $model,
]) ?>
