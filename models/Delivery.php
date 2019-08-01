<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;
use smart\city\models\City;

class Delivery extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_delivery';
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getType()
    {
        return $this->hasOne(DeliveryType::className(), ['id' => 'delivery_type_id']);
    }

    public function getPrices()
    {
        return $this->hasMany(DeliveryPrice::className(), ['delivery_id' => 'id']);
    }
}
