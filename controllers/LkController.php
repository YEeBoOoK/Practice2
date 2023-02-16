<?php

namespace app\controllers;

use app\models\User;
use app\models\Category;
use app\models\Problem;
use app\models\ProblemCreateForm;
use app\models\RegForm;
use app\models\UserSearch;
use app\models\ProblemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use Yii;
use yii\web\UploadedFile;


/**
 * UserController implements the CRUD actions for User model.
 */
class LkController extends Controller
{

    public function beforeAction($action)
    {
    // your custom code here, if you want the code to run before action filters,
    // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl

    if (Yii::$app->user->isGuest) {
        $this->redirect(['/site/login']);
        return false;
    }
    
    if (!parent::beforeAction($action)){
            return false;
    }

    // other custom code here
    return true; // or false to not run the action
}



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
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProblemSearch();
        $dataProvider = $searchModel->searchForUser(Yii::$app->request->queryParams, Yii::$app->user->identity->id_user);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id_user Id User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_user)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user),
        ]);
    }


    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_user Id User
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_user)
    {
        if($this->findModel($id_user)->status == 'Новая'){
            $this->findModel($id_user)->delete();
            Yii::$app->session->setFlash('success', 'Заявка успешно удалена');
        }
        else{
            Yii::$app->session->setFlash('danger', 'Заявка не может быть удалена, т.к. админ хочет, чтобы она осталась, не трогайте');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_user Id User
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user)
    {
        if (($model = Problem::findOne(['id_problem' => $id_user])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }




    public function actionCreate()
    {
        $model = new ProblemCreateForm();
        $id_user=Yii::$app->user->identity->id_user;
        $time = time();

        if ($this->request->isPost) {

            if ($model->load($this->request->post())) {
                $model->photoBefore = UploadedFile::getInstance($model, 'photoBefore');
                $model->photoBefore->saveAs('web/uploads/' . $model->photoBefore->baseName .'_'.$id_user.'_'.$time. '.' . $model->photoBefore->extension);
                $file_name = ($model->photoBefore->baseName . '_' . $id_user . '_' . $time . '.' . $model->photoBefore->extension);
                $model->photoBefore = $file_name;
                $model->user_id =$id_user;
                $model->save();
                return $this->redirect('/lk');
            }


        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


}
