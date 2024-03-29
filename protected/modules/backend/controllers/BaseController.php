<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\components\AccessControl;
use yii\helpers\Url;
//use yii\filters\AccessControl;

/**
 * Default controller for the `admin` module
 */
class BaseController extends Controller
{
    public $layout = "@backend/views/layouts/main";
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'user' => 'admin',
                'allowActions' => [
                    'backend/site/*',
                    'backend/setting/custom-create',
                    'backend/setting/custom-update',
                    'backend/setting/custom-delete',
                    'backend/admin/update-self',
                    'backend/category/treeview',
                    'backend/tag/push',
                    'backend/tag/data',
                    'backend/page/*',
                    'backend/clear/*',
                    'backend/attachment/*',
                    'backend/debug/*',
                    'backend/gii/*',
                ],
                'superAdminUserIds' => 1,
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'captcha'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index', 'main'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if ($action->id == 'index') Yii::$app->response->cookies->remove('att_json');
            return true;
        }
        
        return false;
    }
    
    public function goHome()
    {
        return $this->response->redirect(Url::toRoute(['/backend/site/index']));
    }
    
    protected function activeFormValidate($model)
    {
        if (Yii::$app->request->isAjax && !Yii::$app->request->isPjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                Yii::$app->response->data = \yii\widgets\ActiveForm::validate($model);
                Yii::$app->end();
            }
        }
    }
    
    /**
     * 获取指定日期段内每一天的日期
     * @param  Date  $startdate 开始日期
     * @param  Date  $enddate   结束日期
     * @return Array
     */
    protected function getDateFromRange($startDate, $endDate){
        
        $stimestamp = strtotime($startDate);
        $etimestamp = strtotime($endDate);
        
        // 计算日期段内有多少天
        $days = ($etimestamp-$stimestamp)/86400+1;
        
        // 保存每天日期
        $date = [];
        
        for($i=0; $i<$days; $i++){
            $date[] = date('Y-m-d', $stimestamp+(86400*$i));
        }
        
        return $date;
    }
}
