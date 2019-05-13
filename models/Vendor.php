<?php

namespace smart\catalog\models;

use yii\db\ActiveRecord;
use smart\storage\components\StoredInterface;

class Vendor extends ActiveRecord implements StoredInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_vendor';
    }

    /**
     * Return files from attributes
     * @param array $attributes 
     * @return array
     */
    private function getFilesFromAttributes($attributes)
    {
        $files = [];

        if (!empty($attributes['image'])) {
            $files[] = $attributes['image'];
        }

        return $files;
    }

    /**
     * @inheritdoc
     */
    public function getOldFiles()
    {
        return $this->getFilesFromAttributes($this->getOldAttributes());
    }

    /**
     * @inheritdoc
     */
    public function getFiles()
    {
        return $this->getFilesFromAttributes($this->getAttributes());
    }

    /**
     * @inheritdoc
     */
    public function setFiles($files)
    {
        if (array_key_exists($this->image, $files)) {
            $this->image = $files[$this->image];
        }
    }

}
