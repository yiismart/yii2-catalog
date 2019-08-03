<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class ProductImage extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_product_image';
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
