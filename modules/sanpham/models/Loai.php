<?php
namespace app\modules\sanpham\models;

use app\modules\sanpham\models\base\LoaiBase;



class Loai extends LoaiBase
{
    
    public function getDanhMuc()
    {
        return $this->hasOne(DanhMuc::class, ['id' => 'id_danh_muc']);
    }

    public function getSpSanPhams()
    {
        return $this->hasMany(SanPham::class, ['loai' => 'id']);
    }
}