<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class StoreReserveProduct extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_store_reserve_product';
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
     * Reserve relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getReserve()
    {
        return $this->hasOne(StoreReserve::className(), ['id' => 'store_reserve_id']);
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
     * Measure unit relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getMeasureUnit()
    {
        return $this->hasOne(ProductMeasureUnit::className(), ['id' => 'product_measure_unit_id']);
    }
}
