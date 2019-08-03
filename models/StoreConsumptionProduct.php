<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class StoreConsumptionProduct extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_store_consumption_product';
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
     * Consumption relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getConsumption()
    {
        return $this->hasOne(StoreConsumption::className(), ['id' => 'store_consumption_id']);
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
