<?php
header('content-type:text/html;charset=utf-8;');
$DNS="mysql:host=localhost;dbname=phpdb";
$db=new PDO($DNS,'root','');
$db->query('set names UTF8');
?>
<html>
<style>
.table{
border: 1px solid #CAF2FF;/*边框颜色*/
margin-top: 5px;
margin-bottom: 5px;
background:#a8c7ce;
}
.td_bgf {
background:#d3eaef;
color:#000000;
}

.td_bg {
background:#ffffff;
color:#344b50;
}
.bg_tr {
font-family: "微软雅黑,Verdana, 新宋体";
color:#e1e2e3;/*标题字体色*/
font-size:20px;
font-weight:bolder;
background:#353c44;/*标题背景色*/

line-height: 22px;
}td {
color:#1E5494;
font-size:20px;
line-height: 18px;
}
.page{color: #ffffff;}
.page a:visited {
text-decoration: none;
color:#ffffff;
}
</style>
<body>
<form method="post" action="update_g.php">
    <table width="100%" border="0" align="center"  >
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
            <tr>
                <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr"> 后台管理 >> 公告管理</td>
            </tr>
            <tr>
                <td width="25%" height="35" align="center" bgcolor="#FFFFFF">公告内容</td>
                <td width="6%" align="center" bgcolor="#FFFFFF">操作</td>
            </tr>
    <?php
    $result_g=$db->query("select * from gonggao ");
    $result_g->setFetchMode(PDO::FETCH_ASSOC);
    while($row3=$result_g->fetch()){ ?>
        <tr>
            <td width="25%" height="35" align="center" bgcolor="#FFFFFF"><Textarea name="text" rows="3″ cols="20″ style="width: 100%;"><?=$row3['main']?></textarea></td>
            <td width="6%" align="center" bgcolor="#FFFFFF"><input type="submit" name="submit" value="修改"></td>
        </tr>
    <?php
    }?>
    </table></form>

</body>
</html>
