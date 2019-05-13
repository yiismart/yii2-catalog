<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use smart\catalog\backend\assets\CategoryFormAsset;
use smart\widgets\ArrayInput;

CategoryFormAsset::register($this);

// Title
$title = Yii::t('catalog', 'Common properties');
$this->title = $title . ' | ' . Yii::$app->name;

// Breadcrumbs
$this->params['breadcrumbs'] = [
    ['label' => Yii::t('catalog', 'Categories'), 'url' => ['index']],
    $title,
];

?>
<h1><?= Html::encode($title) ?></h1>

<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
]); ?>

    <?= $form->field($model, 'properties')->widget(ArrayInput::className(), require(__DIR__ . '/config.php')) ?>

    <div class="form-group form-buttons row">
        <div class="col-sm-12">
            <?= Html::submitButton(Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('cms', 'Cancel'), ['index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
