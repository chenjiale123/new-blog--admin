<?php
	include 'conn.php';
	$valid = true;
	$message = 1;
    // 标题
  
	if(isset($_POST['name']) && $_POST['name']!=""){
		$name = $_POST['name'];
	}else{
		$valid = false;
		$message = '姓名内容不能为空';
	}
	

	
    // 数据库插入数据
    if(isset($_POST['text']) && $_POST['text']!=""){
		$text = ($_POST['text']);
	}else{
		$valid = false;
		$message = '留言内容不能为空';
    }

	if($valid){
		$sql = "INSERT INTO  comm (name,text) VALUES ('$name','$text')";
		if(mysqli_query($conn,$sql)) {
			$message = "留言添加成功";
		}else{
			$valid = false;
			$message = "留言添加失败".$sql;
		}
	}
	echo json_encode(array('valid'=>$valid,'message'=>$message),JSON_UNESCAPED_UNICODE);
?>