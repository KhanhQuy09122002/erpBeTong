<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sp_danh_muc".
 *
 * @property int $id
 * @property string $ten_danh_muc
 * @property string|null $ghi_chu
 * @property int|null $nguoi_tao
 * @property string|null $thoi_gian_tao
 *
 * @property SpLoai[] $spLoais
 * @property SpSanPham[] $spSanPhams
 */
class SpDanhMuc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sp_danh_muc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_danh_muc'], 'required'],
            [['ghi_chu'], 'string'],
            [['nguoi_tao'], 'integer'],
            [['thoi_gian_tao'], 'safe'],
            [['ten_danh_muc'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_danh_muc' => 'Ten Danh Muc',
            'ghi_chu' => 'Ghi Chu',
            'nguoi_tao' => 'Nguoi Tao',
            'thoi_gian_tao' => 'Thoi Gian Tao',
        ];
    }

    /**
     * Gets query for [[SpLoais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpLoais()
    {
        return $this->hasMany(SpLoai::class, ['id_danh_muc' => 'id']);
    }

    /**
     * Gets query for [[SpSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpSanPhams()
    {
        return $this->hasMany(SpSanPham::class, ['id_danh_muc' => 'id']);
    }
}
