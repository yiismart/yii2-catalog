<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Coupon extends ActiveRecord
{
    // Type
    const AMOUNT = 0;
    const PERCENT = 1;
    const FREE_DELIVERY = 2;

    /**
     * @var array
     */
    private static $typeNames = [
        self::AMOUNT => 'Amount',
        self::PERCENT => 'Percent',
        self::FREE_DELIVERY => 'Free delivery',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_coupon';
    }

    /**
     * Available customers relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCustomers()
    {
        return $this->hasMany(CouponCustomer::className(), ['coupon_id' => 'id'])->inverseOf('coupon');
    }

    /**
     * Available products relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProducts()
    {
        return $this->hasMany(CouponProducts::className(), ['coupon_id' => 'id'])->inverseOf('coupon');
    }
}
