<?php
include('conn.php');
$sql ="delete from book where id='".$_GET['id']."'";
$arry=mysql_query($sql,$conn);
if($arry){
    echo "<script> alert('删除成功');location='book_admin2.php';</script>";
}
else
    echo "删除失败";
?>