<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;
use smart\city\models\City;

class Store extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_store';
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
     * Arrivals relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getArrivals()
    {
        return $this->hasMany(StoreArrival::className(), ['store_id' => 'id'])->inverseOf('store');
    }

    /**
     * Consumptions relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getConsumptions()
    {
        return $this->hasMany(StoreConsumption::className(), ['store_id' => 'id'])->inverseOf('store');
    }

    /**
     * Move from relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getMovesFrom()
    {
        return $this->hasMany(StoreMove::className(), ['storeFrom_id' => 'id'])->inverseOf('storeFrom');
    }

    /**
     * Move to relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getMovesTo()
    {
        return $this->hasMany(StoreMove::className(), ['storeTo_id' => 'id'])->inverseOf('storeTo');
    }

    /**
     * Reserves relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getReserves()
    {
        return $this->hasMany(StoreReserve::className(), ['store_id' => 'id'])->inverseOf('store');
    }

    /**
     * Products relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProducts()
    {
        return $this->hasMany(StoreProduct::className(), ['store_id' => 'id'])->inverseOf('store');
    }
}
