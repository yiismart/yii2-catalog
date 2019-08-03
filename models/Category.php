<?php
namespace smart\catalog\models;

use yii\db\ActiveQuery;
use creocoder\nestedsets\NestedSetsBehavior;
use creocoder\nestedsets\NestedSetsQueryBehavior;
use smart\db\ActiveRecord;

class Category extends ActiveRecord
{
    const URL_SEPARATOR = '/';
    const PATH_SEPARATOR = ' » ';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_category';
    }

    /**
     * Property groups relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getPropertyGroups()
    {
        return $this->hasMany(PropertyGroup::className(), ['category_id' => 'id'])->inverseOf('category');
    }

    /**
     * Properties relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProperties()
    {
        return $this->hasMany(Property::className(), ['category_id' => 'id'])->inverseOf('category');
    }

    /**
     * @inheritdoc
     * Default values
     */
    public function __construct($config = [])
    {
        parent::__construct(array_replace([
            'active' => true,
        ], $config));
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
}

class CategoryQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }
}
