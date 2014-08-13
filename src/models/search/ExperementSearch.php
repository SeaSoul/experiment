<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Experement;

/**
 * ExperementSearch represents the model behind the search form about `app\models\Experement`.
 */
class ExperementSearch extends Experement
{
    public function rules()
    {
        return [
            [['id_exp', 'throws'], 'integer'],
            [['data', 'time', 'name', 'bones_num'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Experement::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_exp' => $this->id_exp,
            'throws' => $this->throws,
        ]);

        $query->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'bones_num', $this->bones_num]);

        return $dataProvider;
    }
}
