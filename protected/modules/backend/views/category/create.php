<?php

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create Category');
$this->params['subtitle'] = Yii::t('app', 'Create Category');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

