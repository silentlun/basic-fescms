<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\StringHelper;
use app\behaviors\BlameablesBehavior;
use silentlun\taggable\TaggableBehavior;
use app\behaviors\AttachmentBehavior;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property int $id
 * @property int $catid
 * @property string $title
 * @property string $thumb
 * @property string $keywords
 * @property string|null $description
 * @property string $content
 * @property string $template
 * @property string $created_by
 * @property string $url
 * @property int $islink
 * @property int $views
 * @property int $sort
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Content extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE = 99;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%content}}';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameablesBehavior::className(),
            'taggable' => [
                'class' => TaggableBehavior::className(),
                'tagValuesAsArray' => true,
            ],
            'attachment' => [
                'class' => AttachmentBehavior::className(),
                'module' => 'c',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catid', 'status'], 'integer'],
            [['title', 'catid'], 'required'],
            [['title', 'url', 'keywords'], 'trim'],
            [['description', 'content'], 'string'],
            [['title', 'thumb', 'keywords', 'url'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 50],
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            ['url', 'url'],
            [['tagValues'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'catid' => Yii::t('app', 'Catid'),
            'title' => Yii::t('app', 'Title'),
            'thumb' => Yii::t('app', 'Thumb'),
            'keywords' => Yii::t('app', 'Keywords'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
            'template' => Yii::t('app', 'Template'),
            'tagValues' => Yii::t('app', 'Tags'),
            'created_by' => Yii::t('app', 'Created By'),
            //'url' => Yii::t('app', 'Url'),
            'islink' => Yii::t('app', 'Islink'),
            'url' => '转向链接',
            'views' => Yii::t('app', 'Views'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function find()
    {
        return new ModelQuery(get_called_class());
    }
    
    /**
     * {@inheritdoc}
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
        ->viaTable('{{%tag_assn}}', ['post_id' => 'id']);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id'=>'catid'])->select('id,catname');
    }
    
    public function beforeSave($insert){
        
        if (parent::beforeSave($insert)){
            //自动提取摘要
            if (isset($_POST['add_introduce']) && $this->description == '' && isset($this->content)) {
                $content = stripslashes($this->content);
                $introcude_length = intval($_POST['introcude_length']);
                $this->description = StringHelper::truncate(str_replace(array("'","\r\n","\t",'[page]','[/page]','&ldquo;','&rdquo;','&nbsp;'), '', strip_tags($content)),$introcude_length, '');
            }
            
            //自动提取缩略图
            if(isset($_POST['auto_thumb']) && $this->thumb == '' && isset($this->content)) {
                $content = stripslashes($this->content);
                $auto_thumb_no = intval($_POST['auto_thumb_no'])-1;
                if(preg_match_all("/(src)=([\"|']?)([^ \"'>]+\.(gif|jpg|jpeg|bmp|png))\\2/i", $content, $matches)) {
                    $this->thumb = $matches[3][$auto_thumb_no];
                }
            }
            
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getAllList($limit, $catId = null, $tagId = null)
    {
        $key = md5('content'.$limit.$catId.$tagId);
        $contentDependency = new \yii\caching\DbDependency(['sql' => 'SELECT MAX(updated_at) FROM content']);
        $datas = Yii::$app->cache->getOrSet($key, function () use ($limit, $catId, $tagId) {
            $query = self::find()->select(['id', 'catid', 'title', 'thumb', 'url', 'islink', 'description', 'created_at']);
            $query->where(['status' => self::STATUS_ACTIVE])
            ->andFilterWhere(['catid' => $catId]);
            if ($tagId) $query->anyTagValues($tagId);
            return $query->limit($limit)->orderBy('sort DESC,id DESC')->asArray()->all();
        }, 0, $contentDependency);
        
        return $datas;
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getOneList($catId = null, $tagId = null, $category = false)
    {
        $query = self::find();
        if ($category) $query->with('category');
        $query->where(['status' => self::STATUS_ACTIVE])
        ->andFilterWhere(['catid' => $catId]);
        if ($tagId) $query->anyTagValues($tagId);
        $query->limit(1)
        ->orderBy('sort DESC,id DESC')
        ->asArray()
        ->one();
        return $query;
    }
    
}
