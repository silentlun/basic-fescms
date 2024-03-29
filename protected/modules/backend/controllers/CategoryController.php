<?php

namespace backend\controllers;

use Yii;
use app\models\Category;
use yii\web\NotFoundHttpException;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use yii\data\ArrayDataProvider;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends BaseController
{

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => Category::getCategoryGrid(),
            'pagination' => false,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /* public function actionCreate($id = 0)
    {
        $model = new Category();
        $model->parent_id = $id;

        if ($model->load(Yii::$app->request->post())) {
            $data = [];
            $options = $model->attributes['options'];
            $options = explode("\n", trim($options));
            foreach ($options as $k => $_v){
                if(trim($_v)=='') continue;
                $names = explode('|', $_v);
                $data[$k]['catname'] = trim($names[0]);
                $data[$k]['catdir'] = trim($names[1]);
                $data[$k]['parent_id'] = intval($model->attributes['parentid']);
                $data[$k]['category_template'] = $model->attributes['category_template'];
                $data[$k]['list_template'] = $model->attributes['list_template'];
                $data[$k]['show_template'] = $model->attributes['show_template'];
                $data[$k]['page_template'] = $model->attributes['page_template'];
            }
            Yii::$app->db->createCommand()->batchInsert(Category::tableName(), ['catname', 'catdir', 'parent_id', 'category_template', 'list_template', 'show_template', 'page_template'], $data)->execute();
            
            Yii::$app->session->setFlash('success', Yii::t('app', 'Save Success'));
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    } */

    /**
     * Treeview an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionTreeview()
    {
        $categorys = Category::find()->where(['type' => 0])->orderBy('sort asc,id asc')->indexBy('id')->asArray()->all();
        return $this->renderAjax('treeview', [
            'categorys' => $categorys,
        ]);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function actions()
    {
        return [
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Category::className(),
                'parentId' => Yii::$app->request->get('id'),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Category::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Category::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Category::className(),
            ],
        ];
    }
}
