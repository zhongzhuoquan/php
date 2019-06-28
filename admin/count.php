<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP图书管理系统图书统计</title>
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
            font-size:12px;
            font-weight:bolder;
            background:#353c44;/*标题背景色*/

            line-height: 22px;
        }
        td {
            color:#1E5494;
            font-size:12px;
            line-height: 18px;
        }
    </style>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table">
    <tr>
        <td height="27" colspan="2" align="left" bgcolor="#FFFFFF" class="bg_tr"> 后台管理 >> 图书统计</td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" height="27">图书类别</td>
        <td align="center" bgcolor="#FFFFFF">库内图书</td>
    </tr>

    <?php

    include('conn.php');
    $sql = "select type, count(*) from book group by type";
    $val=mysql_query($sql,$conn);
    while($arr=mysql_fetch_row($val)){
        echo "<tr height='30'>";
        echo "<td align='center' bgcolor='#FFFFFF'>".$arr[0]."</td>";
        echo "<td align='center' bgcolor='#FFFFFF'>本类目共有：".$arr[1]." 种</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>