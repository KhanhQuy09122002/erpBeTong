<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sanpham\models\DanhMuc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="danh-muc-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
             <?= $form->field($model, 'ten_danh_muc')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
              <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>
        </div>
    </div>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
