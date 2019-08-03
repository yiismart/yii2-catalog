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

    /**
     * City relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * Delivery type relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getType()
    {
        return $this->hasOne(DeliveryType::className(), ['id' => 'delivery_type_id']);
    }

    /**
     * Prices relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getPrices()
    {
        return $this->hasMany(DeliveryPrice::className(), ['delivery_id' => 'id'])->inverseOf('delivery');
    }
}
