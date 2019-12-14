<?php

namespace smart\catalog\backend\forms;

use Yii;
use smart\base\Form;

class CarrierForm extends Form
{
    /**
     * @var string Title
     */
    public $name;

    /**
     * @var string Description
     */
    public $description;

    /**
     * @var string Image
     */
    public $image;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('catalog', 'Name'),
            'description' => Yii::t('catalog', 'Description'),
            'image' => Yii::t('catalog', 'Image'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['name', 'string', 'max' => 100],
            ['description', 'string', 'max' => 3000],
            ['image', 'string'],
            ['name', 'required'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function map()
    {
        return [
            [['name', 'description', 'image'], 'string'],
        ];
    }
}
