<?php
namespace app\modules\sanpham\models;

use app\modules\sanpham\models\base\DanhMucBase;



class DanhMuc extends DanhMucBase
{
    public function getSpLoais()
    {
        return $this->hasMany(Loai::class, ['id_danh_muc' => 'id']);
    }

    public function getSpSanPhams()
    {
        return $this->hasMany(SanPham::class, ['id_danh_muc' => 'id']);
    }
}