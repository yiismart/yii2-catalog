<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class DiscountProduct extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_discount_product';
    }

    /**
     * Discount relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getDiscount()
    {
        return $this->hasOne(Discount::className(), ['id' => 'discount_id']);
    }
}
