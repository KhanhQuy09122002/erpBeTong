<?php
namespace app\modules\nhanvien\models;

use app\modules\nhanvien\models\base\NhanVienBase;
use app\modules\user\models\User;


class NhanVien extends NhanVienBase
{
    public function getPhongBan()
    {
        return $this->hasOne(PhongBan::class, ['id' => 'id_phong_ban']);
    }

    public function getTaiKhoan()
    {
        return $this->hasOne(User::class, ['id' => 'tai_khoan']);
    }
}