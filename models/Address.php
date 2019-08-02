<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;
use smart\city\models\City;

class Address extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_address';
    }

    /**
     * Customer relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * City relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
