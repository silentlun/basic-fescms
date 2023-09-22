<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Feedback;
use app\models\VisitorStat;
use app\helpers\Util;

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
    public function actionError()
    {
        return $this->renderPartial('error');
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
     * Displays Feedback page.
     *
     * @return Response|string
     */
    public function actionFeedback()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new Feedback();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return ['code' => 200, 'message' => Yii::t('app', 'Thank you for contacting us. We will respond to you as soon as possible.')];
        } else {
            return ['code' => 0, 'message' => $model->getErrorMessage()];
        }
        
    }
    
    /**
     * 交互验证码.
     *
     * @return json
     */
    public function actionCaptcha()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $captcha = Yii::$app->getSecurity()->generateRandomString(16);
        Yii::$app->session->set('verifyCode', $captcha);
        return ['status' => 1, 'captcha' => $captcha];
    }
    
    /**
     * 访问统计
     */
    public function actionCount11()
    {
        if (Util::checkRobot()){
            $curTime = strtotime(date('Y-m-d'));
            $platform = Util::isMobile() ? 'wap' : 'pc';
            $cookies = Yii::$app->request->cookies;
            $uuid = $cookies->getValue('FES_distinctid');
            $userAgent = $_SERVER["HTTP_USER_AGENT"];
            $userIP = Yii::$app->request->userIP;
            $isCount = true;
            if ($uuid) {
                if (($visitor = VisitorStat::findOne(['uuid' => $uuid, 'created_at' => $curTime])) !== null){
                    $visitor->updateCounters(['views' => 1]);
                    $isCount = false;
                }
            } else {
                $uuid = md5($userAgent.Yii::$app->security->generateRandomString());
            }
            if ($isCount) {
                $model = new VisitorStat();
                $model->uuid = $uuid;
                $model->platform = $platform;
                $model->ip = $userIP;
                $model->created_at = $curTime;
                $model->save(false);
            }
            
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'FES_distinctid',
                'value' => $uuid,
                'expire' => time()+3600*24*365,
                'httpOnly' => true,
            ]));
        }
    }
    /**
     * 访问统计
     */
    public function actionCount()
    {
        if (!Util::checkRobot()) return false;
        $referrer = Yii::$app->request->referrer;
        if ($referrer && (strpos($referrer, Yii::$app->config->site_url) !== false)){
            $cookies = Yii::$app->request->cookies;
            if (($cookie = $cookies->get('FES_distinctid')) !== null) {
                $uuid = $cookie->value;
                $curtime = strtotime(date('Y-m-d', time()));
                $platform = Util::isMobile() ? 2 : 1;
                $userIP = Yii::$app->request->userIP;
                $uvCount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM visitor_stat WHERE created_at>:created_at AND uuid=:uuid')
                ->bindValues([':created_at' => $curtime, ':uuid' => $uuid])
                ->queryScalar();
                
                if ($uvCount) {
                    Yii::$app->db->createCommand()->update('visitor_stat', ['views' => new \yii\db\Expression('views + 1')], ['AND', ['>', 'created_at', $curtime], ['uuid' => $uuid]])->execute();
                } else {
                    Yii::$app->db->createCommand()->insert('visitor_stat', [
                        'platform' => $platform,
                        'uuid' => $uuid,
                        'ip' => $userIP,
                        'created_at' => time(),
                    ])->execute();
                }
                
                return '200';
            }
            return '401';
        }
        return '403';
    }
}
