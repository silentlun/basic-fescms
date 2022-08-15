<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use app\behaviors\AttachmentBehavior;

/**
 * This is the model class for table "{{%partner}}".
 *
 * @property int $id
 * @property string $title
 * @property string $logo
 * @property string $url
 * @property int $status
 * @property int $listorder
 * @property int $created_at
 * @property int $updated_at
 */
class Link extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%link}}';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'attachment' => [
                'class' => AttachmentBehavior::className(),
                'module' => 'link',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'url'], 'trim'],
            [['status', 'sort'], 'integer'],
            [['title', 'logo', 'url'], 'string', 'max' => 255],
            ['sort', 'default', 'value' => 0],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'logo' => Yii::t('app', 'Logo'),
            'url' => Yii::t('app', 'Url'),
            'status' => Yii::t('app', 'Status'),
            'sort' => Yii::t('app', 'Sort'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getAllList($limit = null)
    {
        $key = 'link'.$limit;
        $dependency = new \yii\caching\DbDependency(['sql' => 'SELECT MAX(updated_at) FROM link']);
        $datas = Yii::$app->cache->getOrSet($key, function () use ($limit) {
            $query = self::find()->where(['status' => self::STATUS_ACTIVE]);
            if ($limit) $query->limit($limit);
            return $query->orderBy('sort DESC,id DESC')->asArray()->all();
        }, 0, $dependency);
            
        return $datas;
    }

}
