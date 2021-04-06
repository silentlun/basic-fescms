<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Feedback;

class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'feedback' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'maxLength' => 5,//最大显示个数
                'minLength' => 4,//最少显示个数
                'padding' => 2,//验证码字体大小，数值越小字体越大
                'height' => 44,
                'width' => 120,
                'offset' => 4,//设置字符偏移量
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionFeedback()
    {
        $model = new Feedback();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Thank you for contacting us. We will respond to you as soon as possible.'));

            return $this->redirect(Yii::$app->request->referrer);
        } else {
            $tmp_error = $model->getFirstErrors();
            foreach($model->activeAttributes() as $error) {
                if(isset( $tmp_error[$error]) && !empty($tmp_error[$error])){
                    Yii::$app->session->setFlash('error', $tmp_error[$error]);
                }
            }
            
            return $this->redirect(Yii::$app->request->referrer);
        }
        
    }
}
