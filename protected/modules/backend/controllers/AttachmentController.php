<?php

namespace backend\controllers;

use Yii;
use app\models\Attachment;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use app\components\UploadAction;
use backend\models\AttachmentAddressForm;
use yii\helpers\ArrayHelper;
use backend\models\AttachmentSearch;

/**
 * AttachmentController implements the CRUD actions for Attachment model.
 */
class AttachmentController extends BaseController
{
    /**
     * Lists all Attachment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Attachment::find(),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionViewLayer($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionThumbs($filepath)
    {
        $thumbs = [];
        $infos = glob(dirname(Yii::getAlias('@uploads/').$filepath).'/thumb_*'.basename($filepath));
        if ($infos) {
            foreach ($infos as $n => $thumb) {
                $thumbs[$n]['thumb_url'] = str_replace(Yii::getAlias('@uploads/'), Yii::$app->config->site_upload_url, $thumb);
                $thumbinfo = explode('_', basename($thumb));
                $thumbs[$n]['thumb_filepath'] = $thumb;
                $thumbs[$n]['width'] = $thumbinfo[1];
                $thumbs[$n]['height'] = $thumbinfo[2];
            }
        }
        
        return $this->renderAjax('thumb', [
            'thumbs' => $thumbs,
        ]);
    }
    
    public function actionThumbdelete()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $filepath = urldecode(Yii::$app->request->post('filepath'));
        
        $ext = strtolower(trim(substr(strrchr($filepath, '.'), 1, 10)));
        if(!in_array(strtoupper($ext),array('JPG','GIF','BMP','PNG','JPEG'))) return ['code' => 0, 'message' => Yii::t('app', 'Error')];
        $reslut = unlink($filepath);
        if ($reslut) {
            return ['code' => 200, 'message' => Yii::t('app', 'Success')];
        } else {
            return ['code' => 0, 'message' => Yii::t('app', 'Error')];
        }
        
    }
    
    public function actionAddress()
    {
        $filterTables = ['auth_assignment', 'auth_item', 'auth_item_child', 'auth_rule', 'migration'];
        
        $model = new AttachmentAddressForm();
        
        if ($model->load(Yii::$app->request->post())) {
            $tables = Yii::$app->db->createCommand('show tables')->queryAll();
            foreach ($tables as $k => $v) {
                $tableName = array_pop($v);
                if (in_array($tableName, $filterTables)) continue;
                $columns = Yii::$app->db->getTableSchema($tableName)->columns;
                $fields = ArrayHelper::map($columns, 'name', 'dbType');
                if ($fields) {
                    $sql = '';
                    foreach ($fields as $key=>$val) {
                        //对数据表进行过滤，只有VARCHAR、TEXT或mediumtext类型的字段才可以保存下附件的地址。
                        if (preg_match('/(varchar|text|mediumtext)+/i', $val)) {
                            $sql .= !empty($sql) ? ", `$key`=replace(`$key`, '{$model->old_attachment_path}', '{$model->new_attachment_path}')" : "`$key`=replace(`$key`, '{$model->old_attachment_path}', '{$model->new_attachment_path}')";
                        }
                    }
                    if (!empty($sql)) Yii::$app->db->createCommand("UPDATE {$tableName} SET $sql")->execute();
                }
            }
            Yii::$app->session->setFlash('success', Yii::t('app', 'Operation Success'));
            return $this->redirect(['index']);
        }
        
        return $this->render('address', [
            'model' => $model,
        ]);
    }
    
    public function actionAlbum()
    {
        $model = new AttachmentSearch();
        $dataProvider = $model->search(Yii::$app->request->queryParams);
        
        return $this->render('album', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Attachment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Attachment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Save Success'));
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Attachment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Save Success'));
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Attachment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Attachment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Attachment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function actions()
    {
        return [
            'upload' => [
                'class' => UploadAction::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Attachment::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Attachment::className(),
            ],
        ];
    }
}
