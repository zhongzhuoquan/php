<html>
    <style type="text/CSS">
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
    <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr"> 后台管理 >> 用户管理</td>
    </tr>
    <tr>
        <td width="6%" height="35" align="center" bgcolor="#FFFFFF">用户名</td>
        <td width="25%" align="center" bgcolor="#FFFFFF">操作</td>
    </tr>
    <?php
    header('content-type:text/html;charset=utf-8;');
    $link=@mysql_connect('localhost','root','');
    mysql_select_db('phpdb');
    mysql_query('set names utf8');
    $sql="select * from host";
    $result=mysql_query($sql,$link);
    while ($row=mysql_fetch_array($result)) {
        ?>
        <tr>
            <td width="6%" height="35" align="center" bgcolor="#FFFFFF"><?=$row['name']?></td>
            <td width="25%" align="center" bgcolor="#FFFFFF"><a href="delhost.php?id=<?=$row['id']?>">删除用户</a></td>
        </tr>

    <?php
    }
    ?>

</body>
</html>