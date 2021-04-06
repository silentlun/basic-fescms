<?php
/**
 * SettingForm.php
 * @author: allen
 * @date  2020年4月14日下午1:41:31
 * @copyright  Copyright igkcms
 */
namespace backend\models;

use yii;
use app\models\Setting;

class UploadForm extends Setting
{
    public $site_upload_url;
    public $site_upload_allowext;
    public $site_upload_maxsize;
    public $site_upload_pdfmaxsize;
    
    public function attributeLabels(){
        return [
            'site_upload_url' => '附件URL访问地址',
            'site_upload_allowext' => '允许上传文件类型',
            'site_upload_maxsize' => '允许上传附件大小',
            'site_upload_pdfmaxsize' => '允许上传PDF大小',
        ];
    }
    
    public function rules(){
        return [
            [
                [
                    'site_upload_url',
                    'site_upload_allowext',
                    'site_upload_maxsize',
                    'site_upload_pdfmaxsize',
                ],
                'string'
            ],
            [ 'site_upload_url', 'required'],
            [ 'site_upload_url', 'validatorWebsiteUrl'],
        ];
    }
    public function validatorWebsiteUrl($attribute, $params)
    {
        if( strpos($this->$attribute, "https://") === 0 || strpos($this->$attribute, "http://") === 0 || strpos($this->$attribute, "//") === 0   ){
            return;
        }
        $this->addError($attribute, yii::t("app", '{attribute} must begin with https:// or http:// or //', ['attribute'=>yii::t('app', 'Website Url')]));
        return;
    }
}