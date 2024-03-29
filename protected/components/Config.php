<?php
/**
 * Config.php
 * @author: allen
 * @date  2020年4月22日上午10:27:06
 * @copyright  Copyright igkcms
 */
namespace app\components;

use Yii;
use app\helpers\FileDependencyHelper;
use app\models\Setting;
use yii\caching\FileDependency;
use yii\base\Event;
use yii\db\BaseActiveRecord;
use backend\components\AdminLog;


class Config extends yii\base\BaseObject {
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        return isset($this->$name) ? $this->$name : '';
    }
    public function init()
    {
        parent::init();
        
        $cache = Yii::$app->cache;
        $key = 'setting';
        $data = $cache->get($key);
        if ($data === false) {
            $data = Setting::find()->where(['type' => Setting::TYPE_SYSTEM])->asArray()->indexBy('name')->all();
            $cacheDependencyObject = Yii::createObject([
                'class' => FileDependencyHelper::className(),
                'rootDir' => '@app/runtime/cache/file_dependency/',
                'fileName' => $key.'.txt',
            ]);
            $fileName = $cacheDependencyObject->createFile();
            $dependency = new FileDependency(['fileName' => $fileName]);
            $cache->set($key, $data, 0, $dependency);
        }
        foreach ($data as $v) {
            $this->{$v['name']} = $v['value'];
        }
    }
    
    public function backendInit()
    {
        //return true;
        Event::on(BaseActiveRecord::className(), BaseActiveRecord::EVENT_AFTER_INSERT, [
            AdminLog::className(),
            'create'
        ]);
        Event::on(BaseActiveRecord::className(), BaseActiveRecord::EVENT_AFTER_UPDATE, [
            AdminLog::className(),
            'update'
        ]);
        Event::on(BaseActiveRecord::className(), BaseActiveRecord::EVENT_AFTER_DELETE, [
            AdminLog::className(),
            'delete'
        ]);
    }
}