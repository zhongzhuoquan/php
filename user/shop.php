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
</head>
<body>
<!-- 页头 -->
  <div class="container-fluid" >  
    <div class="container">
      <div class="header">
        <span  id="title"> <span class="glyphicon glyphicon-book" aria-hidden="true"></span> BookShop </span>
        <div class="welcome">订单</div>
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
  <div class="container">
    <form action="MyShop.php" method="POST">
        <div class="cart1">  <!-- 购物车 -->
            <div class="cart-header">  <!-- 头部 -->
                <div class="image">已下单</div>
                <div class="product">商品信息</div>
                <div class="price1">单价</div>
                <div class="numinput1">数量</div>
                <div class="sum1">小计</div>
                <div class="ddh">订单号</div>
            </div>

            <?php
            include('conn.php');
            session_start();
            $name=$_SESSION['username'];
            header('content-type:text/html;charset=utf-8;');
            $sql = "select * from gouwuche where qingkuang='已付款'and username='".$name."'";
            $result=mysql_query($sql,$conn);
            while ($row=mysql_fetch_array($result)) {
            ?>
            <div class="item">  <!-- 每一项 -->
                <div class="image"><img src="<?= $row['src']?>" alt=""></div>
                <div class="product"><?= $row['bookname']?></div>
                <div class="price1"><?=$row['money']?></div>
                <div class="numinput1"><?=$row['count']?></div>
                <div class="sum1"><?=$row['money']*$row['count']?></div>
                <div class="ddh"><?=$row['huodanhao']?></div>

            </div>
            <?php
            }
            ?>
        </div>
    </form>
  </div>

  <div class="modal-footer navbar-fixed-bottom">
      <div>Copyright ©  2017 BOOKSHOP Corporation, All Rights Reserved</div>
  </div>
            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

</body>
</html>