<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class StoreArrival extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_store_arrival';
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
     * Store relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }

    /**
     * Products relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProducts()
    {
        return $this->hasOne(StoreArrivalProduct::className(), ['store_arrival_id' => 'id']);
    }
}
