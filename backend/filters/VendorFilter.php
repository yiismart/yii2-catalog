<?php

namespace smart\catalog\backend\filters;

use Yii;
use yii\data\ActiveDataProvider;
use smart\base\FilterInterface;
use smart\catalog\models\Vendor;

class VendorFilter extends Vendor implements FilterInterface
{
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('catalog', 'Title'),
            'link' => Yii::t('catalog', 'Link URL'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['title', 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getDataProvider($config = [])
    {
        $query = self::find();
        $query->andFilterWhere(['like', 'title', $this->title]);

        $config['query'] = $query;
        return new ActiveDataProvider($config);
    }
}
