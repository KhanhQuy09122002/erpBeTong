<?php

namespace app\modules\sanpham\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sanpham\models\Loai;

/**
 * LoaiSearch represents the model behind the search form about `app\modules\sanpham\models\Loai`.
 */
class LoaiSearch extends Loai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_danh_muc', 'nguoi_tao'], 'integer'],
            [['ten_loai', 'thoi_gian_tao'], 'safe'],
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
        $query = Loai::find();

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
            'id_danh_muc' => $this->id_danh_muc,
            'nguoi_tao' => $this->nguoi_tao,
            'thoi_gian_tao' => $this->thoi_gian_tao,
        ]);

        $query->andFilterWhere(['like', 'ten_loai', $this->ten_loai]);

        return $dataProvider;
    }
}
