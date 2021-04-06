<?php


/* @var $this yii\web\View */
/* @var $model app\models\Link */

$this->title = Yii::t('app', 'Links');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create Link');
$this->params['subtitle'] = Yii::t('app', 'Create Link');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

