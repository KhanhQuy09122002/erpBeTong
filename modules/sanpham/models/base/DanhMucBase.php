<?php

namespace app\modules\sanpham\models\base;

use Yii;
use app\modules\sanpham\models\SanPham;
use app\modules\sanpham\models\Loai;

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
class DanhMucBase extends \app\models\SpDanhMuc
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
            'ten_danh_muc' => 'Tên danh mục',
            'ghi_chu' => 'Ghi chú',
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
