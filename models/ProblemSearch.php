<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Problem;

/**
 * ProblemSearch represents the model behind the search form of `app\models\Problem`.
 */
class ProblemSearch extends Problem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_problem', 'user_id', 'category_id'], 'integer'],
            [['name_problem', 'description_problem', 'date', 'status', 'photoBefore', 'photoAfter'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Problem::find();

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
            'id_problem' => $this->id_problem,
            'date' => $this->date,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'name_problem', $this->name_problem])
            ->andFilterWhere(['like', 'description_problem', $this->description_problem])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'photoBefore', $this->photoBefore])
            ->andFilterWhere(['like', 'photoAfter', $this->photoAfter]);

        $query->orderBy(['date' => SORT_DESC]);

        return $dataProvider;
    }




    public function searchForUser($params, $idUser)
    {
        $query = Problem::find();

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


        $query->andWhere(['user_id' => $idUser]);
        // grid filtering conditions
        $query->andFilterWhere([
            'id_problem' => $this->id_problem,
            'date' => $this->date,
            // 'user_id' => $this->user_id,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'name_problem', $this->name_problem])
              ->andFilterWhere(['like', 'description_problem', $this->description_problem])
              ->andFilterWhere(['like', 'status', $this->status])
              ->andFilterWhere(['like', 'photoBefore', $this->photoBefore])
              ->andFilterWhere(['like', 'photoAfter', $this->photoAfter]);


        $query->orderBy(['date' => SORT_DESC]);

        return $dataProvider;
    }
}
