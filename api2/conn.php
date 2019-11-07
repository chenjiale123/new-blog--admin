
<?php
$servername = "b-yqh4inlicl7rar.bch.rds.gz.baidubce.com";
$username = "b_yqh4inlicl7rar";
$password = "wty200911";
$dbname = "b_yqh4inlicl7rar";
 

 
// 创建连接
$conn=new mysqli($servername, $username, $password, $dbname);

 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} else{

}
?>