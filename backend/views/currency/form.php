<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>
<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
]); ?>

    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'code') ?>
    <?= $form->field($model, 'rate') ?>
    <?= $form->field($model, 'precision')->dropDownList([0 => '1', 1 => '0.1', 2 => '0.01']) ?>
    <?= $form->field($model, 'prefix') ?>
    <?= $form->field($model, 'suffix') ?>
    <?= $form->field($model, 'default')->checkbox() ?>

    <div class="form-group form-buttons row">
        <div class="col-sm-12">
            <?= Html::submitButton(Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('cms', 'Cancel'), ['index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
