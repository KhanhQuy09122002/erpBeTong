<?php

namespace app\modules\sanpham\models\base;

use Yii;
use app\modules\sanpham\models\DanhMuc;

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
class LoaiBase extends \app\models\SpLoai
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
            [['id_danh_muc'], 'exist', 'skipOnError' => true, 'targetClass' => DanhMuc::class, 'targetAttribute' => ['id_danh_muc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_loai' => 'Tên loại',
            'id_danh_muc' => 'Danh mục',
            'nguoi_tao' => 'Người tạo',
            'thoi_gian_tao' => 'Thời gian tạo',
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->nguoi_tao = Yii::$app->user->identity->id;
            $this->thoi_gian_tao = date('Y-m-d H:i:s');        
        }
        return parent::beforeSave($insert);
    }
}
