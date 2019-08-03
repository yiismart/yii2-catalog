<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;

class PropertyGroup extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_property_group';
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
     * Properties relation
     * @return yii\db\ActiveQueryInterface
     */
    public function getProperties()
    {
        return $this->hasOne(Property::className(), ['property_group_id' => 'id'])->inverseOf('group');
    }
}
