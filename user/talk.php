<?php
error_reporting(0);
header('content-type:text/html;charset=utf-8;');
session_start();
$a=$_SESSION['get'];
    if(isset($_POST['submit_talk2'])){
        if($_SESSION['username']!=null){
        $name=$_SESSION['username'];
        $talk=$_POST['talk'];
include('conn.php');
        $sql="insert into  talk  (book_id,name,talk)values('$a','$name','$talk')";
        $result=mysql_query($sql,$conn);
            echo "<script>alert('评论成功！！！');history.go(-1);</script>";
    }else{
            echo "<script>alert('请登录后再评论！！！');window.location.href='login_1.php'</script>";
    }
}