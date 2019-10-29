<?php

namespace smart\catalog\backend\forms;

use Yii;
use smart\base\Form;

class CurrencyForm extends Form
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $code;

    /**
     * @var float
     */
    public $rate;

    /**
     * @var integer
     */
    public $precision = 0;

    /**
     * @var string
     */
    public $prefix;

    /**
     * @var string
     */
    public $suffix;

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
            'code' => Yii::t('catalog', 'Code'),
            'rate' => Yii::t('catalog', 'Rate'),
            'precision' => Yii::t('catalog', 'Precision'),
            'prefix' => Yii::t('catalog', 'Prefix'),
            'suffix' => Yii::t('catalog', 'Suffix'),
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
            [['code', 'prefix', 'suffix'], 'string', 'max' => 10],
            ['rate', 'double', 'min' => 0.01],
            ['precision', 'in', 'range' => [0, 1, 2]],
            ['default', 'boolean'],
            [['name', 'code', 'rate', 'precision'], 'required'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function map()
    {
        return [
            [['name', 'code', 'prefix', 'suffix'], 'string', 'allowNull' => false],
            ['rate', 'double'],
            ['precision', 'integer'],
            ['default', 'boolean'],
        ];
    }
}
