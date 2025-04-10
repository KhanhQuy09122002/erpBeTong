<?php
namespace app\modules\donhang\models;

use app\modules\donhang\models\base\LichSuLienLacBase;

class LichSuLienLac extends LichSuLienLacBase
{

    public function getDonHang()
    {
        return $this->hasOne(DonHang::class, ['id' => 'id_don_hang']);
    }
}