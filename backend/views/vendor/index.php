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
    <?= Html::a(Yii::t('cms', 'Add'), ['create'], ['class' => 'btn btn-primary']) ?>
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
                $alias = Html::tag('span', Html::encode($model->alias), ['class' => 'badge badge-secondary']);
                $caption = Html::tag('div', $name . $alias);

                return $image . $caption;
            },
        ],
        [
            'attribute' => 'link',
            'format' => 'html',
            'content' => function($model, $key, $index, $column) {
                if (empty($model->link)) {
                    return null;
                }
                return Html::a($model->link);
            },
        ],
        [
            'class' => 'smart\grid\ActionColumn',
        ],
    ],
]) ?>
