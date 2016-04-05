<?php

namespace yii\fluent\modules\admin\controllers;

use Yii;
use yii\fluent\models\Setting;
use yii\fluent\modules\admin\models\SettingSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlockController implements the CRUD actions for Block model.
 */
class SettingsController extends AdminController
{
    /**
     * Lists all Settings
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new Block model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Setting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Simple update of settings
     */

    public function actionSimple($key = -1)
    {
        $settings_list = explode(',', Setting::get('quick_settings'));

        if($key != -1){
            $model = Setting::get($key);
            $model->load(Yii::$app->request->post());
            $model->save();
        }

        return $this->render('simple', [
            'settings' => Setting::find()->where(['key' => $settings_list])->all(),
        ]);
    }

    /**
     * Updates an existing Block model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Block model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Setting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Setting::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
