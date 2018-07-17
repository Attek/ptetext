<?php

namespace attek\text\models\search;

use attek\text\models\Text;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TextSearch represents the model behind the search form about `app\models\Text`.
 */
class TextSearch extends Text
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cr_user', 'mod_user', 'status'], 'integer'],
            [['title', 'slug', 'text', 'cr_date', 'mod_date'], 'safe'],
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
        $query = Text::find();

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
            'id' => $this->id,
            'cr_user' => $this->cr_user,
            'cr_date' => $this->cr_date,
            'mod_user' => $this->mod_user,
            'mod_date' => $this->mod_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }

}
