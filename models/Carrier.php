<?php
namespace smart\catalog\models;

use smart\db\ActiveRecord;
use smart\storage\components\StoredInterface;

class Carrier extends ActiveRecord implements StoredInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_carrier';
    }

    /**
     * @inheritdoc
     * @see smart\storage\components\StoredInterface
     */
    public function getOldFiles()
    {
        $files = [];
        if (!empty($file = $this->getOldAttribute('image'))) {
            $files[] = $file;
        }

        return $files;
    }

    /**
     * @inheritdoc
     * @see smart\storage\components\StoredInterface
     */
    public function getFiles()
    {
        $files = [];
        if (!empty($file = $this->getAttribute('image'))) {
            $files[] = $file;
        }

        return $files;
    }

    /**
     * @inheritdoc
     * @see smart\storage\components\StoredInterface
     */
    public function setFiles($files)
    {
        if (array_key_exists($this->image, $files)) {
            $this->image = $files[$this->image];
        }
    }
}
