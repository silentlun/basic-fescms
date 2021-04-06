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
        if (!Yii::$app->config->site_status) {
            exit('<p style="font-size: 18px; padding:50px 20px; text-align: center;">站点正在维护中，请稍后访问...</p>');
        }
        
    }
}