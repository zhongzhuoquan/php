<?php
header('content-type:text/html;charset=utf-8;');
$a=$_GET['id'];
$link=@mysql_connect('localhost','root','');
mysql_select_db('phpdb');
mysql_query('set names utf8');
$sql ="delete from talk where id='".$a."'";
$result=mysql_query($sql,$link);
echo"<script>alert('删除成功!!!');window.location.href='talk.php'</script>"
?>