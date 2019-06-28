<?php
error_reporting(0);
session_start();
include('conn.php');
if($_SESSION['username']!=null){
   if($_POST['password1']==$_POST['password2']){
       $a=$_SESSION['username'];
$sqlstr = "update host set  password = '".$_POST['password2']."', email = '".$_POST['email']."'where name='".$a."'";
$arry=mysql_query($sqlstr,$conn);
    echo"<script>alert('提交成功');window.location.href='loginOK.php';</script>";}

   else{
       echo"<script>alert('密码不一致');window.location.href='userInfo.php';</script>";}
   }

else{
    echo"<script>alert('请登陆后再修改');window.location.href='login_1.php';</script>";

}