<?php

namespace app\modules\khachhang\models\base;

use Yii;

/**
 * This is the model class for table "kh_khach_hang".
 *
 * @property int $id
 * @property string $doi_tuong
 * @property string $ho_ten
 * @property string|null $chuc_danh
 * @property string|null $ten_to_chuc
 * @property string|null $dia_chi
 * @property string|null $ma_so_thue
 * @property string|null $so_tai_khoan
 * @property string|null $dien_thoai
 * @property string|null $email
 * @property int|null $nguoi_tao
 * @property string|null $thoi_gian_tao
 *
 * @property DhDonHang[] $dhDonHangs
 */
class KhachHangBase extends \app\models\KhKhachHang 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kh_khach_hang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doi_tuong', 'ho_ten'], 'required'],
            [['nguoi_tao'], 'integer'],
            [['thoi_gian_tao'], 'safe'],
            [['doi_tuong', 'ho_ten', 'chuc_danh', 'email'], 'string', 'max' => 50],
            [['ten_to_chuc', 'dia_chi', 'so_tai_khoan'], 'string', 'max' => 255],
            [['ma_so_thue', 'dien_thoai'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doi_tuong' => 'Doi Tuong',
            'ho_ten' => 'Ho Ten',
            'chuc_danh' => 'Chuc Danh',
            'ten_to_chuc' => 'Ten To Chuc',
            'dia_chi' => 'Dia Chi',
            'ma_so_thue' => 'Ma So Thue',
            'so_tai_khoan' => 'So Tai Khoan',
            'dien_thoai' => 'Dien Thoai',
            'email' => 'Email',
            'nguoi_tao' => 'Nguoi Tao',
            'thoi_gian_tao' => 'Thoi Gian Tao',
        ];
    }

}
