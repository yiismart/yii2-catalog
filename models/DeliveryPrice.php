<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class DeliveryPrice extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_delivery_price';
    }

    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }
}
