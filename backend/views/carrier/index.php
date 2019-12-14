<?php

use yii\helpers\Html;
use smart\grid\GridView;

// Title
$title = Yii::t('catalog', 'Carriers');
$this->title = $title . ' | ' . Yii::$app->name;

// Breadcrumbs
$this->params['breadcrumbs'] = [
    Yii::t('catalog', 'Catalog'),
    $title,
];

?>
<h1><?= Html::encode($title); ?></h1>

<p class="form-buttons">
    <?= Html::a(Yii::t('cms', 'Add'), ['create'], ['class' => 'btn btn-primary']); ?>
</p>

<?= GridView::widget([
    'dataProvider' => $model->getDataProvider(),
    'filterModel' => $model,
    'columns' => [
        [
            'attribute' => 'name',
            'format' => 'html',
            'content' => function($model, $key, $index, $column) {
                $options = ['class' => 'list-icon'];
                if (!empty($model->image)) {
                    Html::addCssStyle($options, 'background-image: url(' . $model->image . ');');
                }
                $image = Html::tag('div', '', $options);

                $name = Html::tag('div', Html::encode($model->name));
                $caption = Html::tag('div', $name);

                return $image . $caption;
            },
        ],
        [
            'class' => 'smart\grid\ActionColumn',
        ],
    ],
]); ?>
