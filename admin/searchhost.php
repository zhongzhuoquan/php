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
        font-size:15px;
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

<body style="font-size:50px;">
<form action="" method="post">

    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
        <tr>
            <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr"> 后台管理 >> 订单管理</td>
        </tr>
                    <tr>
                        <td width="25%" align="center">
                            <input type="text" value="在本网站已注册用户"  readonly/>
                        </td>
                        <td width="36%" align="center">
                            <select name="seltype" id="seltype">
                                <?php
                                header('content-type:text/html;charset=utf-8;');
                                $link=@mysql_connect('localhost','root','');
                                mysql_select_db('phpdb');
                                mysql_query('set names utf8');
                                $sql="select * from host";
                                $result=mysql_query($sql,$link);
                                while ($row=mysql_fetch_array($result)) {
                                ?>
                                <option ><?=$row['name']?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td width="20%" align="center">
                            <input type="submit" name="button" id="button" value="查询" />
                        </td>
                    </tr>
                    </table>
</form>
<table width="45%" height="42" border="0" align="center" cellpadding="0" cellspacing="0" class="bk">

    <tr>
        <td width="6%" height="35" align="center" bgcolor="#FFFFFF">用户名</td>
        <td width="25%" align="center" bgcolor="#FFFFFF">货单号</td>
    </tr>
                        <?php
                        if(isset($_POST['button'])){
                            $a=$_POST['seltype'];
                        $sql1="select DISTINCT huodanhao, username  from gouwuche where username='".$a."'and huodanhao is not null";
                        $result1=mysql_query($sql1,$link);
                        while ($row2=mysql_fetch_array($result1)) { ?>

                            <tr>
                                <td width="6%" height="35" align="center" bgcolor="#FFFFFF"><?=$row2['username']?></td>
                                <td width="25%" align="center" bgcolor="#FFFFFF"><a href="huowu.php?huodanhao=<?=$row2['huodanhao']?>"><?=$row2['huodanhao']?></a></td>
                            </tr>
                        <?php
                        }}
                        ?>

                 </table>

            </form>


</body>
</html>
