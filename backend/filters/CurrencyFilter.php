<?php

namespace smart\catalog\backend\filters;

use Yii;
use yii\data\ActiveDataProvider;
use smart\base\FilterInterface;
use smart\catalog\models\Currency;

class CurrencyFilter extends Currency implements FilterInterface
{
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('catalog', 'Name'),
            'code' => Yii::t('catalog', 'Code'),
            'rate' => Yii::t('catalog', 'Rate'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['code', 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getDataProvider($config = [])
    {
        $query = self::find();
        $query->andFilterWhere(['like', 'code', $this->code]);

        $config['query'] = $query;
        return new ActiveDataProvider($config);
    }
}
