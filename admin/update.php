<html>
<head>
    <?php
    include('conn.php');
    mysql_query("set character set 'utf8'");
    //写库
    mysql_query("set names 'utf8'");
    $arr=mysql_query("select * from book where id='".$_GET['id']."'",$conn);
    $rows=mysql_fetch_row($arr);
    ?>
    <?php
    if(isset($_POST['button'])){
        $sqlstr = "update book set name = '".$_POST['name']."', price = '".$_POST['price']."', uploadtime = '".$_POST['uptime']."',
  type = '".$_POST['type']."', total = '".$_POST['total']."' where id='".$_GET['id']."'";
        $arry=mysql_query($sqlstr,$conn);
        if ($arry){
            echo "<script> alert('修改成功');location='book_admin2.php';</script>";
        }
        else{
            echo "<script>alert('修改失败');history.go(-1);</script>";
        }

    }
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP图书管理系统新书修改</title>
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
<form id="myform" name="myform" method="post" action="" onSubmit="return myform_Validator(this)">
    <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
            <td colspan="2" align="left" class="bg_tr"> 后台管理 >> 新书修改</td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">书名：</td>
            <td width="69%" class="td_bg">
                <input name="name" type="text" id="name" value="" size="15" maxlength="30" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">价格：</td>
            <td class="td_bg">
                <input name="price" type="text" id="price" value="" size="5" maxlength="15" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">入库时间：
            </td>
            <td class="td_bg">
                <label>
                    <input name="uptime" type="date" id="uptime" value="" size="17" />
                </label>
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">所属类别：
            </td>
            <td class="td_bg"><label>
                    <input name="type" type="text" id="type" value="" size="6" maxlength="19" />
                </label></td>
        </tr>
        <tr>
            <td align="right" class="td_bg">入库总量：</td>
            <td class="td_bg"><input name="total" type="text" id="total" value="" size="5" maxlength="15" />
                本</td>
        </tr>
        <tr>
            <td align="right" class="td_bg">
                <input type="hidden" name="action" value="modify">
                <input type="submit" name="button" id="button" value="提交"/></td>
            <td class="td_bg">　　
                <input type="reset" name="button2" id="button2" value="重置"/></td>
        </tr>
    </table>
</form>
</body>
</html>
