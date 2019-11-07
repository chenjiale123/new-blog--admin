<?php
  include 'conn.php';
  $valid = true;
  $message = '';
  
        // if (!$_COOKIE["username"]){
        //     echo json_encode(
        //     array('vaild' => false,'isLogin' =>'您未登陆'),JSON_UNESCAPED_UNICODE
        //     );
        //    exit();
        // }


            // if(isset($_POST['userId']) && $_POST['userId']!=""){
            //     $userId = $_POST['userId'];
            // }else{
            //     $valid = false;
            //     $message = '您的登陆信息失效,请重新登陆';
                
            // }
            
            if(isset($_POST['name']) && $_POST['name']!=""){
                $name = $_POST['name'];
            }else{
                $valid = false;
                $message = '姓名不能为空';
            }
                
            if(isset($_POST['text']) && $_POST['text']!=""){
                $text = stripslashes($_POST['text']);
            }else{
                $valid = false;
                $message = '聊天内容不能为空';
            }       

            if(isset($_POST['phone']) && $_POST['phone']!=""){
                $phone = stripslashes($_POST['phone']);
            }else{
                $valid = false;
                $message = '手机号不能为空';
            } 

            if(isset($_POST['email']) && $_POST['email']!=""){
                $email = stripslashes($_POST['email']);
            }else{
                $valid = false;
                $message = '邮箱不能为空';
            } 

            if($valid){


                $sql = "INSERT INTO comm(name,text,phone,email)VALUES('$name','$text','$phone','$email')";

                if(mysqli_query($conn,$sql)){
                   $message = '信息发布成功';
                }else{
                   $valid = false;
                   $message = '信息发布失败';
                }


            }

  
  echo json_encode(
    array('valid'=>$valid,'message'=>$message),JSON_UNESCAPED_UNICODE
);