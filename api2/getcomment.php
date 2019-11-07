<?php
    //    if (!isset($_COOKIE["username"])){
    //     echo json_encode(
    //     array('vaild' => false,'isLogin' =>'您未登陆'),JSON_UNESCAPED_UNICODE
    //     );
    //    exit();
    // }
   include 'conn.php';
   $uid = $_POST['uid'];
   
 
      $result = mysqli_query($conn,"SELECT  id,uid,name,content FROM comment WHERE uid='$uid'");
   
   $users = mysqli_fetch_all($result,MYSQLI_ASSOC);

   echo json_encode($users);