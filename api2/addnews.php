<?php
	include 'conn.php';
	$valid = true;
	$message = 1;
	// 标题
	if(isset($_POST['title']) && $_POST['title']!=""){
		$title = $_POST['title'];
	}else{
		$valid = false;
		$message = '标题不能为空';
	}
	

	
	if(isset($_POST['content']) && $_POST['content']!=""){
		$content = ($_POST['content']);
	}else{
		$valid = false;
		$message = '文章内容不能为空';
	}
	// 数据库插入数据
	$registerTime = date("Y-m-d H:i:s");
	if($valid){
		$sql = "INSERT INTO  newnew(title,registerTime,content)VALUES ('$title','$registerTime','$content')";
		if(mysqli_query($conn,$sql)) {
			$message = "新闻添加成功";
		}else{
			$valid = false;
			$message = "新闻添加失败".$sql;
		}
	}
	echo json_encode(array('valid'=>$valid,'message'=>$message),JSON_UNESCAPED_UNICODE);
?>