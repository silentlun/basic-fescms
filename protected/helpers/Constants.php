<?php
/**
 * Constants.php
 * @author: allen
 * @date  2020年6月11日下午5:03:39
 * @copyright  Copyright igkcms
 */
namespace app\helpers;

use Yii;
use yii\base\InvalidParamException;

class Constants
{
    const YesNo_Yes = 1;
    const YesNo_No = 0;
    
    public static function getYesNoItems($key = null)
    {
        $items = [
            self::YesNo_Yes => $key !== null ? '<span class="badge badge-success-lighten">'.Yii::t('app', 'Yes').'</span>' : Yii::t('app', 'Yes'),
            self::YesNo_No => $key !== null ? '<span class="badge badge-dark-lighten">'.Yii::t('app', 'No').'</span>' : Yii::t('app', 'No'),
        ];
        return self::getItems($items, $key);
    }
    
    public static function getWebsiteStatusItems($key = null)
    {
        $items = [
            self::YesNo_Yes => Yii::t('app', 'Opened'),
            self::YesNo_No => Yii::t('app', 'Closed'),
        ];
        return self::getItems($items, $key);
    }
    
    
    public static function getShowHideItems($key = null)
    {
        $items = [
            self::YesNo_Yes => $key !== null ? '<span class="badge badge-success-lighten">'.Yii::t('app', 'Show').'</span>' : Yii::t('app', 'Show'),
            self::YesNo_No => $key !== null ? '<span class="badge badge-dark-lighten">'.Yii::t('app', 'Hide').'</span>' : Yii::t('app', 'Hide'),
        ];
        return self::getItems($items, $key);
    }
    
    const PUBLISH_YES = 99;
    const PUBLISH_NO = 1;
    
    public static function getContentStatus($key = null)
    {
        $items = [
            self::PUBLISH_YES => $key !== null ? '<span class="badge badge-success-lighten">'.Yii::t('app', 'Publish').'</span>' : Yii::t('app', 'Publish'),
            self::PUBLISH_NO => $key !== null ? '<span class="badge badge-dark-lighten">'.Yii::t('app', 'Hide').'</span>' : Yii::t('app', 'Hide'),
        ];
        return self::getItems($items, $key);
    }
    
    private static function getItems($items, $key = null)
    {
        if ($key !== null) {
            if (key_exists($key, $items)) {
                return $items[$key];
            }
            throw new InvalidParamException( 'Unknown key:' . $key );
        }
        return $items;
    }
}