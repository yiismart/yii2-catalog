<?php

namespace smart\catalog\backend;

use Yii;
use yii\helpers\Html;
use smart\base\BackendModule;
use smart\catalog\models\Category;

class Module extends BackendModule
{

    /**
     * @inheritdoc
     */
    public static function database()
    {
        parent::database();

        // Categories root
        if (Category::find()->roots()->count() == 0) {
            $root = new Category(['title' => 'Root']);
            $root->makeRoot();
        }
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

        $items['catalog'] = [
            'label' => '<i class="fas fa-shopping-cart"></i> ' . Html::encode(Yii::t('catalog', 'Catalog')),
            'encode' => false,
            'items' => [
                ['label' => Yii::t('catalog', 'Currencies'), 'url' => ['/catalog/currency/index']],
                ['label' => Yii::t('catalog', 'Vendors'), 'url' => ['/catalog/vendor/index']],
                ['label' => Yii::t('catalog', 'Categories'), 'url' => ['/catalog/category/index']],
                ['label' => Yii::t('catalog', 'Products'), 'url' => ['/catalog/product/index']],
            ],
        ];

        $items['catalog-store'] = [
            'label' => '<i class="fas fa-boxes"></i> ' . Html::encode(Yii::t('catalog', 'Stores')),
            'encode' => false,
            'items' => [
                ['label' => Yii::t('catalog', 'Stores'), 'url' => ['/catalog/store/index']],
                ['label' => Yii::t('catalog', 'Product quantity'), 'url' => ['/catalog/quantity/index']],
            ],
        ];

        $items['catalog-order'] = [
            'label' => '<i class="fas fa-file-invoice-dollar"></i> ' . Html::encode(Yii::t('catalog', 'Orders')),
            'encode' => false,
            'items' => [
                ['label' => Yii::t('catalog', 'Delivery methods'), 'url' => ['/catalog/delivery/index']],
                ['label' => Yii::t('catalog', 'Orders'), 'url' => ['/catalog/order/index']],
            ],
        ];
    }

}
