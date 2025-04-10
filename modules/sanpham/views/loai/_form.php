<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use app\modules\sanpham\models\DanhMuc;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\sanpham\models\Loai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loai-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
         <div class="col-md-4">
              <?= $form->field($model, 'ten_loai')->textInput(['maxlength' => true]) ?>
         </div>
         <div class="col-md-4">
            <?= $form->field($model, 'id_danh_muc')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(DanhMuc::find()->all(), 'id', 'ten_danh_muc'), 
                  'language' => 'vi', 
                  'options' => ['placeholder' => 'Chọn danh mục...'], 
                  'pluginOptions' => [
                      'allowClear' => true, 
                      'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
                      'containerCssClass' => 'select2-dropdown-adjustment', 
                     ],
            ]); ?>
         </div>
    </div>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
