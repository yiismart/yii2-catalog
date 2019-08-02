<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class MeasureUnit extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_measure_unit';
    }
}
