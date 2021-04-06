<?php

namespace backend\controllers;

use Yii;
use app\models\Feedback;
use yii\data\ActiveDataProvider;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * FeedbackController implements the CRUD actions for Feedback model.
 */
class FeedbackController extends BaseController
{

    /**
     * Lists all Feedback models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Feedback::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Feedback::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Feedback::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Feedback::className(),
            ],
        ];
    }
}
