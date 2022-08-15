<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%visitor_stat}}".
 *
 * @property int $id
 * @property string $uuid
 * @property string $platform
 * @property string $ip
 * @property int $views
 * @property int $created_at
 */
class VisitorStat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%visitor_stat}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['views', 'created_at'], 'integer'],
            [['uuid'], 'string', 'max' => 50],
            [['platform'], 'string', 'max' => 20],
            [['ip'], 'string', 'max' => 30],
            [['views'], 'default', 'value' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uuid' => Yii::t('app', 'Uuid'),
            'platform' => Yii::t('app', 'Platform'),
            'ip' => Yii::t('app', 'Ip'),
            'views' => Yii::t('app', 'Views'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getCountUV($startDate, $endDate, $platform = null)
    {
        return self::find()->select(["FROM_UNIXTIME(created_at,'%Y-%m-%d') as days", "count(*) as total"])
        ->where(['>=', 'created_at', strtotime($startDate)])
        ->andWhere(['<=', 'created_at', strtotime($endDate) + 86400])
        ->andFilterWhere(['platform' => $platform])
        ->indexBy(['days'])
        ->groupBy(['days'])
        ->asArray()
        ->all();
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getCountPV($startDate, $endDate, $platform = null)
    {
        return self::find()->select(["FROM_UNIXTIME(created_at,'%Y-%m-%d') as days", "sum(views) as total"])
        ->where(['>=', 'created_at', strtotime($startDate)])
        ->andWhere(['<=', 'created_at', strtotime($endDate) + 86400])
        ->andFilterWhere(['platform' => $platform])
        ->indexBy(['days'])
        ->groupBy(['days'])
        ->asArray()
        ->all();
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getCountIP($startDate, $endDate, $platform = null)
    {
        return self::find()->select(["count(distinct ip) as total"])
        ->where(['>=', 'created_at', strtotime($startDate)])
        ->andWhere(['<=', 'created_at', strtotime($endDate) + 86400])
        ->andFilterWhere(['platform' => $platform])
        ->asArray()
        ->all();
    }
}
