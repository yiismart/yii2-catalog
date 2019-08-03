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

    /**
     * Delivery relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getDelivery()
    {
        return $this->hasOne(Delivery::className(), ['id' => 'delivery_id']);
    }

    /**
     * Currency relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }
}
