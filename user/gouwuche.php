<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <script src="js/jquery.min.js"></script><!--弹出框js文件 -->
    <link href="css/head.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>我的Bootstrap网页</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/gouwuche.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bookshop.css" rel="stylesheet">
</head>
<body>
<!-- 页头 -->
<div class="container-fluid">
    <div class="container">
        <div class="header">
            <span  id="title"> <span class="glyphicon glyphicon-book" aria-hidden="true"></span> BookShop </span>
            <div class="welcome">购物车</div>
            <form action="" method="post" class="navbar-form navbar-right">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="请输入搜索内容">
                    <div class="input-group-btn">
                        <button class="btn btn-success">搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- container -->
</div>
<div class="navbar-collapse collapse" id="navbar">
    <div class="container">
        <ul class="nav navbar-nav">
            <li class="active"><a href="loginOK.php">Home</a></li>
            <li><a href="gouwuche.php">BookingShop</a></li>
            <li><a href="shop.php">MyBook</a></li>
            <li><a href="userInfo.php">Personal</a></li>
        </ul>
    </div>
</div>
<div class="container">
    <form action="MyShop.php" method="POST">
        <div class="cart">  <!-- 购物车 -->
            <div class="cart-header">  <!-- 头部 -->
                <div class="chkall"><input type="checkbox">全选</div>
                <div class="product">商品信息</div>
                <div class="price">单价</div>
                <div class="numinput">数量</div>
                <div class="sum">小计</div>
            </div>

<?php
include('conn.php');
session_start();
$name=$_SESSION['username'];
header('content-type:text/html;charset=utf-8;');
$sql = "select * from gouwuche where qingkuang='待付款'and username='".$name."'";
$result=mysql_query($sql,$conn);
while ($row=mysql_fetch_array($result)) {
?>
            <div class="item">  <!-- 每一项 -->
                <div class="chkbx"><input type="checkbox" name="chkbx" value="1001"></div>  <!-- 此处的name和value会被提交 -->
                <div class="image"><img src="<?= $row['src']?>" alt=""></div>
                <div class="product"><?=$row['bookname']?></div>
                <div class="price"><?=$row['money']?></div>
                <div class="numinput">
                    <a class="decrease" href="javascript:void(0);">-</a>  <!-- 阻止链接的默认行为，使其不会发生页面跳转 -->
                    <input class="num" type="text" name="num" value="<?=$row['count']?>">  <!-- 此处的name和value会被提交 -->
                    <a class="increase" href="javascript:void(0);">+</a>
                </div>
                <div class="sum">30.80</div>
            </div>
<?php
}
?>

            <div class="cart-footer">  <!-- 尾部 -->
                <span class="">已选择<span class="count">0</span>件商品</span>
                &nbsp;
                总计：<span class="total">0.00</span>
      <span class="submit">

        <input type="submit" class="caculate" name="jiesuan" value="结算">
      </span>
            </div>
        </div>
    </form>
</div>








<script src="js/head.js"></script><!--弹出框js文件 -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/gouwuche.js"></script>
</body>
</html>
