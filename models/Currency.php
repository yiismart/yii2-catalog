<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Currency extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_currency';
    }

    /**
     * @inheritdoc
     * Default values
     */
    public function __construct($config = [])
    {
        parent::__construct(array_replace([
            'precision' => 2,
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
}
