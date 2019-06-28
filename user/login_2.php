<?php


header('content-type:text/html;charset=utf-8;');

if (isset($_POST['submit'])){
    session_start();
    if($_SESSION["verification"]!=$_POST['check']){
        echo"<script>alert('验证码不正确');window.location.href='login_1.php';</script>";
    }else{
        include('conn.php');
    $query = "select * from host where name = '{$_POST['name']}' and password = '{$_POST['password']}'";
    $result = mysql_query( $query,$conn);
    if (mysql_num_rows($result) == 1) {

        echo "<script>alert('登录成功！');window.location.href='loginOK.php';</script>";
        $_SESSION['username']=$_POST['name'];
    }else{
        echo "<script>alert('登录失败！');window.location.href='login_1.php';</script>";
    }

    }}
?>