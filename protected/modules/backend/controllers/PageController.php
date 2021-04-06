<?php

namespace backend\controllers;

use Yii;
use app\models\Page;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends BaseController
{

    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex($catid)
    {
        $model = Page::findOne(['catid' => $catid]);
        if ($model === null) {
            $model = new Page();
            $model->catid = $catid;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Save Success'));
            return $this->render('index', [
                'model' => $model,
            ]);
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
