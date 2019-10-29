<?php

namespace smart\catalog\backend;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use smart\base\BackendModule;
// use smart\catalog\models\Category;

class Module extends BackendModule
{
    /**
     * @var integer|null
     */
    // public $maxCategoryDepth = null;

    /**
     * @var boolean
     */
    // public $propertiesEnabled = true;

    /**
     * Getter for maxCategoryDepth property
     * @return integer|null
     */
    // public static function getMaxCategoryDepth()
    // {
    //     return ArrayHelper::getValue(self::getInstance(), 'maxCategoryDepth', null);
    // }

    /**
     * Getter for propertiesEnabled property
     * @return boolean
     */
    // public static function getPropertiesEnabled()
    // {
    //     return ArrayHelper::getValue(self::getInstance(), 'propertiesEnabled', false);
    // }

    /**
     * @inheritdoc
     */
    public static function database()
    {
        parent::database();

        // Categories root
        // if (Category::find()->roots()->count() == 0) {
        //     $root = new Category(['name' => 'Root']);
        //     $root->makeRoot();
        // }
    }

    /**
     * @inheritdoc
     */
    public static function security()
    {
        $auth = Yii::$app->getAuthManager();
        if ($auth->getRole('Catalog') === null) {
            $role = $auth->createRole('Catalog');
            $auth->add($role);
        }
    }

    /**
     * @inheritdoc
     */
    public function menu(&$items)
    {
        if (!Yii::$app->user->can('Catalog')) {
            return;
        }

        // $items['catalog-customer'] = [
        //     'label' => '<i class="fas fa-user-friends"></i> ' . Html::encode(Yii::t('catalog', 'Customers')),
        //     'encode' => false,
        //     'url' => ['/catalog/customer/index'],
        // ];

        $items['catalog'] = [
            'label' => '<i class="fas fa-shopping-cart"></i> ' . Html::encode(Yii::t('catalog', 'Catalog')),
            'encode' => false,
            'items' => [
                ['label' => Yii::t('catalog', 'Currencies'), 'url' => ['/catalog/currency/index']],
                ['label' => Yii::t('catalog', 'Vendors'), 'url' => ['/catalog/vendor/index']],
                // ['label' => Yii::t('catalog', 'Categories'), 'url' => ['/catalog/category/index']],
                // ['label' => Yii::t('catalog', 'Products'), 'url' => ['/catalog/product/index']],
            ],
        ];

        // $items['catalog-store'] = [
        //     'label' => '<i class="fas fa-boxes"></i> ' . Html::encode(Yii::t('catalog', 'Stores')),
        //     'encode' => false,
        //     'items' => [
        //         ['label' => Yii::t('catalog', 'Stores'), 'url' => ['/catalog/store/index']],
        //         ['label' => Yii::t('catalog', 'Product quantity'), 'url' => ['/catalog/quantity/index']],
        //     ],
        // ];

        // $items['catalog-order'] = [
        //     'label' => '<i class="fas fa-file-invoice-dollar"></i> ' . Html::encode(Yii::t('catalog', 'Orders')),
        //     'encode' => false,
        //     'items' => [
        //         ['label' => Yii::t('catalog', 'Delivery methods'), 'url' => ['/catalog/delivery/index']],
        //         ['label' => Yii::t('catalog', 'Orders'), 'url' => ['/catalog/order/index']],
        //     ],
        // ];
    }
}
