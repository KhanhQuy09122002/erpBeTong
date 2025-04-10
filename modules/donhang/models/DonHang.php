<?php
namespace app\modules\donhang\models;

use app\modules\donhang\models\base\DonHangBase;
use app\modules\khachhang\models\KhachHang; 

class DonHang extends DonHangBase
{
    public function getDhLichSuGapMats()
    {
        return $this->hasMany(LichSuGapMat::class, ['id_don_hang' => 'id']);
    }

 
    public function getDhLichSuLienLacs()
    {
        return $this->hasMany(LichSuLienLac::class, ['id_don_hang' => 'id']);
    }


    public function getKhachHang()
    {
        return $this->hasOne(KhachHang::class, ['id' => 'id_khach_hang']);
    }
}