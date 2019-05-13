<?php

namespace smart\catalog\backend\filters;

use Yii;
use yii\data\ActiveDataProvider;
use smart\base\FilterInterface;
use smart\catalog\models\Category;

class CategoryFilter extends Category implements FilterInterface
{

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('catalog', 'Title'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getDataProvider($config = [])
    {
        $query = self::find();

        $config['query'] = $query;
        return new ActiveDataProvider($config);
    }

}
