<?php

use smart\widgets\ActiveForm;
use yii\helpers\Html;

?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'rate') ?>

    <?= $form->field($model, 'precision')->dropDownList([0 => '1', 1 => '0.1', 2 => '0.01']) ?>

    <?= $form->field($model, 'prefix') ?>

    <?= $form->field($model, 'suffix') ?>
    
    <?= $form->field($model, 'default')->checkbox() ?>

    <div class="form-group form-buttons row">
        <div class="col-sm-10 offset-sm-2">
            <?= Html::submitButton(Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('cms', 'Cancel'), ['index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
