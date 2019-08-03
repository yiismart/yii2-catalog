<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;
use smart\user\models\User;

class Customer extends ActiveRecord
{
    const TYPE_PRIVATE = 0;
    const TYPE_LEGAL = 1;

    private static $_typeNames = [
        TYPE_PRIVATE => 'Private person',
        TYPE_LEGAL => 'Legal entity',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_customer';
    }

    /**
     * User relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Price type relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getPriceType()
    {
        return $this->hasOne(PriceType::className(), ['id' => 'price_type_id']);
    }

    /**
     * Addresses relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['customer_id' => 'id']);
    }
}
