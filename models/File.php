<?php
namespace app\models;

use Yii;
use yii\web\NotFoundHttpException;

class File
{
	/*
	* 存储文件目录
	*/
	public static $saveDir = "../../upload/photos/" ;
	public static $awardDir = "../../upload/award/" ;
	
	public static function savePhoto($file)
	{
		$connection = Yii::$app->db;
	    
		$name = $file['name'];
		$filetype = $file['type'];
		if($filetype == 'image/jpeg'){  
	    	$type = '.jpg';  
	    }
	    elseif($filetype == 'image/png'){  
	    	$type = '.png';  
	    }  
	    elseif($filetype == 'image/gif'){  
	    	$type = '.gif';  
	    }
	    else
	    {
	    	throw new NotFoundHttpException("上传的文件格式不对");
	    }

		//$folderName = date("Ymd");
		$saveName = date("YmdHis") . rand(1000,9999) . $type;

		if(!is_dir(self::$saveDir))
		{
			mkdir(self::$saveDir , 0777, true); 
		}

		$path = self::$saveDir .$saveName;
		if(move_uploaded_file($file['tmp_name'], $path))
		{
			return "upload/photos/".$saveName;
		}
		else
		{
			throw new NotFoundHttpException("文件保存失败");
		}
	}

	public static function saveAwardPic($file)
	{
	    
		$name = $file['name'];
		$filetype = $file['type'];
		if($filetype == 'image/jpeg'){  
	    	$type = '.jpg';  
	    }
	    elseif($filetype == 'image/png'){  
	    	$type = '.png';  
	    }  
	    elseif($filetype == 'image/gif'){  
	    	$type = '.gif';  
	    }
	    else
	    {
	    	throw new NotFoundHttpException("上传的文件格式不对");
	    }

		//$folderName = date("Ymd");
		$saveName = date("YmdHis") . rand(1000,9999) . $type;

		if(!is_dir(self::$awardDir))
		{
			mkdir(self::$awardDir , 0777, true); 
		}

		$path = self::$awardDir .$saveName;
		if(move_uploaded_file($file['tmp_name'], $path))
		{
			return "upload/award/".$saveName;
		}
		else
		{
			throw new NotFoundHttpException("文件保存失败");
		}
	}

	public static function delAttachment($id)
	{
		$connection = Yii::$app->db;
		$file = $connection->createCommand("SELECT filepath FROM tbl_attachment WHERE id = $id")->queryOne();
		if($file)
		{
			$filepath = "../../".$file['filepath'];
			if(is_file($filepath))
				unlink($filepath);
		}
	}

}

?>