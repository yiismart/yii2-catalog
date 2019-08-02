<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class DiscountCustomer extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_discount_customer';
    }
}
