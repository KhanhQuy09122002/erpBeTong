<?php
namespace app\modules\nhanvien\models;

use app\modules\nhanvien\models\base\PhongBanBase;

class PhongBan extends PhongBanBase
{
    public function getNvNhanViens()
    {
        return $this->hasMany(NhanVien::class, ['id_phong_ban' => 'id']);
    }
}