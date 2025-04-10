<?php

namespace app\modules\donhang\models\base;

use Yii;
use app\modules\donhang\models\DonHang; 
/**
 * This is the model class for table "dh_lich_su_gap_mat".
 *
 * @property int $id
 * @property int $id_don_hang
 * @property string|null $nhan_vien_phu_trach
 * @property string $thoi_gian_lam_viec
 * @property string $noi_dung_lam_viec
 * @property string $ket_qua
 * @property string|null $ghi_chu
 * @property int|null $nguoi_tao
 * @property string|null $thoi_gian_tao
 *
 * @property DhDonHang $donHang
 */
class LichSuGapMatBase extends \app\models\DhLichSuGapMat 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dh_lich_su_gap_mat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_don_hang', 'thoi_gian_lam_viec', 'noi_dung_lam_viec', 'ket_qua'], 'required'],
            [['id_don_hang', 'nguoi_tao'], 'integer'],
            [['thoi_gian_lam_viec', 'thoi_gian_tao'], 'safe'],
            [['noi_dung_lam_viec', 'ghi_chu'], 'string'],
            [['nhan_vien_phu_trach'], 'string', 'max' => 50],
            [['ket_qua'], 'string', 'max' => 30],
            [['id_don_hang'], 'exist', 'skipOnError' => true, 'targetClass' => DonHang::class, 'targetAttribute' => ['id_don_hang' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_don_hang' => 'Id Don Hang',
            'nhan_vien_phu_trach' => 'Nhan Vien Phu Trach',
            'thoi_gian_lam_viec' => 'Thoi Gian Lam Viec',
            'noi_dung_lam_viec' => 'Noi Dung Lam Viec',
            'ket_qua' => 'Ket Qua',
            'ghi_chu' => 'Ghi Chu',
            'nguoi_tao' => 'Nguoi Tao',
            'thoi_gian_tao' => 'Thoi Gian Tao',
        ];
    }


}
