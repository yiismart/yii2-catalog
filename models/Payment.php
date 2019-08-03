<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Payment extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_payment';
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
     * Payment type relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getPaymentType()
    {
        return $this->hasOne(PaymentType::className(), ['id' => 'payment_type_id']);
    }
}
