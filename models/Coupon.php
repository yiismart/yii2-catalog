<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Coupon extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_coupon';
    }

    public function getCustomers()
    {
        return $this->hasMany(CouponCustomer::className(), ['coupon_id' => 'id']);
    }

    public function getProducts()
    {
        return $this->hasMany(CouponProducts::className(), ['coupon_id' => 'id']);
    }
}
