<?php
include 'conn.php';
$valid   = true;
$message = '';
if(isset($_POST['send']) && $_POST['send']==1){

     if (isset($_POST['email']) && $_POST['email']!="") {
           $email = $_POST['email'];
           $regexp = "/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/";

          if (!preg_match($regexp,$email)){
             $message = "请输入正确邮箱";
             $valid   = false;
            }

      }else{
        $message = "用户名帐号不合法";
        $valid   = false;
      }
        
      if (isset($_POST['password']) && $_POST['password']!="") {
          $password = $_POST['password'];
        
      }else{
        $message = '密码不能为空';
        $valid   = false;
      }


     if ($valid) {
         
         $sql = "SELECT * From user WHERE email = '$email' &&  password='$password'";
         $result = mysqli_query($conn,$sql); 
      
         $row = $result->fetch_assoc();
        if(mysqli_num_rows($result) == 1 ){
                
       
                $expire=time()+60*60*24*7;
                $_SESSION['email']=$row['email'];
                setcookie("email",$row['email'],$expire,"/");
                setcookie("name", $row['name'],$expire,"/");
                // setcookie("level", $row['Level'],$expire,"/");
                $message = '登陆成功';

          }else{
              $message =  "帐号或密码不正确";
              $valid   = false;
          }

     }else{
              $message =  $message;
              $valid   = false;
     } 

}else{
  $valid   = false;
  $message = '接口调用失败';
}


echo json_encode(
     array('valid' => $valid, 'message' => $message,"user" => $row['id'],'name'=> $row['name'],'image'=> $row['image']),JSON_UNESCAPED_UNICODE
); 

?> 