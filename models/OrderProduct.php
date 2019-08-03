<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class OrderProduct extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_product';
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
     * Product relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * Product price relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProductPrice()
    {
        return $this->hasOne(ProductPrice::className(), ['id' => 'product_price_id']);
    }

    /**
     * Product measure unit relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProductMeasureUnit()
    {
        return $this->hasOne(ProductMeasureUnit::className(), ['id' => 'product_measure_unit_id']);
    }

    /**
     * Discount relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getDiscount()
    {
        return $this->hasOne(Discount::className(), ['id' => 'discount_id']);
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
