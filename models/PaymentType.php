<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class PaymentType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_payment_type';
    }
}
