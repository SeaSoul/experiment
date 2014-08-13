<?php

namespace app\controllers;

use Yii;
use app\models\Experement;
use app\models\search\ExperementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

/**
 * ExperementController implements the CRUD actions for Experement model.
 */
class ExperementController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
            ],
                ],
        ];
    }

    /**
     * Lists all Experement models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ExperementSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
    }

    /**
     * Displays a single Experement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        if (!($id == "start")) {
            $model = $this->findModel($id);
            $resultsProvider = new ActiveDataProvider([
                        'query' => \app\models\Results::find()->where(['id_exp' => $model->id_exp]),
                        'pagination' => [
                            'pageSize' => 11,
                            ],
                    ]);
            return $this->render('view', [
                        'model' => $model,
                        'resultsProvider' => $resultsProvider,
                    ]);
        }
        else {
            $connection = \Yii::$app->db;
            $modelResults = $connection->createCommand("SELECT * FROM `experement`")->queryAll();
            $resultsProvider2 = new ArrayDataProvider([
                        'allModels' => $modelResults,
                        'sort' => [
                            'attributes' => ['num','count'],
                            ],
                        'pagination' => [
                            'pageSize' => 22,
                            ],
                    ]);
            return $this->render('viewShowResults', [
                        'resultsProvider' => $resultsProvider2,
                    ]);
        }
    }

    /**
     * Creates a new Experement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Experement;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $results = new \app\models\Results();
                $results->createResults($model->id_exp, $model->throws);
                return $this->redirect(['view', 'id' => $model->id_exp]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
                    ]);
        }
    }

    public function actionShowResults() {
        return $this->redirect(['index']);
    }

    /**
     * Updates an existing Experement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_exp]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                    ]);
        }
    }

    /**
     * Deletes an existing Experement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Experement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Experement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Experement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
