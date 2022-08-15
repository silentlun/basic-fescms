<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\models\Content;
use app\models\Category;
use app\models\Page;
use app\helpers\Util;
use yii\helpers\ArrayHelper;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends BaseController
{

    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex($catdir = '')
    {
        $categoryModel = Category::findOne(['catdir' => $catdir]);
        if (empty($categoryModel)) {
            throw new NotFoundHttpException('None page named ' . $catdir);
        }
        
        $categorys = [];
        if ($categoryModel->parent_id == 0) {
            $categorys = Category::getChildCategory($categoryModel->id);
            $bannerImg = $categoryModel->image;
            if ($categorys) {
                $catids = ArrayHelper::getColumn($categorys, 'id');
                $where = ['in', 'catid', $catids];
            } else {
                $where = ['catid' => $categoryModel->id];
            }
        } else {
            $category = Category::getChildCategory($categoryModel->parent_id);
            $bannerImg = $categoryModel->parent->image;
            $where = ['catid' => $categoryModel->id];
        }
        if ($categoryModel->type == 0) {
            $query = Content::find()->select(['id', 'catid', 'title', 'thumb', 'url', 'islink', 'description', 'created_at'])
            ->where(['status' => Content::STATUS_ACTIVE])
            ->andFilterWhere($where)
            ->asArray()
            ->orderBy('sort DESC,id DESC');
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 15,
                ],
            ]);
            $template = $categoryModel->list_template ?: 'list_news';
            return $this->render($template, [
                'dataProvider' => $dataProvider,
                'categorys' => $categorys,
                'categoryModel' => $categoryModel,
                'bannerImg' => $bannerImg,
            ]);
        } else {
            $model = Page::findOne(['catid' => $categoryModel->id]);
            if (($model = Page::findOne(['catid' => $categoryModel->id])) !== null) {
                $template = $categoryModel->page_template ?: 'page';
                return $this->render($template, [
                    'model' => $model,
                    'categorys' => $categorys,
                    'categoryModel' => $categoryModel,
                    'bannerImg' => $bannerImg,
                ]);
            }
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }

    /**
     * Displays a single Content model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //exit('view/'.$id);
        $model = $this->findModel($id);
        if ($model->status !== Content::STATUS_ACTIVE) throw new NotFoundHttpException('The requested page does not exist.');
        if (Util::checkRobot()) $model->updateCounters(['views' => 1]);
        $categoryModel = Category::findOne($model->catid);
        $template = $categoryModel->show_template ?: 'show';
        $model->template != "" && $template = $model->template;
        if ($categoryModel->parent_id == 0) {
            $bannerImg = $categoryModel->image;
        } else {
            $bannerImg = $categoryModel->parent->image;
        }
        $model->content = Util::contentStrip($model->content);
        
        return $this->render($template, [
            'model' => $model,
            'categoryModel' => $categoryModel,
            'previousPage' => $previousPage,
            'nextPage' => $nextPage,
            'bannerImg' => $bannerImg,
        ]);
    }

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
