<?php
namespace app\modules\donhang\models;

use app\modules\donhang\models\base\LichSuGapMatBase;

class LichSuGapMat extends LichSuGapMatBase
{

    public function getDonHang()
    {
        return $this->hasOne(DonHang::class, ['id' => 'id_don_hang']);
    }
}