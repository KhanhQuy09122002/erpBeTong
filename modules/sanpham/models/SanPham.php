<?php
namespace app\modules\sanpham\models;

use app\modules\sanpham\models\base\SanPhamBase;



class SanPham extends SanPhamBase
{
    public function getDanhMuc()
    {
        return $this->hasOne(DanhMuc::class, ['id' => 'id_danh_muc']);
    }

    public function getLoaiSanPham()
    {
        return $this->hasOne(Loai::class, ['id' => 'loai']);
    }
}