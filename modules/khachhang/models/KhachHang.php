<?php
namespace app\modules\khachhang\models;

use app\modules\khachhang\models\base\KhachHangBase;
use app\modules\donhang\models\DonHang;


class KhachHang extends KhachHangBase
{
    public function getDhDonHangs()
    {
        return $this->hasMany(DonHang::class, ['id_khach_hang' => 'id']);
    }
}