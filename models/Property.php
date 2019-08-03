<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class Property extends ActiveRecord
{
    // Types
    const BOOLEAN = 0;
    const INTEGER = 1;
    const FLOAT = 2;
    const SELECT = 3;
    const MULTIPLE = 4;

    // Visibility
    const GENERAL = 0;
    const ADDITIONAL = 1;

    /**
     * @var array type names
     */
    private static $typeNames = [
        self::BOOLEAN => 'Logical',
        self::INTEGER => 'Integer',
        self::FLOAT => 'Fractional',
        self::SELECT => 'Select',
        self::MULTIPLE => 'Multiple',
    ];

    /**
     * @var array visibility names
     */
    private static $visibilityNames = [
        self::GENERAL => 'General',
        self::ADDITIONAL => 'Additional',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_property';
    }

    /**
     * Category relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Group relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getGroup()
    {
        return $this->hasOne(PropertyGroup::className(), ['id' => 'property_group_id']);
    }
}
