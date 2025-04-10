<?php

namespace app\modules\nhanvien\models\base;

use Yii;

/**
 * This is the model class for table "nv_phong_ban".
 *
 * @property int $id
 * @property string $ten_phong_ban
 * @property string|null $ghi_chu
 * @property int|null $nguoi_tao
 * @property string|null $thoi_gian_tao
 *
 * @property NvNhanVien[] $nvNhanViens
 */
class PhongBanBase extends \app\models\NvPhongBan 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nv_phong_ban';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_phong_ban'], 'required'],
            [['ghi_chu'], 'string'],
            [['nguoi_tao'], 'integer'],
            [['thoi_gian_tao'], 'safe'],
            [['ten_phong_ban'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_phong_ban' => 'Tên phòng ban',
            'ghi_chu' => 'Ghi chú',
            'nguoi_tao' => 'Nguời tạo',
            'thoi_gian_tao' => 'Thời gian tạo',
        ];
    }

 
}
