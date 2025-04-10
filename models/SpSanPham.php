<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sp_san_pham".
 *
 * @property int $id
 * @property string $ten_san_pham
 * @property int $id_danh_muc
 * @property string $don_vi_tinh
 * @property int|null $loai
 * @property float $gia
 * @property int|null $nguoi_tao
 * @property string|null $thoi_gian_tao
 *
 * @property SpDanhMuc $danhMuc
 * @property SpLoai $loai0
 */
class SpSanPham extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sp_san_pham';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_san_pham', 'id_danh_muc', 'don_vi_tinh', 'gia'], 'required'],
            [['id_danh_muc', 'loai', 'nguoi_tao'], 'integer'],
            [['gia'], 'number'],
            [['thoi_gian_tao'], 'safe'],
            [['ten_san_pham'], 'string', 'max' => 255],
            [['don_vi_tinh'], 'string', 'max' => 20],
            [['id_danh_muc'], 'exist', 'skipOnError' => true, 'targetClass' => SpDanhMuc::class, 'targetAttribute' => ['id_danh_muc' => 'id']],
            [['loai'], 'exist', 'skipOnError' => true, 'targetClass' => SpLoai::class, 'targetAttribute' => ['loai' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_san_pham' => 'Ten San Pham',
            'id_danh_muc' => 'Id Danh Muc',
            'don_vi_tinh' => 'Don Vi Tinh',
            'loai' => 'Loai',
            'gia' => 'Gia',
            'nguoi_tao' => 'Nguoi Tao',
            'thoi_gian_tao' => 'Thoi Gian Tao',
        ];
    }

    /**
     * Gets query for [[DanhMuc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDanhMuc()
    {
        return $this->hasOne(SpDanhMuc::class, ['id' => 'id_danh_muc']);
    }

    /**
     * Gets query for [[Loai0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoai0()
    {
        return $this->hasOne(SpLoai::class, ['id' => 'loai']);
    }
}
