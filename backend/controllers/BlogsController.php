<?php

namespace backend\controllers;

use common\models\Blogs;
use backend\models\BlogsSearch;
use Yii;
use yii\base\Security;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BlogsController implements the CRUD actions for Blogs model.
 */
class BlogsController extends DefaultController
{


    /**
     * Lists all Blogs models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlogsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blogs model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Blogs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Blogs();
        $model->scenario = Blogs::CREATED_BLOG;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $rasm = UploadedFile::getInstance($model,'img');
                $random = new Security();
                $nomi = $random->generateRandomString(32).".".$rasm->extension;
                $rasm->saveAs("images/blogs/".$nomi);
                $model->img = $nomi;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Blogs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Blogs::UPDATED_BLOG;

        $nomi = $model->img; 
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $rasm = UploadedFile::getInstance($model,'img');
                if($rasm){
                    unlink("images/blogs/".$nomi);
                    $random = new Security();
                    $nomi = $random->generateRandomString(32).".".$rasm->extension;
                    $rasm->saveAs("images/blogs/".$nomi);
                }
                $model->img = $nomi;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Blogs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Blogs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Blogs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blogs::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // public function send(){
    //     echo "salom";
    // return Yii::$app->response->xSendFile('/home/user/Pictures/picture1.jpg');

    // }



}
