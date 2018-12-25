<?php

use yii\helpers\Html;
use smart\grid\GridView;

// Title
$title = Yii::t('catalog', 'Vendors');
$this->title = $title . ' | ' . Yii::$app->name;

// Breadcrumbs
$this->params['breadcrumbs'] = [
    Yii::t('catalog', 'Catalog'),
    $title,
];

?>
<h1><?= Html::encode($title) ?></h1>

<p class="form-buttons">
    <?= Html::a(Yii::t('cms', 'Create'), ['create'], ['class' => 'btn btn-primary']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $model->getDataProvider(),
    'filterModel' => $model,
    'columns' => [
        [
            'attribute' => 'name',
            'format' => 'html',
            'content' => function($model, $key, $index, $column) {
                $result = '';
                if (!empty($model->thumb)) {
                    $result .= Html::img($model->thumb, ['height' => 20]) . '&nbsp;';
                }
                $result .= Html::encode($model->name);
                return $result;
            },
        ],
        [
            'attribute' => 'url',
            'format' => 'html',
            'content' => function($model, $key, $index, $column) {
                if (empty($model->url)) {
                    return null;
                }
                return Html::a($model->url);
            },
        ],
        [
            'class' => 'smart\grid\ActionColumn',
        ],
    ],
]) ?>
