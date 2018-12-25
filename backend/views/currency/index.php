<?php

use yii\helpers\Html;
use smart\grid\GridView;

// Title
$title = Yii::t('catalog', 'Currencies');
$this->title = $title . ' | ' . Yii::$app->name;

// Breadcrumbs
$this->params['breadcrumbs'] = [
    $title,
];

?>
<h1><?= Html::encode($title) ?></h1>

<p class="form-buttons">
    <?= Html::a(Yii::t('cms', 'Create'), ['create'], ['class' => 'btn btn-primary']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $model->getDataProvider(),
    'columns' => [
        [
            'attribute' => 'name',
            'content' => function ($model) {
                $name = Html::encode($model->name);
                if ($model->default) {
                    $name .= ' ' . Html::tag('span', Yii::t('catalog', 'Default'), ['class' => 'badge badge-secondary']);
                }
                return $name;
            },
        ],
        'code',
        'rate',
        [
            'class' => 'smart\grid\ActionColumn',
        ],
    ],
]) ?>
