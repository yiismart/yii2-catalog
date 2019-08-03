<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Product extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_product';
    }

    /**
     * Category relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
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
     * Vendor relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['id' => 'vendor_id']);
    }

    /**
     * Availability relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getAvailability()
    {
        return $this->hasMany(ProductAvailability::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * Images relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * Measure units relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getMeasureUnits()
    {
        return $this->hasMany(ProductMeasureUnit::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * Prices relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getPrices()
    {
        return $this->hasMany(ProductPrice::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * Properties relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProperties()
    {
        return $this->hasMany(ProductProperty::className(), ['product_id' => 'id'])->inverseOf('product');
    }
}
