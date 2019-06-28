<html>
<?php
header('content-type:text/html;charset=utf-8;');
if(isset($_POST['button'])){
    include('conn.php');
    $sql = "insert into book (name,price,uploadtime,type,total)
          values('".$_POST['name']."','".$_POST['price']."','".$_POST['uptime']."','".$_POST['type']."','".$_POST['total']."')";
    $arr=mysql_query($sql,$conn);
    if ($arr){
        echo "<script language=javascript>alert('添加成功！');window.location='book_admin2.php'</script>";
    }
    else{
        echo "<script>alert('添加失败');history.go(-1);</script>";
    }
}
?>
<script type="text/javascript">
    function myform_Validator(theForm)
    {

        if (theForm.name.value == "")
        {
            alert("请输入书名。");
            theForm.name.focus();
            return (false);
        }
        if (theForm.price.value == "")
        {
            alert("请输入书名价格。");
            theForm.price.focus();
            return (false);
        }
        if (theForm.type.value == "")
        {
            alert("请输入书名所属类别。");
            theForm.type.focus();
            return (false);
        }
        return (true);
    }
</script>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP图书管理系统新书添加</title>
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
<form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)">
    <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
            <td colspan="2" align="left" class="bg_tr"> 后台管理 >> 新书入库</td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">书名：</td>
            <td width="69%" class="td_bg">
                <input name="name" type="text" id="name" size="15" maxlength="30" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">价格：</td>
            <td class="td_bg">
                <input name="price" type="text" id="price" size="5" maxlength="15" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">日期：</td>
            <td class="td_bg">
                <input name="uptime" type="date" id="uptime" value="" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">所属类别：</td>
            <td class="td_bg">
                <input name="type" type="text" id="type" size="6" maxlength="19" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">入库总量：</td>
            <td class="td_bg"><input name="total" type="text" id="total" size="5" maxlength="15" />
                本</td>
        </tr>
        <tr>
            <td align="right" class="td_bg">
                <input type="hidden" name="action" value="insert">
                <input type="submit" name="button" id="button" value="提交" />
            </td>
            <td class="td_bg">　　
                <input type="reset" name="button2" id="button2" value="重置" />
            </td>
        </tr>
    </table>
    <form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)">
</form>
</body>
</html>