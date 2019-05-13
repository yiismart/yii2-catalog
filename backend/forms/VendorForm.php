<?php

namespace smart\catalog\backend\forms;

use Yii;
use dkhlystov\helpers\Translit;
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
    public $url;

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
            'url' => Yii::t('catalog', 'Friendly URL'),
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
            ['url', 'string', 'max' => 200],
            ['url', 'match', 'pattern' => '/^[a-z0-9\-_]*$/'],
            ['url', 'unique', 'targetClass' => Vendor::className(), 'when' => function ($model, $attribute) {
                $object = Vendor::findOne($this->_id);
                return $object === null || $object->url != $this->url;
            }],
            ['description', 'string', 'max' => 3000],
            ['link', 'string', 'max' => 200],
            ['image', 'string'],
            [['title', 'url'], 'required'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function assignFrom($object)
    {
        $this->title = self::fromString($object->title);
        $this->url = self::fromString($object->url);
        $this->description = self::fromString($object->description);
        $this->link = self::fromString($object->link);
        $this->image = self::fromString($object->image);

        $this->_id = $object->id;

        Yii::$app->storage->cacheObject($object);
    }

    /**
     * @inheritdoc
     */
    public function assignTo($object)
    {
        $object->title = self::toString($this->title);
        $object->url =self::toString($this->url);
        $object->description = self::toString($this->description);
        $object->link = self::toString($this->link);
        $object->image = self::toString($this->image);

        Yii::$app->storage->storeObject($object);
    }
}
