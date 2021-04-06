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

class PushPositionForm extends Model
{
    public $posid;
    public $ids;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['posid'], 'required', 'message' => '请选择推荐位'],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'posid' => '推荐位',
        ];
    }
}