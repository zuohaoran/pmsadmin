<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function beforeAction($action)
    {
        if($action->id == "index" || $action->id == "logout")
        {
            if(!(isset($_SESSION['userid']) && $_SESSION['userid'] != null))
            {
                return $this->redirect(['login']);
            }
        }

        if($action->id == "login" || $action->id == "dologin")
        {
            if(isset($_SESSION['userid']) && $_SESSION['userid'] != null)
            {
                return $this->redirect(['index']);
            }
        }
        
        return true;
    }    

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionLogin()
    {
        $msg = '';

        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
        }


        return $this->render("login",['msg'=>$msg]);
    }

    public function actionDologin()
    {
        $username = $_POST['username'];
        $connection = Yii::$app->db;
        $user = $connection->createCommand("SELECT * FROM pms_user WHERE username='$username'")->queryOne();
        
        if($user && $user['password'] == ($_POST['password']))
        {
            $_SESSION['userid'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];


            return $this->redirect(['index']);
        }
        else
        {

            return $this->redirect(['login','msg'=>'用户名或密码错误']);
        }
    }

    public function actionLogout()
    {
        unset($_SESSION['userid']);
        unset($_SESSION['role']);
        unset($_SESSION['username']);
        //var_dump($_SESSION);die();

        return $this->redirect(['login']);

    }

}