<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\donhang\models\DonHang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="don-hang-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
         <div class="col-md-4">
                <?= $form->field($model, 'id_khach_hang')->textInput() ?>
         </div>
         <div class="col-md-4">
                <?= $form->field($model, 'ten_cong_trinh')->textInput(['maxlength' => true]) ?>
         </div>
         <div class="col-md-4">
                <?= $form->field($model, 'dia_diem')->textInput(['maxlength' => true]) ?>
         </div>
         <div class="col-md-4">
                <?= $form->field($model, 'hang_muc_xay_dung')->textInput(['maxlength' => true]) ?>
         </div>
         <div class="col-md-4">
                <?= $form->field($model, 'nguoi_tiep_nhan_don_hang')->textInput(['maxlength' => true]) ?>
         </div>
         <div class="col-md-4">
                <?= $form->field($model, 'ngay_nhap_don_hang')->textInput() ?>
         </div>
         <div class="col-md-4">
               <?= $form->field($model, 'nhan_vien_thuc_hien')->textInput() ?>
         </div>
    </div>
   
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
