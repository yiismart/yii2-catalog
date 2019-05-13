<?php

use yii\helpers\Html;
use yii\web\JsExpression;
use dkhlystov\widgets\NestedTreeGrid;

// Title
$title = Yii::t('catalog', 'Categories');
$this->title = $title . ' | ' . Yii::$app->name;

// Breadcrumbs
$this->params['breadcrumbs'] = [
    Yii::t('catalog', 'Catalog'),
    $title,
];

$maxDepth = Yii::$app->controller->module->maxCategoryDepth;

?>
<h1><?= Html::encode($title) ?></h1>

<p class="form-buttons">
    <?= Html::a(Yii::t('cms', 'Create'), ['create'], ['class' => 'btn btn-primary']) ?>
    <?php if (Yii::$app->controller->module->propertiesEnabled) echo Html::a(Yii::t('catalog', 'Common properties'), ['properties'], ['class' => 'btn btn-primary']) ?>
</p>

<?= NestedTreeGrid::widget([
    'dataProvider' => $model->getDataProvider(),
    'initialNode' => $initial,
    'moveAction' => ['move'],
    'rowOptions' => function ($model, $key, $index, $grid) {
        $options = ['data-product-count' => $model->productCount];
        if (!$model->active) {
            Html::addCssClass($options, 'table-warning');
        }
        return $options;
    },
    'pluginOptions' => [
        'onMoveOver' => new JsExpression('function (item, helper, target, position) {
            if (position == 1) return target.data("productCount") == 0;
            return true;
        }'),
    ],
    'columns' => [
        [
            'attribute' => 'title',
            'format' => 'html',
            'content' => function($model, $key, $index, $column) {
                $result = Html::encode($model->title);
                if ($model->productCount > 0) {
                    $result .= '&nbsp;' . Html::tag('span', $model->productCount, ['class' => 'badge badge-pill badge-secondary']);
                }
                return $result;
            },
        ],
        [
            'class' => 'smart\grid\ActionColumn',
            'options' => ['style' => 'width: 78px;'],
            'template' => '{update} {delete} {create}',
            'buttons' => [
                'create' => function ($url, $model, $key) {
                    $title = Yii::t('catalog', 'Create');
                    return Html::a('<span class="fas fa-plus"></span>', $url, [
                        'title' => $title,
                        'aria-label' => $title,
                        'data-pjax' => 0,
                    ]);
                },
            ],
            'visibleButtons' => [
                'delete' => function($model, $key, $index) {
                    return $model->productCount == 0;
                },
                'create' => function($model, $key, $index) use ($maxDepth) {
                    if ($model->productCount > 0) {
                        return false;
                    }
                    if ($maxDepth !== null && $model->depth >= $maxDepth) {
                        return false;
                    }

                    return true;
                },
            ],
        ],
    ],
]) ?>
