<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class ReturnProduct extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_return_product';
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
     * Order return relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getReturn()
    {
        return $this->hasOne(Return::className(), ['id' => 'return_id']);
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
