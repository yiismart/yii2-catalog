<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class DeliveryType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_delivery_type';
    }
}
