<?php


/* @var $this yii\web\View */
/* @var $model app\models\Tag */

$this->title = Yii::t('app', 'Tags');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create Tag');
$this->params['subtitle'] = Yii::t('app', 'Create Tag');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

