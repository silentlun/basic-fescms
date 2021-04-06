<?php
namespace app\behaviors;
/**
 * AttachmentBehaviors.php
 * @author: allen
 * @date  2021年3月1日下午3:26:39
 * @copyright  Copyright igkcms
 */

use yii\base\Behavior;
use yii\db\ActiveRecord;
use app\models\Attachment;

class AttachmentBehavior extends Behavior
{
    public $module = 'c';
    
    
    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
        ];
    }
    
    
    /**
     * @return void
     */
    public function afterSave()
    {
        Attachment::apiUpdate($this->module.'-'.$this->owner->getPrimaryKey());
    }
    
    /**
     * @return void
     */
    public function beforeDelete()
    {
        Attachment::apiDelete($this->module.'-'.$this->owner->getPrimaryKey());
    }
}