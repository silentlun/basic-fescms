<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $cookies = Yii::$app->request->cookies;
        if (($cookie = $cookies->get('FES_distinctid')) !== null) {
            $random = $cookie->value;
        } else {
            $random = md5(Yii::$app->request->userIP.Yii::$app->request->userAgent.Yii::$app->security->generateRandomString().microtime(true));
        }
        //$hostArray = explode('.', $_SERVER["HTTP_HOST"]);
        //$domain = $hostArray[1] . '.' . $hostArray[2];
        Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'FES_distinctid',
            'value' => $random,
            'expire' => time()+3600*24*365,
            'httpOnly' => true,
            //'domain' => $domain,
        ]));
        if (!Yii::$app->config->site_status) {
            exit('<p style="font-size: 18px; padding:50px 20px; text-align: center;">站点正在维护中，请稍后访问...</p>');
        }
        
        
    }
}