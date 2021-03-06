<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;
use smart\user\models\User;

class Customer extends ActiveRecord
{
    // Type
    const PRIVATE = 0;
    const LEGAL = 1;

    /**
     * @var array
     */
    private static $typeNames = [
        PRIVATE => 'Private person',
        LEGAL => 'Legal entity',
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
        return $this->hasOne(PriceType::className(), ['id' => 'price_id']);
    }

    /**
     * Addresses relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['customer_id' => 'id'])->inverseOf('customer');
    }
}
