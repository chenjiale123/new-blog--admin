<?php

   // include 'conn.php';
   
   // if(isset($_GET['id']) AND is_numeric($_GET['id']) AND $_GET['id']!=""){
   //    $result = mysqli_query($conn,'SELECT  FROM newnew WHERE id='.$_GET['id']);
   // }else{
   //    $result = mysqli_query($conn,'SELECT  id,title,registerTime,content  FROM newnew');
   // }
   
   // $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
   // echo json_encode($users);



$servername = "b-yqh4inlicl7rar.bch.rds.gz.baidubce.com";
$username = "b_yqh4inlicl7rar";
$password = "wty200911";
$dbname = "b_yqh4inlicl7rar";
 
// define("servername", $servername);
// define("username", $username);
// define("password", $password);
// define("dbname", $dbname);
 
// 创建连接
$conn=new mysqli($servername, $username, $password, $dbname);
// $conn = mysqli_connect(servername, username, password, dbname);
// mysqli_set_charset($conn,"utf8");
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} else{
 
}

$sql = "SELECT id,title,registerTime,content,zan,com FROM newnew";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
      $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
       echo  json_encode($users);
      //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 结果";
}


   ?>