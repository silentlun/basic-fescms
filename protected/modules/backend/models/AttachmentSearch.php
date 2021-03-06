<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Attachment;
use silentlun\daterange\DateRangeBehavior;

/**
 * ContentSearch represents the model behind the search form about `app\models\Content`.
 */
class AttachmentSearch extends Attachment
{
    public $createTimeRange;
    public $createTimeStart;
    public $createTimeEnd;
    
    public function behaviors()
    {
        return [
            [
                'class' => DateRangeBehavior::className(),
                'attribute' => 'createTimeRange',
                'dateStartAttribute' => 'createTimeStart',
                'dateEndAttribute' => 'createTimeEnd',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createTimeRange'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
            [['filename'], 'safe'],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();
        $attributeLabels['createTimeRange'] = Yii::t('app', 'Create Time Range');
        return $attributeLabels;
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Attachment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['>=', 'created_at', $this->createTimeStart])
            ->andFilterWhere(['<', 'created_at', $this->createTimeEnd]);

        return $dataProvider;
    }
}
