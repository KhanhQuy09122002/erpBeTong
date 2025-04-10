<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dh_don_hang".
 *
 * @property int $id
 * @property int $id_khach_hang
 * @property string|null $ten_cong_trinh
 * @property string|null $dia_diem
 * @property string|null $hang_muc_xay_dung
 * @property string $nguoi_tiep_nhan_don_hang
 * @property string $ngay_nhap_don_hang
 * @property int|null $nhan_vien_thuc_hien
 * @property int|null $tong_gia_tri_don_hang
 * @property string|null $yeu_cau_giam_gia
 * @property string|null $trang_thai_duyet_giam_gia
 * @property int|null $nguoi_duyet
 * @property string|null $ghi_chu_nguoi_duyet
 * @property int|null $gia_cuoi_cung
 * @property string|null $trang_thai
 * @property int|null $nguoi_tao
 * @property string|null $thoi_gian_tao
 *
 * @property DhLichSuGapMat[] $dhLichSuGapMats
 * @property DhLichSuLienLac[] $dhLichSuLienLacs
 * @property KhKhachHang $khachHang
 */
class DhDonHang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dh_don_hang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_khach_hang', 'nguoi_tiep_nhan_don_hang', 'ngay_nhap_don_hang'], 'required'],
            [['id_khach_hang', 'nhan_vien_thuc_hien', 'tong_gia_tri_don_hang', 'nguoi_duyet', 'gia_cuoi_cung', 'nguoi_tao'], 'integer'],
            [['ngay_nhap_don_hang', 'thoi_gian_tao'], 'safe'],
            [['yeu_cau_giam_gia', 'ghi_chu_nguoi_duyet'], 'string'],
            [['ten_cong_trinh', 'nguoi_tiep_nhan_don_hang'], 'string', 'max' => 50],
            [['dia_diem'], 'string', 'max' => 255],
            [['hang_muc_xay_dung', 'trang_thai_duyet_giam_gia'], 'string', 'max' => 20],
            [['trang_thai'], 'string', 'max' => 30],
            [['id_khach_hang'], 'exist', 'skipOnError' => true, 'targetClass' => KhKhachHang::class, 'targetAttribute' => ['id_khach_hang' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_khach_hang' => 'Id Khach Hang',
            'ten_cong_trinh' => 'Ten Cong Trinh',
            'dia_diem' => 'Dia Diem',
            'hang_muc_xay_dung' => 'Hang Muc Xay Dung',
            'nguoi_tiep_nhan_don_hang' => 'Nguoi Tiep Nhan Don Hang',
            'ngay_nhap_don_hang' => 'Ngay Nhap Don Hang',
            'nhan_vien_thuc_hien' => 'Nhan Vien Thuc Hien',
            'tong_gia_tri_don_hang' => 'Tong Gia Tri Don Hang',
            'yeu_cau_giam_gia' => 'Yeu Cau Giam Gia',
            'trang_thai_duyet_giam_gia' => 'Trang Thai Duyet Giam Gia',
            'nguoi_duyet' => 'Nguoi Duyet',
            'ghi_chu_nguoi_duyet' => 'Ghi Chu Nguoi Duyet',
            'gia_cuoi_cung' => 'Gia Cuoi Cung',
            'trang_thai' => 'Trang Thai',
            'nguoi_tao' => 'Nguoi Tao',
            'thoi_gian_tao' => 'Thoi Gian Tao',
        ];
    }

    /**
     * Gets query for [[DhLichSuGapMats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDhLichSuGapMats()
    {
        return $this->hasMany(DhLichSuGapMat::class, ['id_don_hang' => 'id']);
    }

    /**
     * Gets query for [[DhLichSuLienLacs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDhLichSuLienLacs()
    {
        return $this->hasMany(DhLichSuLienLac::class, ['id_don_hang' => 'id']);
    }

    /**
     * Gets query for [[KhachHang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKhachHang()
    {
        return $this->hasOne(KhKhachHang::class, ['id' => 'id_khach_hang']);
    }
}
