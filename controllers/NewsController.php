<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
	public function beforeAction($action)
	{
		if(!(isset($_SESSION['userid']) && $_SESSION['userid'] != null))
		{
			return $this->redirect(['site/login']);
		}
		
		return true;
	}

	public function actionIndex()
	{
		$query = new \yii\db\Query();
		$newsList = $query->select("*")->from("pms_news")->all();

		return $this->render("index",['newsList' => $newsList]);
	}

	public function actionCreate()
	{

		return $this->render("create");
	}

	public function actionAdd()
	{
		$connection = Yii::$app->db;
		$data = $_POST;
		$data['publish_date'] = date("Y-m-d H:i:s");
        $data['read_status']='未读取状态';
		$connection->createCommand()->insert("pms_news",$data)->execute();


		return $this->redirect(["index"]);
	}

	public function actionDelete()
	{
		$id = $_POST['id'];

		$connection = Yii::$app->db;
		$connection->createCommand()->delete("pms_news",['id' => $id])->execute();
		//return $this->redirect(["index"]);
	}

	public function actionUpdate()
	{
		$id = $_GET['id'];

		$query = new \yii\db\Query();
		$news = $query->select("*")->from("pms_news")->where(['id' => $id])->one();


		return $this->render('update',['news' => $news]);
	}

	public function actionModify()
	{
		$id = $_POST['id'];
		$data = $_POST;
		unset($data['id']);

		$data['publish_date'] = date("Y-m-d H:i:s");

		$connection = Yii::$app->db;
		$connection->createCommand()->update("pms_news",$data,['id' => $id])->execute();



		return $this->redirect(['index']);
	}

	public function actionDetail()
	{
		$id = $_GET['id'];

		$query = new \yii\db\Query();
		$news = $query->select("*")->from("pms_news")->where(['id' => $id])->one();

        if($news['read_status']=='未读取状态')
        {
            $news['read_status']='已读取';
            $query->createCommand()->update("pms_news",$news,['id' => $id])->execute();

        }

		return $this->render("detail",['news' => $news]);
	}


}