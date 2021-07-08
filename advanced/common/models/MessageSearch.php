<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Message;

/**
 * MessageSearch represents the model behind the search form about `common\models\Message`.
 */
class MessageSearch extends Message
{
    public function attributes()
    {
        return array_merge(parent::attributes(),['user.username']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'create_time', 'userid'], 'integer'],
            [['content','user.username'], 'safe'],
        ];
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
        $query = Message::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'message.id' => $this->id,
            'message.status' => $this->status,
            'create_time' => $this->create_time,
            'userid' => $this->userid,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        $query->join('INNER JOIN','user','message.userid = user.id');
        $query->andFilterWhere(['like','user.username',$this->getAttribute('user.username')]);

        $dataProvider->sort->attributes['user.username'] =
            [
                'asc'=>['user.username'=>SORT_ASC],
                'desc'=>['user.username'=>SORT_DESC],
            ];
        return $dataProvider;
    }
}
