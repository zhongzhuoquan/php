<?php
header('content-type:text/html;charset=utf-8;');
error_reporting(0);
session_start();
if($_SESSION['username']==null){
    echo"<script>alert('请登录后再查看');window.location.href='login_1.php';</script>";
}