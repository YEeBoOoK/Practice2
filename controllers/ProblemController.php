<?php

namespace app\controllers;

use app\models\Problem;
use app\models\ProblemCancelForm;
use app\models\ProblemSearch;
use app\models\ProblemSolveForm;
use Yii;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProblemController implements the CRUD actions for Problem model.
 */
class ProblemController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Problem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProblemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Problem model.
     * @param int $id_problem Id Problem
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_problem)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_problem),
        ]);
    }

    /**
     * Creates a new Problem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Problem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_problem' => $model->id_problem]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Problem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_problem Id Problem
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_problem)
    {
        $model = $this->findModel($id_problem);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_problem' => $model->id_problem]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }




    public function actionCancel($id_problem)
    {
        $model = ProblemCancelForm::findOne($id_problem);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->status = 'Отклонена';
            $model->save();

            return $this->redirect(['index']);
        }

        return $this->render('cancel', [
            'model' => $model,
        ]);
    }




    public function actionSolve($id_problem)
    {
        $model = ProblemSolveForm::findOne($id_problem);
        $time = time();
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->photoAfter = UploadedFile::getInstance($model, 'photoAfter');
                $model->photoAfter->saveAs('web/uploads/' . $model->photoAfter->baseName .$time. '.' . $model->photoAfter->extension);
                $file_name = ($model->photoAfter->baseName . $time . '.' . $model->photoAfter->extension);
                $model->photoAfter = $file_name;
                $model->status = 'Решена';
                $model->date = new Expression('NOW()'); 
                $model->save();
                return $this->redirect('/problem');
            }
        
        } else {
            $model->loadDefaultValues();
        }
        
        return $this->render('solve', [
            'model' => $model,
        ]);
    }
    



    /**
     * Deletes an existing Problem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_problem Id Problem
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_problem)
    {
        $this->findModel($id_problem)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Problem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_problem Id Problem
     * @return Problem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_problem)
    {
        if (($model = Problem::findOne(['id_problem' => $id_problem])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
