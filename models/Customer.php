<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;
use smart\user\models\User;

class Customer extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_customer';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getPriceType()
    {
        return $this->hasOne(PriceType::className(), ['id' => 'price_type_id']);
    }

    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['customer_id' => 'id']);
    }
}
