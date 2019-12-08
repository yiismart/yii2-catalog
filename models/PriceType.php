<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class PriceType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_price_type';
    }

    /**
     * @inheritdoc
     * Default values
     */
    public function __construct($config = [])
    {
        parent::__construct(array_replace([
            'discountsEnabled' => false,
            'couponsEnabled' => false,
            'default' => false,
        ], $config));
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        // Default
        if (array_key_exists('default', $changedAttributes) && $this->default) {
            $this->updateAll(['default' => false], ['<>', 'id', $this->id]);
        }
    }

    /**
     * Currency relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }
}
