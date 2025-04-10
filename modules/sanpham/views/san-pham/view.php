<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\sanpham\models\SanPham */
?>
<div class="san-pham-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_san_pham',
            'id_danh_muc',
            'don_vi_tinh',
            'loai',
            'gia',
            'nguoi_tao',
            'thoi_gian_tao',
        ],
    ]) ?>

</div>
