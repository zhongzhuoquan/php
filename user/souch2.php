<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bookshop.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>php make page list</title>
    <style type="text/CSS">
        .container img{

            margin-bottom: 100px;



        }
        .row{

            text-align: center;



        }
        .thumbnail{
            width: 200px;
            height: 250px;

            margin-left: 45px;

        }
        .caption{
text-align: center;
            margin-top: -10px;
        }

        /*分页颜色*/
        .page{color: #080808;}
        .page a:visited {
            text-decoration: none;
            color: #080808;
        }
        /*分页颜色*/
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <span  id="title"> BookShop </span>
        <form action="souch.php" method="post" class="navbar-form navbar-right">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="请输入搜索内容">
                <div class="input-group-btn">
                    <button name="submit2" class="btn btn-success">搜索</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="navbar-collapse collapse" id="navbar">

    <div class="container">
        <ul class="nav navbar-nav">
            <li class="active"><a href="login7.php">Home</a></li>
            <li><a href="login_6.php">BookingShop</a></li>
            <li><a href="login_5.php">MyBook</a></li>
        </ul>
    </div>
</div>

    <?php
    session_start();
    $link=@mysql_connect('localhost','root','');
    mysql_select_db('phpdb');
    mysql_query('set names utf8');

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
$A=$_SESSION['keyword'];
    $offset=$Page_size*($page-1);
    $sql = "select * from book where name LIKE '%$A%'  limit $offset,$Page_size";
    $result=mysql_query($sql,$link);
    while ($row=mysql_fetch_array($result)) {
        ?>


    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src=" <?php echo $row['src']?>" alt="" style="width: 150px;height: 150px"/ >
            <div class="caption">
                <a href="scan.php?id=<?=$row['id']?>" >
                    <h4><?=$row['name'] ?></h4>
                </a>
            </div>
        </div>
    </div>
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

       <div style="position: absolute;left:40%;top:90%;"><td   style="background:#353c44" ><div align="center"><?php echo $key?></div></td></div>


</body>
</html> 