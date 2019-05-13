<?php

use smart\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use dkhlystov\uploadimage\widgets\UploadImage;
use smart\catalog\backend\assets\VendorAsset;

VendorAsset::register($this);

?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->widget(UploadImage::className()) ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'url', ['append' => [
        ['button' => '<i class="fas fa-sync"></i>', 'options' => ['id' => 'make-url', 'data-url' => Url::toRoute(['make-url'])]],
    ]]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'link') ?>

    <div class="form-group form-buttons row">
        <div class="col-sm-10 offset-sm-2">
            <?= Html::submitButton(Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('cms', 'Cancel'), ['index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
