<?php

namespace smart\catalog\backend\controllers;

use Yii;
use smart\base\BackendController;
use smart\catalog\backend\filters\CurrencyFilter;
use smart\catalog\backend\forms\CurrencyForm;
use smart\catalog\models\Currency;

// use yii\web\BadRequestHttpException;

class CurrencyController extends BackendController
{

    /**
     * List
     * @return string
     */
    public function actionIndex()
    {
        $model = new CurrencyFilter;
        $model->load(Yii::$app->getRequest()->get());

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Create
     * @return string
     */
    public function actionCreate()
    {
        $object = new Currency;
        $model = new CurrencyForm;

        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate()) {
            $model->assignTo($object);
            if ($object->save()) {
                Yii::$app->session->setFlash('success', Yii::t('cms', 'Changes saved successfully.'));
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Update
     * @param integer $id
     * @return string
     */
    public function actionUpdate($id)
    {
        $object = Currency::findOne($id);
        if ($object === null) {
            throw new BadRequestHttpException(Yii::t('cms', 'Item not found.'));
        }

        $model = new CurrencyForm;
        $model->assign($object);

        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate()) {
            $model->assignTo($object);
            if ($object->save()) {
                Yii::$app->session->setFlash('success', Yii::t('cms', 'Changes saved successfully.'));
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'object' => $object,
        ]);
    }

    // /**
    //  * Delete
    //  * @param integer $id
    //  * @return string
    //  */
    // public function actionDelete($id)
    // {
    //     $object = Currency::findOne($id);
    //     if ($object === null) {
    //         throw new BadRequestHttpException(Yii::t('cms', 'Item not found.'));
    //     }

    //     if ($object->delete()) {
    //         Yii::$app->session->setFlash('success', Yii::t('cms', 'Item deleted successfully.'));
    //     }

    //     return $this->redirect(['index']);
    // }

}
