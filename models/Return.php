<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Return extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_return';
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
     * Products relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProducts()
    {
        return $this->hasMany(ReturnProduct::className(), ['return_id' => 'id']);
    }

    /**
     * Refunds relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getRefunds()
    {
        return $this->hasMany(Refund::className(), ['return_id' => 'id']);
    }
}
