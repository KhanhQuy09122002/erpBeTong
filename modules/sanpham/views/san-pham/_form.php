<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use app\modules\sanpham\models\DanhMuc;
use app\modules\sanpham\models\Loai;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
?>

<div class="san-pham-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
              <?= $form->field($model, 'ten_san_pham')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'id_danh_muc')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(DanhMuc::find()->all(), 'id', 'ten_danh_muc'), 
                  'language' => 'vi', 
                  'options' => ['placeholder' => 'Chọn danh mục...', 'id' => 'id_danh_muc'], 
                  'pluginOptions' => [
                      'allowClear' => true, 
                      'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
                      'containerCssClass' => 'select2-dropdown-adjustment', 
                     ],
            ]); ?>
        </div>
        <div class="col-md-4">
              <?= $form->field($model, 'don_vi_tinh')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'loai')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(Loai::find()->all(), 'id', 'ten_loai'), 
                  'language' => 'vi', 
                  'options' => ['placeholder' => 'Chọn loại...','id' => 'loai-id'], 
                  'pluginOptions' => [
                      'allowClear' => true, 
                      'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
                      'containerCssClass' => 'select2-dropdown-adjustment', 
                     ],
            ]); ?>
        </div>
        <div class="col-md-4">
              <?= $form->field($model, 'gia')->textInput() ?>
        </div>
    </div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

<?php
$script = <<<JS
$('#id_danh_muc').on('change', function() {
    var id = $(this).val();

    console.log("Đang gửi request với id_danh_muc:", id); // log để theo dõi

    $.ajax({
        url: '/sanpham/san-pham/get-loai',
        type: 'POST',
        data: {id_danh_muc: id},
        success: function(data) {
            console.log("Dữ liệu nhận về từ server:", data); // Log kết quả trả về

            var select = $('#loai-id');
            select.empty();
            select.append('<option value="">Chọn loại...</option>');

            if (data && typeof data === 'object') {
                $.each(data, function(key, value) {
                    select.append('<option value="' + key + '">' + value + '</option>');
                });
            } else {
                alert("Dữ liệu trả về không hợp lệ.");
            }

            select.trigger('change');
        },
        error: function(xhr, status, error) {
            console.error("Lỗi AJAX:", status, error);
            console.log("ResponseText:", xhr.responseText);

            alert("Đã xảy ra lỗi khi tải loại sản phẩm. Vui lòng kiểm tra console để biết chi tiết.");
        }
    });
});
JS;
$this->registerJs($script);
?>

