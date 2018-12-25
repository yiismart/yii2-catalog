<?php

use yii\helpers\Html;

// Title
$title = $object->name . ' (' . $object->code . ')';
$this->title = $title . ' | ' . Yii::$app->name;

// Breadcrumbs
$this->params['breadcrumbs'] = [
    Yii::t('catalog', 'Catalog'),
    ['label' => Yii::t('catalog', 'Currencies'), 'url' => ['index']],
    $title,
];

?>
<h1><?= Html::encode($title) ?></h1>

<?= $this->render('form', ['model' => $model]) ?>
