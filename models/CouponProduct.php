<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class CouponProduct extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_coupon_product';
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
     * Product relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
