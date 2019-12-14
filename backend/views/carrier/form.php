<?php

use smart\widgets\ActiveForm;
use yii\helpers\Html;
use dkhlystov\uploadimage\widgets\UploadImage;

?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->widget(UploadImage::className()); ?>

    <?= $form->field($model, 'name'); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 5]); ?>

    <div class="form-group form-buttons row">
        <div class="col-sm-10 offset-sm-2">
            <?= Html::submitButton(Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']); ?>
            <?= Html::a(Yii::t('cms', 'Cancel'), ['index'], ['class' => 'btn btn-secondary']); ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
