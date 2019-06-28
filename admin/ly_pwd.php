<html>
<?php
header('content-type:text/html;charset=utf-8;');
include('conn.php');
$query3 = "select username from admin where id=1";
$result=mysql_query($query3,$conn);
$rows=mysql_fetch_assoc($result);

if(isset($_POST['Submit'])) {

    $query = "select password from admin where password = '{$_POST['password']}'";
    $result = mysql_query($query, $conn);
    if (mysql_num_rows($result) != 1) {
        echo"<script>alert('原密码不正确')</script>";
    }else{
        $password2=$_POST["password2"];
        $sql="update admin set password='$password2' where id=1";
        $result2 = mysql_query($sql, $conn);
        echo "<script>alert('修改成功,请重新进行登陆！');window.location='ly_pwd.php'</script>";
        exit();
    }
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        .ACT_btn {

            height:26px;
            width:94px;
            cursor:hand;
            border:solid 0 #111;
            font-size: 12px;
        }

        .bg_tr {
            font-family: "微软雅黑,Verdana, 新宋体";
            color:#e1e2e3;/*标题字体色*/
            font-size:12px;
            font-weight:bolder;
            background:#353c44;/*标题背景色*/

            line-height: 22px;
        }td {
             color:#1E5494;
             font-size:12px;
             line-height: 18px;
         }
        .tdbg1 {
            background:#F9F9F9;
        }
        .tdbg {
            BACKGROUND: #ffffff;
        }
        .top_link{text-decoration:none;font-size:14px;color:#FFDED2;height:0;filter:dropshadow(offX=1,offY=1,color=BD3400);}
        A.top_link:link{text-decoration:none;font-size:14px;color:#FFDED2;height:0;filter:dropshadow(offX=1,offY=1,color=BD3400);}
        A.top_link:visited{text-decoration:none;font-size:14px;color:#FFDED2;height:0;filter:dropshadow(offX=1,offY=1,color=BD3400);}
        A.top_link:active{text-decoration:underline;font-size:14px;color:#fff;height:0;filter:dropshadow(offX=1,offY=1,color=BD3400);}
        A.top_link:hover{text-decoration:underline;font-size:14px;color:#fff;height:0;filter:dropshadow(offX=1,offY=1,color=BD3400);}


        .topbar {color:#ffffff}
        .topbar a:link,.topbar a:visited{color:#ffffff;}
        .topbar a:hover{background:#ccffcc; display:block; height:26px; padding-top:6px; color:#000000; text-decoration:none}
        #table2 {
            width:100%;
            height:30px;
            border-bottom : 1px solid #fff;
            background-color: #6E4000;
        }

        .titledaohang {
            FONT-SIZE: 12px;

            COLOR: #551C02;
            font-weight:bolder;
            FONT-FAMILY: '微软雅黑,宋体'
        }
        /*input{
        height:15px;padding-top:2px;border:1px solid #7F9DB9;color:#1E5494;
        }*/


        .Leftback {
            background:#865802;
        }


        .leftframetable{
            border: 1px solid #4C3500;
            margin-top: 3px;
            margin-bottom: 3px;
            background:#FDF6E6;
        }
    </style>
</head>
<body>
<table cellpadding="3" cellspacing="1" border="0" width="100%" class="table" align=center>
    <form name="renpassword" method="post" action="">
        <tr>
            <th height=25 colspan=4 align="center" class="bg_tr">更改管理密码</th>
        </tr>
        <tr>
            <td width="40%" align="right" class="td_bg">用户名：</td>
            <td width="60%" class="td_bg"><?php echo $rows["username"] ?></td>
        </tr>
        <tr>
            <td align="right" class="td_bg">原密码：</td>
            <td class="td_bg"><input name="password" type="password" id="password" size="20"></td>
        </tr>
        <tr>
            <td align="right" class="td_bg">新密码：</td>
            <td class="td_bg"><input name="password1" type="password" id="password1" size="20"></td>
        </tr>
        <tr>
            <td align="right" class="td_bg">确认密码：</td>
            <td class="td_bg"><input name="password2" type="password" id="password2" size="20"></td>
        </tr>
        <tr>
            <td colspan="2" align="center" class="td_bg">
                <input class="button" onClick="return check();" type="submit" name="Submit" value="确定更改">
            </td>
        </tr>
    </form>
</table>
</body>
<script type="text/javascript">
    function checkspace(checkstr) {
        var str = '';
        for(i = 0; i < checkstr.length; i++) {
            str = str + ' ';
        }
        return (str == checkstr);
    }
    function check()
    {
        if(checkspace(document.renpassword.password.value)) {
            document.renpassword.password.focus();
            alert("原密码不能为空！");
            return false;
        }
        if(checkspace(document.renpassword.password1.value)) {
            document.renpassword.password1.focus();
            alert("新密码不能为空！");
            return false;
        }
        if(checkspace(document.renpassword.password2.value)) {
            document.renpassword.password2.focus();
            alert("确认密码不能为空！");
            return false;
        }
        if(document.renpassword.password1.value != document.renpassword.password2.value) {
            document.renpassword.password1.focus();
            document.renpassword.password1.value = '';
            document.renpassword.password2.value = '';
            alert("新密码和确认密码不相同，请重新输入");
            return false;
        }
        document.admininfo.submit();
    }
</script>
</html>