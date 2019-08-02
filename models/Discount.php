<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Discount extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_discount';
    }

    /**
     * Available customers relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCustomers()
    {
        return $this->hasMany(DiscountCustomer::className(), ['discount_id' => 'id']);
    }

    /**
     * Available products relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProducts()
    {
        return $this->hasMany(DiscountProducts::className(), ['discount_id' => 'id']);
    }
}
