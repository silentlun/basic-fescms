<?php

namespace backend\controllers;

use Yii;
use app\models\Link;
use yii\data\ActiveDataProvider;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * LinkController implements the CRUD actions for Link model.
 */
class LinkController extends BaseController
{

    /**
     * Lists all Link models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Link::find(),
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
                'modelClass' => Link::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Link::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Link::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Link::className(),
            ],
        ];
    }
}
