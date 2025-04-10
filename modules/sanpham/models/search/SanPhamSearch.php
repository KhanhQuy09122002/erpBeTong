<?php

namespace app\modules\sanpham\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sanpham\models\SanPham;

/**
 * SanPhamSearch represents the model behind the search form about `app\modules\sanpham\models\SanPham`.
 */
class SanPhamSearch extends SanPham
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_danh_muc', 'loai', 'nguoi_tao'], 'integer'],
            [['ten_san_pham', 'don_vi_tinh', 'thoi_gian_tao'], 'safe'],
            [['gia'], 'number'],
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
        $query = SanPham::find();

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
            'loai' => $this->loai,
            'gia' => $this->gia,
            'nguoi_tao' => $this->nguoi_tao,
            'thoi_gian_tao' => $this->thoi_gian_tao,
        ]);

        $query->andFilterWhere(['like', 'ten_san_pham', $this->ten_san_pham])
            ->andFilterWhere(['like', 'don_vi_tinh', $this->don_vi_tinh]);

        return $dataProvider;
    }
}
