<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\donhang\models\DonHang */
?>
<div class="don-hang-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_khach_hang',
            'ten_cong_trinh',
            'dia_diem',
            'hang_muc_xay_dung',
            'nguoi_tiep_nhan_don_hang',
            'ngay_nhap_don_hang',
            'nhan_vien_thuc_hien',
            'tong_gia_tri_don_hang',
            'yeu_cau_giam_gia:ntext',
            'trang_thai_duyet_giam_gia',
            'nguoi_duyet',
            'ghi_chu_nguoi_duyet:ntext',
            'gia_cuoi_cung',
            'trang_thai',
            'nguoi_tao',
            'thoi_gian_tao',
        ],
    ]) ?>

</div>
