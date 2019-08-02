<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class DeliveryType extends ActiveRecord
{
    const TYPE_PICKUP = 0;
    const TYPE_COURIER = 1;
    const TYPE_CARRIER = 2;

    private static $_typeNames = [
        TYPE_PICKUP => 'Pickup',
        TYPE_COURIER => 'Courier',
        TYPE_CARRIER => 'Carrier',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_delivery_type';
    }
}
