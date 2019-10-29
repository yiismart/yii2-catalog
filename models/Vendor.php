<?php
namespace smart\catalog\models;

use yii\helpers\Url;
use smart\db\ActiveRecord;
use smart\sitemap\behaviors\SitemapBehavior;
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
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'sitemap' => [
                'class' => SitemapBehavior::className(),
                'loc' => function($model) {
                    return Url::toRoute(['/catalog/vendor/index', 'alias' => $model->alias]);
                },
            ],
        ];
    }

    /**
     * Products relation
     * @return yii\db\ActiveQueryInterface
     */
    // public function getProducts()
    // {
    //     return $this->hasMany(Product::className(), ['vendor_id' => 'id'])->inverseOf('vendor');
    // }

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
