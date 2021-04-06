<?php

namespace backend\controllers;

use Yii;
use app\models\Partner;
use yii\data\ActiveDataProvider;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * PartnerController implements the CRUD actions for Partner model.
 */
class PartnerController extends BaseController
{

    /**
     * Lists all Partner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Partner::find(),
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
                'modelClass' => Partner::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Partner::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Partner::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Partner::className(),
            ],
        ];
    }
}
