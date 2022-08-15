<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $mobile
 * @property string|null $content
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Feedback extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%feedback}}';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'mobile'], 'required'],
            [['name', 'email', 'mobile'], 'trim'],
            [['content'], 'string'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['email'], 'email'],
            ['mobile', 'match', 'pattern' => '/^[1][3456789][0-9]{9}$/'],
            ['verifyCode', 'required', 'message' => Yii::t('app', 'Please click to complete the verification')],
            ['verifyCode', 'validateVerifyCode'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'mobile' => Yii::t('app', 'Mobile'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    public function validateVerifyCode($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->verifyCode != Yii::$app->session->get('verifyCode')) {
                $this->addError($attribute, '参数错误，请刷新页面重新操作');
            }
            Yii::$app->session->remove('verifyCode');
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function getErrorMessage() {
        $errors = $this->getFirstErrors();
        if(!is_array($errors)) return '';
        return array_shift($errors);
    }
}
