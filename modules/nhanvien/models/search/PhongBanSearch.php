<?php

namespace app\modules\nhanvien\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\nhanvien\models\PhongBan;

/**
 * PhongBanSearch represents the model behind the search form about `app\modules\nhanvien\models\PhongBan`.
 */
class PhongBanSearch extends PhongBan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nguoi_tao'], 'integer'],
            [['ten_phong_ban', 'ghi_chu', 'thoi_gian_tao'], 'safe'],
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
        $query = PhongBan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'nguoi_tao' => $this->nguoi_tao,
            'thoi_gian_tao' => $this->thoi_gian_tao,
        ]);

        $query->andFilterWhere(['like', 'ten_phong_ban', $this->ten_phong_ban])
            ->andFilterWhere(['like', 'ghi_chu', $this->ghi_chu]);

        return $dataProvider;
    }
}
