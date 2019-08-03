<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Order extends ActiveRecord
{
    const STATE_NEW = 0;
    const STATE_VERIFICATION = 1;
    const STATE_PAYMENT = 2;
    const STATE_SHIPPING = 3;
    const STATE_DELIVERY = 4;
    const STATE_COMPLETE = 5;
    const STATE_REFUND = 6;
    const SATTE_CANCELED = 7;

    private static $_stateNames = [
        self::STATE_NEW => 'New',
        self::STATE_VERIFICATION => 'Verification',
        self::STATE_PAYMENT => 'Payment',
        self::STATE_SHIPPING => 'Shipping',
        self::STATE_DELIVERY => 'Delivery',
        self::STATE_COMPLETE => 'Complete',
        self::STATE_REFUND => 'Refund',
        self::SATTE_CANCELED => 'Canceled',
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
