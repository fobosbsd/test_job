<?php

namespace backend\modules\settings\controllers;

use Yii,
    yii\web\Controller,
    yii\web\NotFoundHttpException,
    yii\filters\VerbFilter,
    yii\filters\AccessControl;
use common\models\Settings,
    common\models\search\SettingSearch;

/**
 * IndexController implements the CRUD actions for Settings model.
 */
class IndexController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'ajax-pname', 'ajax-pvalue'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'ajax-pname' => ['POST'],
                    'ajax-pvalue' => ['POST']
                ],
            ],
        ];
    }

    /**
     * Lists all Settings models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Settings model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Settings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Settings();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->parameters->updateCache();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Settings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->parameters->updateCache();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Settings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        Yii::$app->parameters->updateCache();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Settings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Settings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Settings::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }

    // Change p_name in settings
    public function actionAjaxPname() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $response = [
            'output' => '',
            'message' => ''
        ];

        if (!$request->validateCsrfToken()) {
            $response = [
                'output' => '',
                'message' => 'Error CSFR'
            ];

            return $response;
        }

        if ($request->post() && $request->isAjax) {
            $post = $request->post();

            $id = (int) $post['Settings']['id'];
            foreach ($post['Settings'] as $key => $val) {
                if ($key !== 'id') {
                    $p_name = $post['Settings'][$key]['p_name'];
                }
            }

            $model = $this->findModel($id);
            $model->p_name = $p_name;
            $model->update();
            
            Yii::$app->parameters->updateCache();

            $response = [
                'output' => $model->p_name,
                'message' => ''
            ];
        }

        return $response;
    }

    // Change p_value in settings
    public function actionAjaxPvalue() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $response = [
            'output' => '',
            'message' => ''
        ];

        if (!$request->validateCsrfToken()) {
            $response = [
                'output' => '',
                'message' => 'Error CSFR'
            ];

            return $response;
        }

        if ($request->post() && $request->isAjax) {
            $post = $request->post();

            $id = (int) $post['Settings']['id'];
            foreach ($post['Settings'] as $key => $val) {
                if ($key !== 'id') {
                    $p_value = $post['Settings'][$key]['p_value'];
                }
            }

            $model = $this->findModel($id);
            $model->p_value = $p_value;
            $model->update();
            
            Yii::$app->parameters->updateCache();

            $response = [
                'output' => $model->p_value,
                'message' => ''
            ];
        }

        return $response;
    }

}
