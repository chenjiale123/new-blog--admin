<?php
	include 'conn.php';
	$valid = true;
	// $message = 1;
    // 标题


       
$id = $_POST['id'];
 


        $query = "UPDATE newnew SET zan = zan + 1 WHERE id = '$id'";

        if(mysqli_query($conn,$query)) {
            $message = "点赞成功";
        }else{
            $valid = false;
            $message = "点赞失败".$sql;
        }
     
    

	echo json_encode(array('message'=>$message),JSON_UNESCAPED_UNICODE);
?>