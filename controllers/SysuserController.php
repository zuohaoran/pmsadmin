<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SysuserController extends Controller
{
	public function beforeAction($action)
	{
		if(!(isset($_SESSION['userid']) && $_SESSION['userid'] != null))
		{
			return $this->redirect(['site/login']);
		}
		if($_SESSION['role'] != 1)
		{
			throw new NotFoundHttpException("没有权限");
			
		}
		return true;
	}

	public function actionIndex()
	{
		$query = new \yii\db\Query();
		$userList = $query->select("id,username,role")->from("pms_user")->all();

		if(isset($_GET['lang']) && $_GET['lang'] == 'en')
		{
			return $this->render("index_en",['userList' => $userList]);
		}
		return $this->render("index",['userList' => $userList]);
	}

	public function actionCreate()
	{
		if(isset($_GET['lang']) && $_GET['lang'] == 'en')
		{
			return $this->render("create_en");
		}
		return $this->render("create");
	}

	public function actionAdd()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];

		$connection = Yii::$app->db;
		$connection->createCommand()->insert("pms_user",['username' => $username,'password' => md5($password),'role'=> $role])->execute();
		
		if(isset($_GET['lang']) && $_GET['lang'] == 'en')
		{
			return $this->redirect(["index",'lang'=>'en']);
		}
		return $this->redirect(["index"]);
	}

	public function actionUsercheck()
	{
		$username = $_GET['username'];
		$connection = Yii::$app->db;
		$query = $connection->createCommand("SELECT id FROM pms_user WHERE username='$username'")->queryOne();

		if($query){
			return 0;
		}
		else
		{
			return 1;
		}
	}

	public function actionDelete()
	{
		$id = $_POST['id'];

		$connection = Yii::$app->db;
		$connection->createCommand()->delete("pms_user",['id' => $id])->execute();
		//return $this->redirect(["index"]);
	}

	public function actionUpdate()
	{
		$id = $_GET['id'];

		$query = new \yii\db\Query();
		$user = $query->select("id,role,username")->from("pms_user")->where(['id' => $id])->one();
			
		if(isset($_GET['lang']) && $_GET['lang'] == 'en')
		{
			return $this->render('update_en',['user' => $user]);
		}
		return $this->render('update',['user' => $user]);
	}

	public function actionModify()
	{
		$id = $_POST['id'];
		$password = $_POST['password'];
		$role = $_POST['role'];

		$connection = Yii::$app->db;
		if(trim($password) == "")
		{
			$connection->createCommand()->update("pms_user",['role' => $role],['id' => $id])->execute();
		}
		else
		{
			$connection->createCommand()->update("pms_user",['role' => $role,'password'=>md5($password)],['id' => $id])->execute();
		}

		if(isset($_GET['lang']) && $_GET['lang'] == 'en')
		{
			return $this->redirect(["index",'lang'=>'en']);
		}

		return $this->redirect(['index']);
	}
}