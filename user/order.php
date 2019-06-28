<?php
session_start();
$a=$_SESSION['username'];
$b=$_SESSION['price'];
$c=$_SESSION['name'];
$d=$_SESSION['src'];
$e=$_SESSION['count'];
$f=$_SESSION['order_id'];
include('conn.php');

$sql = "insert into  gouwuche  (username,bookname,money,count,src,qingkuang,huodanhao)values('$a','$c','$b','$e','$d','已付款','$f')";
$result=mysql_query($sql,$conn);
echo "<script>alert('购买成功！！！');window.location.href='shop.php'</script>";