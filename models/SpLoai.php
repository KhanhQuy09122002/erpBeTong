<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sp_loai".
 *
 * @property int $id
 * @property string $ten_loai
 * @property int $id_danh_muc
 * @property int $nguoi_tao
 * @property string $thoi_gian_tao
 *
 * @property SpDanhMuc $danhMuc
 * @property SpSanPham[] $spSanPhams
 */
class SpLoai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sp_loai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_loai', 'id_danh_muc'], 'required'],
            [['id_danh_muc', 'nguoi_tao'], 'integer'],
            [['thoi_gian_tao'], 'safe'],
            [['ten_loai'], 'string', 'max' => 50],
            [['id_danh_muc'], 'exist', 'skipOnError' => true, 'targetClass' => SpDanhMuc::class, 'targetAttribute' => ['id_danh_muc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_loai' => 'Ten Loai',
            'id_danh_muc' => 'Id Danh Muc',
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
     * Gets query for [[SpSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpSanPhams()
    {
        return $this->hasMany(SpSanPham::class, ['loai' => 'id']);
    }
}
