<?php

namespace app\modules\sanpham\models\base;

use Yii;
use app\modules\sanpham\models\DanhMuc;
use app\modules\sanpham\models\Loai;

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
class SanPhamBase extends \app\models\SpSanPham
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
            [['id_danh_muc'], 'exist', 'skipOnError' => true, 'targetClass' => DanhMuc::class, 'targetAttribute' => ['id_danh_muc' => 'id']],
            [['loai'], 'exist', 'skipOnError' => true, 'targetClass' => Loai::class, 'targetAttribute' => ['loai' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_san_pham' => 'Tên sản phẩm',
            'id_danh_muc' => 'Danh mục',
            'don_vi_tinh' => 'ĐVT',
            'loai' => 'Loại',
            'gia' => 'Giá',
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
