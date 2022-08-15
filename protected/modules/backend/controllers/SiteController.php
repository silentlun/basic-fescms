<?php
/**
 * IndexController.php
 * @author: allen
 * @date  2021年3月15日下午5:48:49
 * @copyright  Copyright igkcms
 */
namespace backend\controllers;

use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use app\models\Content;
use app\models\Category;
use app\models\Feedback;
use app\models\Attachment;
use yii\helpers\ArrayHelper;
use app\models\VisitorStat;

class SiteController extends BaseController
{
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
                'height' => 40,
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
        if (Yii::$app->admin->isGuest) {
            return $this->redirect('backend/login');
        }
        return $this->renderPartial('index');
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionMain()
    {
        $request = Yii::$app->request;
        $startDate = $request->get('startDate', date('Y-m-d', time() - 7 * 86400));
        $endDate = $request->get('endDate', date('Y-m-d'));
        if ($request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $uvCount = VisitorStat::getCountUV($startDate, $endDate);
            $pvCount = VisitorStat::getCountPV($startDate, $endDate);
            $ipCount = VisitorStat::getCountIP($startDate, $endDate);
            $daylist = $this->getDateFromRange($startDate, $endDate);
            
            $str = "Day,UV,PV\n";
            $uvTotal = $pvTotal = 0;
            foreach ($daylist as $k => $r){
                $uvNum = ArrayHelper::keyExists($r, $uvCount, false) ? intval($uvCount[$r]['total']) : 0;
                $pvNum = ArrayHelper::keyExists($r, $pvCount, false) ? intval($pvCount[$r]['total']) : 0;
                $str .= $r.",{$uvNum},{$pvNum}\n";
                $uvTotal += $uvNum;
                $pvTotal += $pvNum;
            }
            $ipTotal = 0;
            foreach ($ipCount as $v){
                $ipTotal += $v['total'];
            }
            return ['data' => $str, 'uvTotal' => $uvTotal, 'pvTotal' => $pvTotal, 'ipTotal' => $ipTotal];
        }
        switch (Yii::$app->getDb()->driverName) {
            case "mysql":
                $dbInfo = 'MySQL ' . (new Query())->select('version()')->one()['version()'];
                break;
            case "pgsql":
                $dbInfo = (new Query())->select('version()')->one()['version'];
                break;
            default:
                $dbInfo = "Unknown";
        }
        $info = [
            'OPERATING_ENVIRONMENT' => PHP_OS . ' ' . $_SERVER['SERVER_SOFTWARE'],
            'PHP_RUN_MODE' => php_sapi_name(),
            'DB_INFO' => $dbInfo,
            'PHP_VERSION' => PHP_VERSION,
            'UPLOAD_MAX_FILE_SIZE' => ini_get('upload_max_filesize'),
            'MAX_EXECUTION_TIME' => ini_get('max_execution_time') . "s"
        ];
        
        $contentCount = Content::find()->count();
        $categoryCount = Category::find()->count();
        $feedbackCount = Feedback::find()->count();
        $attCount = Attachment::find()->count();
        $topViews = Content::find()->select(['id', 'title', 'views'])->limit(5)->orderBy('views DESC')->asArray()->all();
        return $this->render('main', [
            'info' => $info,
            'categoryCount' => $categoryCount,
            'feedbackCount' => $feedbackCount,
            'contentCount' => $contentCount,
            'attCount' => $attCount,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'topViews' => $topViews,
        ]);
    }
    
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->admin->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            $model->password = '';
            
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->admin->logout();
        
        return $this->goHome();
    }
}