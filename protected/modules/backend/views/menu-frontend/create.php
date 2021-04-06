<?php


/* @var $this yii\web\View */
/* @var $model common\models\MenuFrontend */

$this->title = Yii::t('app', 'Menu Frontends');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menu Frontends'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create Menu');
$this->params['subtitle'] = Yii::t('app', 'Create Menu');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

