<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;
use smart\city\models\City;

class ProductAvailability extends ActiveRecord
{
    // Availability
    const INSTOCK = 0;
    const UNDERTHEORDER = 1;
    const NOTAVAILABLE = 2;

    /**
     * @var array
     */
    private static $availabilityNames = [
        self::INSTOCK => 'In stock',
        self::UNDERTHEORDER => 'Under the order',
        self::NOTAVAILABLE => 'Not available',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_product_availability';
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
     * Product relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
