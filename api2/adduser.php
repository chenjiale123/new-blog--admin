<?php
	include 'conn.php';
	$valid = true;
	$message = 1;
    // 标题
  
	if(isset($_POST['email']) && $_POST['email']!=""){
		$email = $_POST['email'];
	}else{
		$valid = false;
		$message = '邮箱不能为空';
	}
	

	
	
    if(isset($_POST['password']) && $_POST['password']!=""){
		$password = ($_POST['password']);
	}else{
		$valid = false;
		$message = '密码内容不能为空';
    }
    if(isset($_POST['level']) && $_POST['level']!=""){
		$level = ($_POST['level']);
	}else{
		$valid = false;
		$message = '权限内容不能为空';
	}
    // 数据库插入数据
    if(isset($_POST['name']) && $_POST['name']!=""){
		$name = ($_POST['name']);
	}else{
		$valid = false;
		$message = '姓名内容不能为空';
    }

	if($valid){
		$sql = "INSERT INTO  user(email,password,level,name,image) VALUES ('$email','$password','$level','$name','$image')";
		if(mysqli_query($conn,$sql)) {
			$message = "用户添加成功";
		}else{
			$valid = false;
			$message = "用户添加失败".$sql;
		}
	}
	echo json_encode(array('valid'=>$valid,'message'=>$message),JSON_UNESCAPED_UNICODE);
?>