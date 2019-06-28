<?php
    include('conn.php');
$a=$_POST['text'];
    $sql="update gonggao set main='".$a."'";
    $result=mysql_query($sql,$conn);
    echo "<script>alert('修改成功！！！');window.location.href='gonggao.php'</script>";

?>