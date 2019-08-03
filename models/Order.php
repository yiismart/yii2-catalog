<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Order extends ActiveRecord
{
    const NEW = 0;
    const VERIFICATION = 1;
    const PAYMENT = 2;
    const PROCESSING = 3;
    const SHIPPING = 4;
    const DELIVERY = 5;
    const COMPLETE = 6;
    const CANCELED = 7;

    private static $stateNames = [
        self::NEW => 'New',
        self::VERIFICATION => 'Verification',
        self::PAYMENT => 'Payment',
        self::PROCESSING => 'Processing',
        self::SHIPPING => 'Shipping',
        self::DELIVERY => 'Delivery',
        self::COMPLETE => 'Complete',
        self::CANCELED => 'Canceled',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_order';
    }

    /**
     * Customer relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * Currency relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * Billing address relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getBillingAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'billingAddress_id']);
    }

    /**
     * Coupon relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCoupon()
    {
        return $this->hasOne(Coupon::className(), ['id' => 'coupon_id']);
    }

    /**
     * Order delivery relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getDelivery()
    {
        return $this->hasOne(OrderDelivery::className(), ['order_id' => 'id']);
    }

    /**
     * Products relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['order_id' => 'id']);
    }

    /**
     * Payments relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['order_id' => 'id']);
    }

    /**
     * Returns relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getReturns()
    {
        return $this->hasMany(Return::className(), ['order_id' => 'id']);
    }

    /**
     * Refunds relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getRefunds()
    {
        return $this->hasMany(Refund::className(), ['order_id' => 'id']);
    }
}
