<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bookshop.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>详情</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script src="js/common.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var showproduct = {
                "boxid":"showbox",
                "sumid":"showsum",
                "boxw":400,//宽度,该版本中请把宽高填写成一样
                "boxh":400,//高度,该版本中请把宽高填写成一样
                "sumw":60,//列表每个宽度,该版本中请把宽高填写成一样
                "sumh":60,//列表每个高度,该版本中请把宽高填写成一样
                "sumi":7,//列表间隔
                "sums":5,//列表显示个数
                "sumsel":"sel",
                "sumborder":1,//列表边框，没有边框填写0，边框在css中修改
                "lastid":"showlast",
                "nextid":"shownext"
            };//参数定义
            $.ljsGlasses.pcGlasses(showproduct);//方法调用，务必在加载完后执行
        });
    </script>
</head>
<body>
<!--页头-->
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
            <li><a href="userInfo.php">Personal</a></li>
        </ul>
    </div>
</div>
<form action="scan2.php" method="post">
<?php
session_start();
$get=$_GET['id'];
$link=@mysql_connect('localhost','root','');
mysql_select_db('phpdb');
mysql_query('set names utf8');
$sql="select * from book where id=$get";
$result=mysql_query($sql,$link);
$row=mysql_fetch_array($result);
$_SESSION['price']=$row['price'];
$_SESSION['src']=$row['src'];
$_SESSION['name']=$row['name'];
$_SESSION['get']=$get;
?>
<div class="showall">
    <!--left -->
    <div class="showbot">
        <div id="showbox">
            <img src="<?=$_SESSION['src']?>" width="400" height="400" />

        </div><!--展示图片盒子-->
        <div id="showsum">
            <!--展示图片里边-->
        </div>

        <p class="showpage">
            <a href="javascript:void(0);" id="showlast"> < </a>
            <a href="javascript:void(0);" id="shownext"> > </a>
        </p>
    </div>
    <!--right-->
    <div class="tb-property">
        <div class="tr-nobdr">
            <h3><?=$_SESSION['name']?></h3>
        </div>
        <div class="txt">
            <span class="nowprice">￥<a href=""><?=$_SESSION['price']?></a></span>
            <div class="cumulative">
                <span class="number ty1">累计售出<br /><em id="add_sell_num_363">370</em></span>
                <span class="number tyu">累计评价<br /><em id="add_sell_num_363">25</em></span>
            </div>
        </div>

        <!--购物数量-->
        <script>
            $(document).ready(function(){
                var t = $("#text_box");
                $('#min').attr('disabled',true);
                $("#add").click(function(){
                    t.val(parseInt(t.val())+1)
                    if (parseInt(t.val())!=1){
                        $('#min').attr('disabled',false);
                    }
                })
                $("#min").click(function(){
                    t.val(parseInt(t.val())-1);
                    if (parseInt(t.val())==1){
                        $('#min').attr('disabled',true);
                    }
                })
            });
        </script>

        <div class="gcIpt">
            <span class="guT">数量</span>
           <input id="min" name="" type="button" value="-" />
            <input id="text_box" name="count" type="text" value="1"style="width:30px; text-align: center; color: #0F0F0F;"/>
            <input id="add" name="" type="button" value="+" />
            <span class="Hgt">库存（99）</span>
        </div>

        <div class="nobdr-btns">
       <button name="add" class="addcart hu"><img src="images/shop.png" width="25" height="25"/>加入购物车</button>
            <button name="buy" class="addcart yh"><img src="images/ht.png" width="25" height="25"/>立即购买</button></form>
        </div>

        <div class="guarantee">
            <span>邮费：包邮&nbsp;&nbsp;支持货到付款 <a href=""><img src="images/me.png"/></a></span>
        </div>
    </div>
</div>



<!--介绍与评论--->
<div class="under">
    <!--自定义高度-->
    <div class="aside"></div>
    <!------------>
    <div class="detail">
        <div class="active_tab" id="outer">
            <ul class="act_title_left" id="tab">
                <li class="act_active">
                    <a href="#">商品介绍</a>
                </li>
                <li>
                    <a href="#">商品评论</a>
                </li>
            </ul>
        </div>


        <form action="talk.php" method="post">
        <div class="lines">

            <div id="content" class="active_list">

                <!--商品介绍-->
                <div id="ui-a" class="ui-a">
                    <ul style="display:block;">
                        <li>商品名称:《<?=$_SESSION['name']?>》</li>
                        <li>商品编号：ECS001983</li>
                    </ul>
                </div>
                <!--商品评论-->
                <form action="talk.php" method="post">
                <div id="ui-b" class="ui-b">
                    <ul style="display:block;">
                        <li>请发表你的评论<br><br><input name="talk" id="input1" type="text" /></li>
                        <li><input name="submit_talk2" type="submit" value="提交" /> </li>
                        <li><div class="lines2"></div></li>
                        <?php
                        $link=@mysql_connect('localhost','root','123456');
                        mysql_select_db('phpdb');
                        mysql_query('set names utf8');
                        $sql = "select * from talk where id=$get  ";
                        $result=mysql_query($sql,$link);
                        while ($row=mysql_fetch_array($result)) {
                        ?>

                        <li><img src="images/user.jpg"></li><li>用户名：<?=$row['name']?></li>
                        <li>评论内容</li>
                            <?=$row['talk']?>
                            <li><div class="lines2"></div></li>
<?php
}?>
                    </ul>

                </div>
            </div>
        </div>
        </form>
        <script>
            $(function(){
                window.onload = function(){
                    var $li = $('#tab li');/*选择tab下的所有里标签*/
                    var $ul = $('#content ul');/*同上*/
                    /*当鼠标指针位于元素上方时发生的事件*/
                    $li.mouseover(function(){
                        var $this = $(this);
                        var $t = $this.index();
                        $li.removeClass();/*从被选元素移除一个或多个类*/
                        $this.addClass('act_active');/*调用的你的css样式中的act_active属性*/
                        $ul.css('display','none');
                        $ul.eq($t).css('display','block');
                    })
                }
            });
        </script>

</body>
</html>
