<?php
namespace app\behaviors;
/**
 * BlameablesBehaviors.php
 * @author: allen
 * @date  2021年2月23日下午2:01:08
 * @copyright  Copyright igkcms
 */
use Yii;
use yii\db\BaseActiveRecord;
use yii\behaviors\AttributeBehavior;

class BlameablesBehavior extends AttributeBehavior
{
    public $createdByAttribute = 'created_by';
    
    public $value;
    
    public $defaultValue;
    
    public function init()
    {
        parent::init();
        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => $this->createdByAttribute,
            ];
        }
    }
    
    /**
     * {@inheritdoc}
     *
     * In case, when the [[value]] property is `null`, the value of [[defaultValue]] will be used as the value.
     */
    protected function getValue($event)
    {
        if ($this->value === null && Yii::$app->has('user')) {
            //$userName = Yii::$app->get('user')->username;
            $userName = Yii::$app->admin->identity->username;
            if ($userName === null) {
                return $this->getDefaultValue($event);
            }
            
            return $userName;
        } elseif ($this->value === null) {
            return $this->getDefaultValue($event);
        }
        
        return parent::getValue($event);
    }
    
    /**
     * Get default value
     * @param \yii\base\Event $event
     * @return array|mixed
     * @since 2.0.14
     */
    protected function getDefaultValue($event)
    {
        if ($this->defaultValue instanceof \Closure || (is_array($this->defaultValue) && is_callable($this->defaultValue))) {
            return call_user_func($this->defaultValue, $event);
        }
        
        return $this->defaultValue;
    }
}