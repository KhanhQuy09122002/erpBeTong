<?php

namespace app\modules\donhang\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\donhang\models\DonHang;

/**
 * DonHangSearch represents the model behind the search form about `app\modules\donhang\models\DonHang`.
 */
class DonHangSearch extends DonHang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_khach_hang', 'nhan_vien_thuc_hien', 'tong_gia_tri_don_hang', 'nguoi_duyet', 'gia_cuoi_cung', 'nguoi_tao'], 'integer'],
            [['ten_cong_trinh', 'dia_diem', 'hang_muc_xay_dung', 'nguoi_tiep_nhan_don_hang', 'ngay_nhap_don_hang', 'yeu_cau_giam_gia', 'trang_thai_duyet_giam_gia', 'ghi_chu_nguoi_duyet', 'trang_thai', 'thoi_gian_tao'], 'safe'],
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
        $query = DonHang::find();

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
            'id_khach_hang' => $this->id_khach_hang,
            'ngay_nhap_don_hang' => $this->ngay_nhap_don_hang,
            'nhan_vien_thuc_hien' => $this->nhan_vien_thuc_hien,
            'tong_gia_tri_don_hang' => $this->tong_gia_tri_don_hang,
            'nguoi_duyet' => $this->nguoi_duyet,
            'gia_cuoi_cung' => $this->gia_cuoi_cung,
            'nguoi_tao' => $this->nguoi_tao,
            'thoi_gian_tao' => $this->thoi_gian_tao,
        ]);

        $query->andFilterWhere(['like', 'ten_cong_trinh', $this->ten_cong_trinh])
            ->andFilterWhere(['like', 'dia_diem', $this->dia_diem])
            ->andFilterWhere(['like', 'hang_muc_xay_dung', $this->hang_muc_xay_dung])
            ->andFilterWhere(['like', 'nguoi_tiep_nhan_don_hang', $this->nguoi_tiep_nhan_don_hang])
            ->andFilterWhere(['like', 'yeu_cau_giam_gia', $this->yeu_cau_giam_gia])
            ->andFilterWhere(['like', 'trang_thai_duyet_giam_gia', $this->trang_thai_duyet_giam_gia])
            ->andFilterWhere(['like', 'ghi_chu_nguoi_duyet', $this->ghi_chu_nguoi_duyet])
            ->andFilterWhere(['like', 'trang_thai', $this->trang_thai]);

        return $dataProvider;
    }
}
