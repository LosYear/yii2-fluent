<?php

namespace yii\fluent\modules\admin\controllers;

use Yii;
use yii\fluent\models\Menu;
use yii\fluent\models\MenuItem;
use yii\fluent\modules\admin\models\MenuSearch;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends AdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $rules = [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];

        return array_merge(parent::behaviors(), $rules);
    }

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all items
     * @return mixed
     */

    public function actionItems($id){
        $menu = $this->findModel($id);
        $items = $this->generateItemsTree($id);

        return $this->render('items', [
            'items' => $items,
            'menu' => $menu
        ]);
    }

    /**
     * Creates a new item
     * @return mixed
     */
    public function actionCreateItem($menu_id){
        $menu = $this->findModel($menu_id);
        $items = $menu->items;

        $model = new MenuItem();
        $model->menu_id = $menu_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['items', 'id' => $menu->id]);
        } else {
            return $this->render('create_item', [
                'items' => $items,
                'menu' => $menu,
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing item.
     * If update is successful, the browser will be redirected to the 'items' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateItem($id)
    {
        $model = MenuItem::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['items', 'id' => $model->menu_id]);
        } else {
            return $this->render('update_item', [
                'model' => $model,
                'menu' => $model->menu
            ]);
        }
    }

    /**
     * Deletes an existing MenuItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteItem($id)
    {
        $item = MenuItem::findOne($id);
        $menu_id = $item->menu_id;
        $item->delete();

        return $this->redirect(['items', 'id' => $menu_id]);
    }


    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Menu model.
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
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Generates tree for menu with links
     * @param integer $menu_id
     * @return array
     */
    private function generateItemsTree($menu_id, $root = -1){
        $result = [];

        $items = MenuItem::find()->where(['root_id' => $root, 'menu_id' => $menu_id])->orderBy('order')->all();

        foreach($items as $item){
            $result[] = ['label' => $item->title . ' ' . Html::a('<i class="fa fa-pencil"></i>', ['update-item', 'id' => $item->id]) . ' ' .
                Html::a('<i class="fa fa-trash"></i>', ['delete-item', 'id' => $item->id]), 'url' => ['update-item', 'id' => $item->id], 'items' => $this->generateItemsTree($menu_id, $item->id)];
        }

        return $result;
    }
}
