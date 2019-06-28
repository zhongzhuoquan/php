<?php
error_reporting(0);
header('content-type:text/html;charset=utf-8;');
session_start();
$_SESSION['count']=$_POST['count'];
if(isset($_POST['add'])){
    if( $_SESSION['username']==null){

        echo "<script>alert('请登录后再加入购物车！！！');window.location.href='login_1.php'</script>";
    }else{
        $a=$_SESSION['username'];
        $b=$_SESSION['price'];
        $c=$_SESSION['name'];
        $d=$_SESSION['src'];
        $e=$_POST['count'];
        include('conn.php');

        $sql = "insert into  gouwuche  (username,bookname,money,count,src,qingkuang)values('$a','$c','$b','$e','$d','待付款')";
        $result=mysql_query($sql,$conn);
        echo "<script>alert('成功加入购物车！！！');window.location.href='gouwuche.php'</script>";
    }
}
if(isset($_POST['buy'])){
    if( $_SESSION['username']==null){

        echo "<script>alert('请登录后再购买！！！');window.location.href='login_1.php'</script>";
    }else{
       header("Location:myshop2.php");
    }
}
