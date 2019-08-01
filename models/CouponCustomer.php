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
}
