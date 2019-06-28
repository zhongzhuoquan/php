<?php

include('conn.php');
if (isset($_POST['submit'])){
    session_start();
    if($_POST['password']==null){
        echo "<script>alert('密码不能为空！');window.location.href='register.php';</script>";
    }else{
    if($_SESSION["verification"]!=$_POST['check']){
        echo"<script>alert('验证码不正确');window.location.href='register.php';</script>";
    }
    if ($_POST['password'] != $_POST['password2']){
        echo "<script>alert('两次输入密码不一致！');window.location.href='register.php';</script>";
    }else {
        $name=$_POST['password'];
        $query = "insert into host (name,password,email) values('{$_POST['name']}','{$_POST['password']}','{$_POST['email']}')";
        $result = mysql_query($query, $conn);

        echo "<script>alert('注册成功！');window.location.href='test.php';</script>";
    }

}}
?>