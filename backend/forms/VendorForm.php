<?php

namespace smart\catalog\backend\forms;

use Yii;
use smart\base\Form;
use smart\catalog\models\Vendor;

class VendorForm extends Form
{
    /**
     * @var string Title
     */
    public $title;

    /**
     * @var string
     */
    public $alias;

    /**
     * @var string Description
     */
    public $description;

    /**
     * @var string Link
     */
    public $link;

    /**
     * @var string Image
     */
    public $image;

    /**
     * @var integer
     */
    private $_id;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('catalog', 'Title'),
            'alias' => Yii::t('catalog', 'Friendly URL'),
            'description' => Yii::t('catalog', 'Description'),
            'link' => Yii::t('catalog', 'Link URL'),
            'image' => Yii::t('catalog', 'Image'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['title', 'string', 'max' => 100],
            ['alias', 'string', 'max' => 200],
            ['alias', 'match', 'pattern' => '/^[a-z0-9\-_]*$/'],
            ['alias', 'unique', 'targetClass' => Vendor::className(), 'when' => function ($model, $attribute) {
                $object = Vendor::findOne($this->_id);
                return $object === null || $object->alias != $this->alias;
            }],
            ['description', 'string', 'max' => 3000],
            ['link', 'string', 'max' => 200],
            ['image', 'string'],
            [['title', 'alias'], 'required'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function map()
    {
        return [
            [['title', 'alias', 'description', 'link', 'image'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function assignFrom($object, $attributeNames = null)
    {
        parent::assignFrom($object, $attributeNames);

        $this->_id = $object->id;
    }
}
