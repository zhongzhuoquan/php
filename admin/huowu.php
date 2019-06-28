<html>


<body>
<form action="" method="post">
<?php
$a=$_GET['huodanhao'];
header('content-type:text/html;charset=utf-8;');
$link=@mysql_connect('localhost','root','');
mysql_select_db('phpdb');
mysql_query('set names utf8');
$sql="select * from gouwuche where huodanhao='".$a."'";
$result=mysql_query($sql,$link);
?>
<table width="45%" height="42" border="0" align="center" cellpadding="0" cellspacing="0" class="bk">
    <tr><td>货单号:<?=$a?></td></tr>
    <tr><td>书名</td><td>图片</td><td>单价</td><td style="width: 50px;text-align: center;">数量</td></tr>
<?php
while ($row=mysql_fetch_array($result)) {
?>
<tr><td>《<?=$row['bookname']?>》</td><td><img src="<?=$row['src']?>"></td><td><?=$row['money']?></td><td style="width: 50px;text-align: center;"><?=$row['count']?></td></tr>
<?php
}?>
    <tr><td>
            <input type="submit" name="button" value="删除订单"></td></tr>
    </table>
    </form>
<?php
if(isset($_POST['button'])){
    $sql2="delete from gouwuche where huodanhao='".$a."'";
    $result2=mysql_query($sql2,$link);
    echo "<script>alert('删除订单成功！！！');window.location.href='searchhost.php'</script>";

}
?>
</body>
</html>