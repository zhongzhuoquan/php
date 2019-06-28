<?php
$id=$_GET['id'];
include('conn.php');
$sql="delete from gouwuche where id='".$id."'";
$result=mysql_query($sql,$conn);
header("location:gouwuche.php")
?>