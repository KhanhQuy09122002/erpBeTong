<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use app\modules\nhanvien\models\PhongBan;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\modules\user\models\User;
$phongBans = PhongBan::find()->all();
$listPhongBan = ArrayHelper::map($phongBans, 'id', 'ten_phong_ban');


$taiKhoans = User::find()->all();
$listTaiKhoan = ArrayHelper::map($taiKhoans, 'id', 'username');
?>


<div class="nhan-vien-search">

    <?php $form = ActiveForm::begin([
        'id' => 'myFilterForm',
        'method' => 'get', // Chuyển từ POST sang GET
        'options' => [
            'class' => 'myFilterForm'
        ]
    ]); ?>
<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'ho_ten')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
           <?= $form->field($model, 'gioi_tinh')->dropDownList([
                    1 => 'Nam',
                    0 => 'Nữ',
                    ], ['prompt' => 'Chọn giới tính', 'class' => 'form-control']) ?>
    </div>
    <div class="col-md-3">
           <?= $form->field($model, 'ngay_sinh')->widget(DatePicker::classname(), [
                   'options' => ['placeholder' => 'Chọn ngày sinh  ...'],
                   'pluginOptions' => [
                   'autoclose' => true,
                   'format' => 'dd/mm/yyyy',
                    ]
               ]); ?>
    </div>

    <div class="col-md-3">
        <?= $form->field($model, 'chuc_vu')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
         <?= $form->field($model, 'so_cccd')->textInput(['maxlength' => true]) ?>
    </div> 
    <div class="col-md-3">
          <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
  

    <div class="col-md-3">
          <?= $form->field($model, 'id_phong_ban')->dropDownList(
                    $listPhongBan,
                      [
                         'prompt' => 'Chọn phòng ban...',
                         'id' => 'phong-ban-dropdown'
                      ]
                 ) ?>
    </div>
 

    <div class="col-md-3">
        <?= $form->field($model, 'tai_khoan')->dropDownList(
                 $listTaiKhoan,
                 ['prompt' => 'Chọn tài khoản...']
               ) ?>
    </div>
    <div class="col-md-3">
         <?= $form->field($model, 'trang_thai')->dropDownList([
                     'Đang làm việc' => 'Đang làm việc',
                     'Tạm nghỉ'=>'Tạm nghỉ',
                     'Đã nghỉ việc' => 'Đã nghỉ việc',
                  ], ['prompt' => 'Chọn trạng thái']) ?>
    </div>


</div>


    <?php if (!Yii::$app->request->isAjax){ ?>
    <div class="col-md-12 text-center">
        <div class="form-group mb-0">
	        <?= Html::submitButton('<i class="fe fe-search"></i> Tìm kiếm',['class' => 'btn btn-primary']) ?>
	        <?= Html::resetButton('<i class="fe fe-x"></i> Xóa tìm kiếm', ['class' => 'btn btn-info']) ?>
	    </div>
    </div>
    <?php } ?>


    <?php ActiveForm::end(); ?>
    
</div>

<style>
.nhan-vien-search label {
    font-weight: bold;
}
</style>
