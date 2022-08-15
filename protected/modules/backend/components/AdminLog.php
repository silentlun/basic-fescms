<?php
/**
 * AdminLog.php
 * @author: allen
 * @date  2020年4月26日下午5:06:20
 * @copyright  Copyright igkcms
 */
namespace backend\components;

use Yii;
use backend\models\AdminLog as LogModel;
use app\models\Attachment;
use app\models\AttachmentIndex;
use app\models\Feedback;
use app\models\VisitorStat;

class AdminLog extends \yii\base\Event
{
    /**
     * 新增操作日志
     *@param:$event
     *@return:
     */
    public static function create($event)
    {
        $filterMdels = [
            LogModel::className(),
            Attachment::className(),
            AttachmentIndex::className(),
            Feedback::className(),
            VisitorStat::className(),
        ];
        if (!in_array($event->sender->className(), $filterMdels)) {
            $desc = '<br>';
            foreach ($event->sender->getAttributes() as $name => $value) {
                !is_string( $value ) && $value = print_r($value, true);
                $desc .= $event->sender->getAttributeLabel($name) . '(' . $name . ') => ' . $value . ',<br>';
            }
            $desc = substr($desc, 0, -5);
            $model = new LogModel();
            $class = $event->sender->className();
            $idDes = '';
            if (isset($event->sender->id)) {
                $idDes = '{{%ID%}} ' . $event->sender->id;
            }
            $model->description = '[ ' . Yii::$app->admin->identity->username . ' ] {{%BY%}} ' . $class . ' [ ' . $class::tableName() . ' ] ' . " {{%CREATED%}} {$idDes} {{%RECORD%}}: " . $desc;
            $model->route = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
            $model->user_id = Yii::$app->admin->id;
            $model->save();
        }
    }
    
    /**
     * 数据库修改保存日志
     *
     * @param $event
     * @throws \Throwable
     */
    public static function update($event)
    {
        $filterMdels = [
            LogModel::className(),
            Attachment::className(),
            AttachmentIndex::className(),
            Feedback::className(),
            VisitorStat::className(),
        ];
        if (in_array($event->sender->className(), $filterMdels)) return true;
        if (! empty($event->changedAttributes)) {
            $desc = '<br>';
            $oldAttributes = $event->sender->oldAttributes;
            foreach ($event->changedAttributes as $name => $value) {
                if( $oldAttributes[$name] == $value ) continue;
                !is_string( $value ) && $value = print_r($value, true);
                $desc .= $event->sender->getAttributeLabel($name) . '(' . $name . ') : ' . $value . '=>' . $event->sender->oldAttributes[$name] . ',<br>';
            }
            $desc = substr($desc, 0, -5);
            $model = new LogModel();
            $class = $event->sender->className();
            $idDes = '';
            if (isset($event->sender->id)) {
                $idDes = '{{%ID%}} ' . $event->sender->id;
            }
            $model->description = '[ ' . Yii::$app->admin->identity->username . ' ] {{%BY%}} ' . $class . ' [ ' . $class::tableName() . ' ] ' . " {{%UPDATED%}} {$idDes} {{%RECORD%}}: " . $desc;
            $model->route = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
            $model->user_id = Yii::$app->admin->id;
            $model->save();
        }
    }
    
    /**
     * 数据库删除保存日志
     *
     * @param $event
     * @throws \Throwable
     */
    public static function delete($event)
    {
        $filterMdels = [
            LogModel::className(),
            Attachment::className(),
            AttachmentIndex::className(),
            VisitorStat::className(),
        ];
        if (in_array($event->sender->className(), $filterMdels)) return true;
        $desc = '<br>';
        foreach ($event->sender->getAttributes() as $name => $value) {
            !is_string( $value ) && $value = print_r($value, true);
            $desc .= $event->sender->getAttributeLabel($name) . '(' . $name . ') => ' . $value . ',<br>';
        }
        $desc = substr($desc, 0, -5);
        $model = new LogModel();
        $class = $event->sender->className();
        $idDes = '';
        if (isset($event->sender->id)) {
            $idDes = '{{%ID%}} ' . $event->sender->id;
        }
        $model->description = '[ ' . Yii::$app->admin->identity->username . ' ] {{%BY%}} ' . $class . ' [ ' . $class::tableName() . ' ] ' . " {{%DELETED%}} {$idDes} {{%RECORD%}}: " . $desc;
        $model->route = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
        $model->user_id = Yii::$app->admin->id;
        $model->save();
    }
    
    public static function custom(CustomLog $event)
    {
        $model = new LogModel();
        $model->description = $event->getDescription();
        $model->route = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
        $model->user_id = Yii::$app->admin->id;
        $model->save();
    }
}