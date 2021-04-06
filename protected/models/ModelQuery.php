<?php
namespace app\models;
/**
 * ModelQuery.php
 * @author: allen
 * @date  2021年2月23日下午3:30:34
 * @copyright  Copyright igkcms
 */

use Yii;
use silentlun\taggable\TaggableQueryBehavior;

/**
 * ModelQuery represents the model behind the search.
 */
class ModelQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TaggableQueryBehavior::className(),
        ];
    }
}