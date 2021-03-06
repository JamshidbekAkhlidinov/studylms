<?php

namespace backend\controllers;

use backend\models\User as ModelsUser;
use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends DefaultController  
{
    

   
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
              if(Yii::$app->user->can('admin')){
                return $this->goHome();
            }
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ( $model->load(Yii::$app->request->post())  && $model->login() ) {
            
            if(!Yii::$app->user->can('admin')){
                $model->password = '';
                Yii::$app->user->logout();
            }
            return $this->goBack();
        }


        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionStatus($id)
    {
        $model = User::findOne($id);
        if($model->status==9){
            $model->status = 10;
        }else{
            $model->status = 9;
        }
        $model->save();
       return $this->redirect(Yii::$app->request->referrer);
    }


}
