<?php
/**
 * PushEvent.php
 * @author: allen
 * @date  2021年1月13日下午2:14:52
 * @copyright  Copyright igkcms
 */
namespace common\components\event;


use yii\base\Event;
use common\models\PositionData;

class PushEvent extends Event
{
    public $content_id;
    public $catid;
    public $module;
    public $posid;
    public $content;
    
    public function create($event)
    {
        var_dump($event);
        exit;
    }
}