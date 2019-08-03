<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class OrderDelivery extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_order_delivery';
    }

    /**
     * Order relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
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
     * Store relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }

    /**
     * Delivery address relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }

    /**
     * Carrier relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCarrier()
    {
        return $this->hasOne(Carrier::className(), ['id' => 'carrier_id']);
    }

    /**
     * Coupon relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCoupon()
    {
        return $this->hasOne(Coupon::className(), ['id' => 'coupon_id']);
    }
}
