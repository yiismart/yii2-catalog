<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Vendor extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_vendor';
    }

    /**
     * Products relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['vendor_id' => 'id'])->inverseOf('vendor');
    }
}
