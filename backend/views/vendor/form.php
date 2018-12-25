<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use dkhlystov\uploadimage\widgets\UploadImage;

//thumb size
$module = Yii::$app->controller->module;
$thumbWidth = $module->vendorThumbWidth;
$thumbHeight = $module->vendorThumbHeight;

//label suffix
$imageSize = ' <span class="badge badge-secondary">' . $thumbWidth . '&times' . $thumbHeight . '</span>';

//widget size
$width = $thumbWidth;
if ($width < 20) $width = 20;
if ($width > 282) $width = 282;
$height = $thumbHeight / $thumbWidth * $width;
if ($height < 20) $height = 20;

?>
<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
]); ?>

    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
    <?= $form->field($model, 'url') ?>
    <?= $form->field($model, 'file')->label($model->getAttributeLabel('file') . $imageSize)->widget(UploadImage::className(), [
        'thumbAttribute' => 'thumb',
        'thumbWidth' => $thumbWidth,
        'thumbHeight' => $thumbHeight,
        'width' => $width,
        'height' => $height,
    ]) ?>

    <div class="form-group form-buttons row">
        <div class="col-sm-12">
            <?= Html::submitButton(Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('cms', 'Cancel'), ['index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
