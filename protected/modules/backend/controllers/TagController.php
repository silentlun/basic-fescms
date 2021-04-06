<?php

namespace backend\controllers;

use Yii;
use app\models\Tag;
use yii\data\ActiveDataProvider;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use app\models\Content;
use backend\models\PushPositionForm;

/**
 * TagController implements the CRUD actions for Tag model.
 */
class TagController extends BaseController
{

    /**
     * Lists all Tag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tag::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    public function actionData($id)
    {
        $module = Yii::$app->request->get('module');
        $query = Content::find()->with('category')->anyTagValues($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
                'attributes' => [
                    'id',
                ],
            ],
        ]);
        return $this->render('data', [
            'dataProvider' => $dataProvider,
            'module' => $module,
        ]);
    }
    
    public function actionRemove()
    {
        $request = Yii::$app->request;
        if ($request->isPost){
            $ids = $request->post('id');
            $module = $request->get('module');
            if (is_array($ids)){
                foreach ($ids as $id){
                    $model = Content::findOne($id);
                    $model->removeDelete();
                }
            }else{
                $model = Content::findOne($ids);
                $model->removeDelete();
            }
        }
        Yii::$app->session->setFlash('success', Yii::t('app', 'Operation Success'));
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['code' => 200, 'message' => Yii::t('app', 'Success')];
    }
    
    public function actionPush()
    {
        $model = new PushPositionForm();
        $model->ids = Yii::$app->request->get('ids');
        $module = Yii::$app->request->get('module');
        $this->activeFormValidate($model);
        if ($model->load(Yii::$app->request->post())) {
            //$content = new Content();
            //$content->pushPosition($model);
            $ids = explode(',', $model->ids);
            $contents = Content::find()->where(['in', 'id', $ids])->all();
            foreach ($contents as $content) {
                $content->tagValues = $model->posid;
                $content->save();
            }
            Yii::$app->session->setFlash('success', Yii::t('app', 'Operation Success'));
            return $this->goBack();
        }
        Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
        return $this->render('push', [
            'model' => $model,
            'module' => $module,
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
                'modelClass' => Tag::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Tag::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Tag::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Tag::className(),
            ],
        ];
    }
}
