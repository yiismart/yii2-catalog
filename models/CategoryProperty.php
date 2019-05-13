<?php

namespace smart\catalog\models;

use Yii;
use yii\db\ActiveRecord;

class CategoryProperty extends ActiveRecord
{

    // Types
    const TYPE_BOOLEAN = 0;
    const TYPE_INTEGER = 1;
    const TYPE_FLOAT = 2;
    const TYPE_SELECT = 3;
    const TYPE_MULTIPLE = 4;

    /**
     * @var boolean properties from parent categories is read-only
     */
    public $readOnly = false;

    /**
     * @var array
     */
    private static $_typeNames;

    /**
     * @var array type names
     */
    private static $typeNames = [
        self::TYPE_BOOLEAN => 'Logical',
        self::TYPE_INTEGER => 'Integer',
        self::TYPE_FLOAT => 'Decimal',
        self::TYPE_SELECT => 'Select',
        self::TYPE_MULTIPLE => 'Multiple',
    ];

    /**
     * Getter for types
     * @return array
     */
    public static function getTypes()
    {
        return array_keys(self::$typeNames);
    }

    /**
     * Getter for type names with translation
     * @return array
     */ 
    public static function getTypeNames()
    {
        if (self::$_typeNames !== null) {
            return self::$_typeNames;
        }

        return self::$_typeNames = array_map(function($name) {
            return Yii::t('catalog', $name);
        }, self::$typeNames);
    }

    /**
     * Getter for types which values needed
     * @return array
     */
    public static function getTypesWithValues()
    {
        return [self::TYPE_SELECT, self::TYPE_MULTIPLE];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_category_property';
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return parent::find()->orderBy(['order' => SORT_ASC]);        
    }

    /**
     * Values getter
     * @return string[]
     */
    public function getValues()
    {
        $result = @unserialize($this->svalues);
        
        if (!is_array($result)) {
            $result = [];
        }

        return $result;
    }

    /**
     * Values setter
     * @param string[] $value 
     * @return void
     */
    public function setValues($value)
    {
        $this->svalues = serialize($value);
    }

}
