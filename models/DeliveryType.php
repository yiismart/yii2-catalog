<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class DeliveryType extends ActiveRecord
{
    // Type
    const PICKUP = 0;
    const COURIER = 1;
    const CARRIER = 2;

    /**
     * @var array
     */
    private static $typeNames = [
        PICKUP => 'Pickup',
        COURIER => 'Courier',
        CARRIER => 'Carrier',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_delivery_type';
    }
}
