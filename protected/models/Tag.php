<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property int $id
 * @property string $module
 * @property string $name
 * @property string $cname
 * @property int $frequency
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'cname'], 'required'],
            [['name', 'cname'], 'trim'],
            [['name', 'cname'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'module' => Yii::t('app', 'Module'),
            'name' => '英文目录',
            'cname' => '推荐位名称',
            'frequency' => '文章数量',
        ];
    }
    
    /**
     * 获取分类数组
     */
    public static function getTags(){
        return self::find()->select(['cname'])->indexBy('id')->column();
    }
}
