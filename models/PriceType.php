<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class PriceType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_price_type';
    }

    /**
     * @inheritdoc
     * Default values
     */
    public function __construct($config = [])
    {
        parent::__construct(array_replace([
            'discountEnabled' => false,
            'couponEnabled' => false,
            'default' => false,
        ], $config));
    }

    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }
}
