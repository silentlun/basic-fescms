<?php

namespace backend\controllers;

use Yii;
use backend\models\AdminLog;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use backend\actions\DeleteAction;

/**
 * LogController implements the CRUD actions for AdminLog model.
 */
class LogController extends BaseController
{

    /**
     * Lists all AdminLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AdminLog::find()->with('admin'),
            'sort' => [
                'attributes' => [
                    'id',
                    'route',
                ],
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdminLog model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->renderAjax('view', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the AdminLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdminLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdminLog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => AdminLog::className(),
            ],
        ];
    }
}
