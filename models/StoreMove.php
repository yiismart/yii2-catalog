<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class StoreMove extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_store_move';
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
     * Store from relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getStoreFrom()
    {
        return $this->hasOne(Store::className(), ['id' => 'storeFrom_id']);
    }

    /**
     * Store to relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getStoreTo()
    {
        return $this->hasOne(Store::className(), ['id' => 'storeTo_id']);
    }

    /**
     * Consumption relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getConsumption()
    {
        return $this->hasOne(StoreConsumption::className(), ['id' => 'store_consumption_id']);
    }

    /**
     * Arrival relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getArrival()
    {
        return $this->hasOne(StoreArrival::className(), ['id' => 'store_arrival_id']);
    }
}
