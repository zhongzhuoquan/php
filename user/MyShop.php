<?php
session_start();
$name=$_SESSION['username'];
if(isset($_POST['jiesuan'])){
    @date_default_timezone_set("PRC");
//订购日期

    $order_date = date('Y-m-d');

//订单号码主体（YYYYMMDDHHIISSNNNNNNNN）

    $order_id_main = date('YmdHis') . rand(10000000,99999999);

//订单号码主体长度

    $order_id_len = strlen($order_id_main);

    $order_id_sum = 0;

    for($i=0; $i<$order_id_len; $i++){

        $order_id_sum += (int)(substr($order_id_main,$i,1));

    }
    $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
   include('conn.php');
    $sql = "update gouwuche  set qingkuang='已付款' where qingkuang='待付款'AND username='".$name."'";
    $result=mysql_query($sql,$conn);
    $sql2="update gouwuche  set huodanhao='$order_id' where username='".$name."'and huodanhao IS  NULL";
    $result2=mysql_query($sql2,$conn);
    header("Location:shop.php");
}