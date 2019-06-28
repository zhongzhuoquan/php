<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>php make page list</title>
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
            font-size:12px;
            font-weight:bolder;
            background:#353c44;/*标题背景色*/

            line-height: 22px;
        }td {
             color:#1E5494;
             font-size:12px;
             line-height: 18px;
         }
        .page{color: #ffffff;}
        .page a:visited {
            text-decoration: none;
            color:#ffffff;
        }
    </style>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
    <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr"> 后台管理 >> 新书管理</td>
    </tr>
    <tr>
        <td width="6%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="25%" align="center" bgcolor="#FFFFFF">书名</td>
        <td width="11%" align="center" bgcolor="#FFFFFF">价格</td>
        <td width="16%" align="center" bgcolor="#FFFFFF">入库时间</td>
        <td width="11%" align="center" bgcolor="#FFFFFF">类别</td>
        <td width="11%" align="center" bgcolor="#FFFFFF">入库总量</td>
        <td width="20%" align="center" bgcolor="#FFFFFF">操作</td>
    </tr>
    <?php
    $link=@mysql_connect('localhost','root','');
    mysql_select_db('phpdb');
    mysql_query("set character set 'utf8'");
    //写库
    mysql_query("set names 'utf8'");

    $Page_size=8;

    $result=mysql_query('select * from book');
    $count = mysql_num_rows($result);
    $page_count = ceil($count/$Page_size);

    $init=1;
    $page_len=7;
    $max_p=$page_count;
    $pages=$page_count;

    //判断当前页码
    if(empty($_GET['page'])||$_GET['page']<0){
        $page=1;
    }else {
        $page=$_GET['page'];
    }

    $offset=$Page_size*($page-1);
    $sql="select * from book limit $offset,$Page_size";
    $result=mysql_query($sql,$link);
    while ($row=mysql_fetch_array($result)) {
        ?>
        <tr align="center">
            <td class="td_bg" width="6%"><?php echo $row["id"]?></td>
            <td class="td_bg" width="25%" height="26"><?php echo $row["name"]?></td>
            <td class="td_bg" width="11%" height="26"><?php echo $row["price"]?></td>
            <td class="td_bg" width="16%" height="26"><?php echo $row["uploadtime"]?></td>
            <td width="11%" height="26" class="td_bg"><?php echo $row["type"]?></td>
            <td width="11%" height="26" class="td_bg"><?php echo $row["total"]?></td>
            <td class="td_bg" width="20%">
                <a href="update.php?id=<?php echo $row['id'] ?>" class="trlink">修改</a>
                <a href="del.php?id=<?php echo $row['id'] ?>" class="trlink">删除</a>
            </td>
        </tr>
    <?php
    }
    $page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数
    $pageoffset = ($page_len-1)/2;//页码个数左右偏移量

    $key='<div class="page">';
    $key.="<span>$page/$pages</span> "; //第几页,共几页
    if($page!=1){
        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">首页</a> "; //第一页
        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页
    }else {
        $key.="首页 ";//第一页
        $key.="上一页"; //上一页
    }
    if($pages>$page_len){
        //如果当前页小于等于左偏移
        if($page<=$pageoffset){
            $init=1;
            $max_p = $page_len;
        }else{//如果当前页大于左偏移
            //如果当前页码右偏移超出最大分页数
            if($page+$pageoffset>=$pages+1){
                $init = $pages-$page_len+1;
            }else{
                //左右偏移都存在时的计算
                $init = $page-$pageoffset;
                $max_p = $page+$pageoffset;
            }
        }
    }
    for($i=$init;$i<=$max_p;$i++){
        if($i==$page){
            $key.=' <span>'.$i.'</span>';
        } else {
            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>";
        }
    }
    if($page!=$pages){
        $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页
        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页
    }else {
        $key.="下一页 ";//下一页
        $key.="最后一页"; //最后一页
    }
    $key.='</div>';
    ?>
    <tr>
        <td colspan="7"    style="background:#353c44" ><div align="center"><?php echo $key?></div></td>
    </tr>
</table>
</body>
</html> 