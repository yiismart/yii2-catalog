<?php

namespace smart\catalog\backend\filters;

use Yii;
use yii\data\ActiveDataProvider;
use smart\base\FilterInterface;
use smart\catalog\models\Carrier;

class CarrierFilter extends Carrier implements FilterInterface
{
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('catalog', 'Name'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getDataProvider($config = [])
    {
        $query = self::find();
        $query->andFilterWhere(['like', 'name', $this->name]);

        $config['query'] = $query;
        return new ActiveDataProvider($config);
    }
}
