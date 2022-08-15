<?php

namespace backend\controllers;

use Yii;
use app\models\MenuFrontend;
use yii\data\ArrayDataProvider;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * MenuFrontendController implements the CRUD actions for MenuFrontend model.
 */
class MenuFrontendController extends BaseController
{

    /**
     * Lists all MenuFrontend models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => MenuFrontend::getMenuGrid(),
            'pagination' => false,
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new MenuFrontend model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actions()
    {
        return [
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => MenuFrontend::className(),
                'parentId' => Yii::$app->request->get('id'),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => MenuFrontend::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => MenuFrontend::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => MenuFrontend::className(),
            ],
        ];
    }
}
