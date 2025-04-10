<?php

namespace app\modules\nhanvien\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\nhanvien\models\NhanVien;

/**
 * NhanVienSearch represents the model behind the search form about `app\modules\nhanvien\models\NhanVien`.
 */
class NhanVienSearch extends NhanVien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_phong_ban', 'tai_khoan'], 'integer'],
            [['ho_ten', 'chuc_vu', 'so_cccd', 'email', 'so_dien_thoai', 'dia_chi', 'trinh_do', 'trang_thai'], 'safe'],
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
        $query = NhanVien::find();

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
            'id_phong_ban' => $this->id_phong_ban,
            'tai_khoan' => $this->tai_khoan,
        ]);

        $query->andFilterWhere(['like', 'ho_ten', $this->ho_ten])
            ->andFilterWhere(['like', 'chuc_vu', $this->chuc_vu])
            ->andFilterWhere(['like', 'so_cccd', $this->so_cccd])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'so_dien_thoai', $this->so_dien_thoai])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
       
            ->andFilterWhere(['like', 'trinh_do', $this->trinh_do])
            ->andFilterWhere(['like', 'trang_thai', $this->trang_thai]);
 

        return $dataProvider;
    }
}
