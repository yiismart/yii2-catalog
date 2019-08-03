<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class CouponCustomer extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_coupon_customer';
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
     * Customer relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }
}
