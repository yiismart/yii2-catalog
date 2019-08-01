<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Coupon extends ActiveRecord
{
    const TYPE_AMOUNT = 0;
    const TYPE_PERCENT = 1;
    const TYPE_FREE_DELIVERY = 2;

    private static $_typeNames = [
        self::TYPE_AMOUNT => 'Amount',
        self::TYPE_PERCENT => 'Percent',
        self::TYPE_FREE_DELIVERY => 'Free delivery',
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
        return $this->hasMany(CouponCustomer::className(), ['coupon_id' => 'id']);
    }

    /**
     * Available products relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProducts()
    {
        return $this->hasMany(CouponProducts::className(), ['coupon_id' => 'id']);
    }
}
