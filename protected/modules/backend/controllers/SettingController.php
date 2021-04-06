<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use app\models\Setting;
use yii\web\NotFoundHttpException;
use backend\models\SettingForm;
use backend\models\UploadForm;
use yii\web\UnprocessableEntityHttpException;

/**
 * ConfigController implements the CRUD actions for Config model.
 */
class SettingController extends BaseController
{

    /**
     * 基本设置
     */
    public function actionIndex()
    {
        $model = new SettingForm();
        $model->getSetting();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->setSetting()) {
            if (Yii::$app->request->isAjax){
                \Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                return ['code' => 200, 'message' => Yii::t('app', 'Save Success')];
            }else{
                Yii::$app->session->setFlash('success', Yii::t('app', 'Save Success'));
                return $this->redirect(Yii::$app->request->referrer);
            }
        } else {
            return $this->render('setting', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * 支付宝支付设置
     */
    public function actionUpload()
    {
        $model = new UploadForm();
        $model->getSetting();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->setSetting()) {
            if (Yii::$app->request->isAjax){
                \Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                return ['code' => 200, 'message' => Yii::t('app', 'Save Success')];
            }else{
                Yii::$app->session->setFlash('success', Yii::t('app', 'Save Success'));
                return $this->redirect->redirect(Yii::$app->request->referrer);
            }
        } else {
            return $this->render('upload', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * 自定义设置
     */
    public function actionCustom()
    {
        $settings = Setting::find()->where(['type' => Setting::TYPE_CUSTOM])->orderBy("id")->indexBy('id')->all();
        
        if (Model::loadMultiple($settings, Yii::$app->request->post()) && Model::validateMultiple($settings)) {
            foreach ($settings as $setting) {
                $setting->save(false);
            }
            Yii::$app->session->setFlash('success', Yii::t('app', 'Save Success'));
        }
        
        return $this->render('custom', ['settings' => $settings]);
    }

    /**
     * Creates a new Config model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCustomCreate()
    {
        $model = new Setting();
        $model->type = Setting::TYPE_CUSTOM;

        $this->activeFormValidate($model);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Save Success'));
            return $this->goBack();
            
        }
        Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
        

        return $this->render('custom_create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Config model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCustomUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Save Success'));
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['status' => 1, 'code' => 200, 'message' => Yii::t('app', 'Save Success')];
            }else{
                return $this->redirect(['custom']);
            }
        }

        return $this->render('custom_update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Config model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCustomDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', Yii::t('app', 'Delete Success'));
        return $this->redirect(['custom']);
    }
    
    /**
     * Finds the Config model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Config the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Setting::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


}
