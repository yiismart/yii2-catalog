<?php

namespace smart\catalog\backend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use smart\base\BackendController;
use smart\catalog\backend\filters\CarrierFilter;
use smart\catalog\backend\forms\CarrierForm;
use smart\catalog\models\Carrier;

class CarrierController extends BackendController
{
    /**
     * List
     * @return string
     */
    public function actionIndex()
    {
        $model = new CarrierFilter;
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
        $object = new Carrier;
        $model = new CarrierForm;

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
        $object = Carrier::findOne($id);
        if ($object === null) {
            throw new BadRequestHttpException(Yii::t('cms', 'Item not found.'));
        }

        $model = new CarrierForm;
        $model->assignFrom($object);

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

    /**
     * Delete
     * @param integer $id
     * @return string
     */
    public function actionDelete($id)
    {
        $object = Carrier::findOne($id);
        if ($object === null) {
            throw new BadRequestHttpException(Yii::t('cms', 'Item not found.'));
        }

        if ($object->delete()) {
            Yii::$app->storage->removeObject($object);
            Yii::$app->session->setFlash('success', Yii::t('cms', 'Item deleted successfully.'));
        }

        return $this->redirect(['index']);
    }
}
