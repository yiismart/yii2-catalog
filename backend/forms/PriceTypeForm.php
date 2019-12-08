<?php

namespace smart\catalog\backend\forms;

use Yii;
use smart\base\Form;

class PriceTypeForm extends Form
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var boolean
     */
    public $discountsEnabled;

    /**
     * @var boolean
     */
    public $couponsEnabled;

    /**
     * @var boolean
     */
    public $default;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('catalog', 'Name'),
            'discountsEnabled' => Yii::t('catalog', 'Enable discounts'),
            'couponsEnabled' => Yii::t('catalog', 'Enable coupons'),
            'default' => Yii::t('catalog', 'Default'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['name', 'string', 'max' => 100],
            [['discountsEnabled', 'couponsEnabled', 'default'], 'boolean'],
            ['name', 'required'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function map()
    {
        return [
            ['name', 'string', 'allowNull' => false],
            [['discountsEnabled', 'couponsEnabled', 'default'], 'boolean'],
        ];
    }
}
