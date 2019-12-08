<?php

namespace smart\catalog\backend\filters;

use Yii;
use yii\data\ActiveDataProvider;
use smart\base\FilterInterface;
use smart\catalog\models\PriceType;

class PriceTypeFilter extends PriceType implements FilterInterface
{
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('catalog', 'Name'),
            'discountsEnabled' => Yii::t('catalog', 'Enable discounts'),
            'couponsEnabled' => Yii::t('catalog', 'Enable coupons'),
            'default' => Yii::t('catalog', 'Default'),
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
