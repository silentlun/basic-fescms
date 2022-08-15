<?php
/**
 * PushPositionForm.php
 * @author: allen
 * @date  2021年1月13日上午10:57:44
 * @copyright  Copyright igkcms
 */
namespace backend\models;

use Yii;
use yii\base\Model;

class PushTagForm extends Model
{
    public $tag_id;
    public $ids;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_id'], 'required', 'message' => '请选择推荐位'],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tag_id' => '推荐位',
        ];
    }
}