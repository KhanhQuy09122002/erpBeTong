<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\sanpham\models\Loai */
?>
<div class="loai-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_loai',
            'id_danh_muc',
            'nguoi_tao',
            'thoi_gian_tao',
        ],
    ]) ?>

</div>
