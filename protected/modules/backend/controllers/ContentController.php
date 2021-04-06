<?php

namespace backend\controllers;

use Yii;
use app\models\Content;
use backend\models\ContentSearch;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends BaseController
{

    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['ContentSearch']['catid'] = Yii::$app->request->get('catid');
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
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
                'modelClass' => Content::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Content::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Content::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Content::className(),
            ],
        ];
    }
}
