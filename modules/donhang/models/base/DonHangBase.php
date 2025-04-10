<?php

namespace app\modules\donhang\models\base;

use Yii;
use app\modules\khachhang\models\KhachHang;

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
class DonHangBase extends \app\models\DhDonHang 
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
            [['id_khach_hang'], 'exist', 'skipOnError' => true, 'targetClass' => KhachHang::class, 'targetAttribute' => ['id_khach_hang' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_khach_hang' => 'Khách hàng / Người đại diện',
            'ten_cong_trinh' => 'Tên công trình',
            'dia_diem' => 'Địa điểm',
            'hang_muc_xay_dung' => 'Hạng mục xây dựng',
            'nguoi_tiep_nhan_don_hang' => 'Người tiếp nhận đơn hàng',
            'ngay_nhap_don_hang' => 'Ngày nhập đơn hàng',
            'nhan_vien_thuc_hien' => 'Nhân viên thực hiện đơn hàng',
            'tong_gia_tri_don_hang' => 'Giá trị đơn hàng',
            'yeu_cau_giam_gia' => 'Yêu cầu giảm giá',
            'trang_thai_duyet_giam_gia' => 'Trạng thái duyệt giảm giá',
            'nguoi_duyet' => 'Người kiểm duyệt giảm giá',
            'ghi_chu_nguoi_duyet' => 'Ghi chú người duyệt',
            'gia_cuoi_cung' => 'Giá cuối cùng',
            'trang_thai' => 'Trạng thái',
            'nguoi_tao' => 'Người tạo',
            'thoi_gian_tao' => 'Thời gian tạo',
        ];
    }

}
