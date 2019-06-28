<?php
$DNS="mysql:host=localhost;dbname=phpdb";
$db=new PDO($DNS,'root','');
$db->query('set names UTF8');
?>
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
    <link href="css/bookshop.css" rel="stylesheet">
</head>
<?
header('content-type:text/html;charset=utf-8;');
?>
<body>
<div class="container-fluid" >
    <div class="container">
        <div class="nav navbar-header navbar-right">
        <span class="login">
          <a  id="login" >登录</a>
            <!--butoon改下透明-->
            <!-- 弹出框内容跟CSS都可以改     重要是js文件 fadeIn("slow") fadeOut("slow") 获取div的类名进行隐藏 跟显现-->
            <!--弹出式登录框-->
          <div class="overCurtain"></div>
          <div class="hide-center">
              <div id="formhead">
                  <div id="formhead-title">
                      用户登录
                  </div>
                  <button type="button" id="close">X</button>
              </div>
              <div id="formbody">
                  <form method="post" action="login.php">
                  <div class="loginUserName">
                      <input id="input-topright-loginInput" class="loginInput" name="name" placeholder="用户名" type="text">
                  </div>
                  <div class="loginPassword">
                      <input id="input-bottomright-loginInput"  name="password" class="loginInput" placeholder="密码" type="password" style="border-bottom-right-radius:5px;">
                  </div>
                  <div id="formfoot">
                     <button   id="BSignIn" type="submit" name="login">登录</button> <button   id="BSignIn_1" type="submit" name="login_1">注册</button>
                  </div>
                  </form>
              </div>
          </div>


<!--弹出式登录框到这里-->

        </span>

<!--注销-->
        <span class="regsiter">
          <a id="zhuche" href="test.php">注销</a>
            </span>
            <!--注销完-->

        </div>
    </div>
</div>

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
            <li class="active"><a href="test.php">Home</a></li>
            <li><a href="login_4.php">BookingShop</a></li>
            <li><a href="login_4.php">MyBook</a></li>
            <li><a href="userInfo.php" target="_blank">Personal</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="home_nav_l ">
        <form>
            <ul class="post">最新公告</ul>
            <?php
            $result_g=$db->query("select * from gonggao ");
            $result_g->setFetchMode(PDO::FETCH_ASSOC);
            while($row3=$result_g->fetch()){ ?>
            <ul class="post_content">
                &nbsp;&nbsp;&nbsp;<?=$row3['main']?>
            </ul>
            <?php
            }?>
        </form>
    </div>
    <div class="col-md-9" style="padding: 0px;">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                <li data-target="#myCarousel" data-slide-to="4" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img alt="First slide"  src="images/l1.jpg">
                </div>
                <div class="item">
                    <img alt="Second slide" src="images/l2.jpg">
                </div>
                <div class="item">
                    <img alt="Third slide" src="images/l3.jpg">
                </div>
                <div class="item">
                    <img alt="Four slide" src="images/l4.jpg">
                </div>
                <div class="item">
                    <img alt="Five slide" src="images/l5.jpg">
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="list-title">为您推荐</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable" id="tabs-154802">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#panel-1" data-toggle="tab">图书推荐</a>
                            </li>
                            <li>
                                <a href="#panel-2" data-toggle="tab">热卖图书</a>
                            </li>
                            <li>
                                <a href="#panel-3" data-toggle="tab">热卖新品</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <?php
                                            $result_u=$db->query("select * from bookinfo limit 0,12 ");
                                            $result_u->setFetchMode(PDO::FETCH_ASSOC);
                                            while($row=$result_u->fetch()){ ?>
                                                <div class="col-md-2">
                                                    <img alt="Bootstrap Image Preview" src="<?= $row['img'] ?>" width="160" height="160"/>

                                                    <p class="name"><a  href="scan3.php?id=<?=$row['bid']?>" target="_blank"><?= $row['bname'] ?></a></p>

                                                    <p class="author"><?= $row['author'] ?></p>

                                                    <p class="price"><span class="sign">￥</span><?= $row['bprice'] ?>
                                                        <span class="price_r"><span class="sign">￥</span><?= $row['br_price'] ?></span></p>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="panel-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <?php
                                            $result_u=$db->query("select * from bookinfo limit 12,24");
                                            $result_u->setFetchMode(PDO::FETCH_ASSOC);
                                            while($row=$result_u->fetch()){ ?>
                                                <div class="col-md-2">
                                                    <img alt="Bootstrap Image Preview" src="<?= $row['img'] ?>" width="160" height="160"/>

                                                    <p class="name"><a  href="scan3.php?id=<?=$row['bid']?>" target="_blank"><?= $row['bname'] ?></a></p>

                                                    <p class="author"><?= $row['author'] ?></p>

                                                    <p class="price"><span class="sign">￥</span><?= $row['bprice'] ?>
                                                        <span class="price_r"><span class="sign">￥</span><?= $row['br_price'] ?></span></p>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="panel-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <?php
                                            $result_u=$db->query("select * from book limit 0,12");
                                            $result_u->setFetchMode(PDO::FETCH_ASSOC);
                                            while($row=$result_u->fetch()){ ?>
                                                <div class="col-md-2">
                                                    <img alt="Bootstrap Image Preview" src="<?= $row['src'] ?>" width="160" height="160"/>

                                                    <p class="name"><a  href="scan.php?id=<?=$row['id']?>" target="_blank"><?= $row['name'] ?></a></p>

                                                    <p class="price"><span class="sign">￥</span><?= $row['price'] ?>
                                                        <span class="price_r"><span class="sign">￥</span><?= $row['price'] ?></span></p>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <?php
                                            $result_u=$db->query("select * from book limit 13,18");
                                            $result_u->setFetchMode(PDO::FETCH_ASSOC);
                                            while($row=$result_u->fetch()){ ?>
                                                <div class="col-md-2">
                                                    <img alt="Bootstrap Image Preview" src="<?= $row['src'] ?>" width="160" height="160"/>

                                                    <p class="name"><a  href="scan.php?id=<?=$row['id']?>" target="_blank"><?= $row['name'] ?></a></p>

                                                    <p class="price"><span class="sign">￥</span><?= $row['price'] ?>
                                                        <span class="price_r"><span class="sign">￥</span><?= $row['price'] ?></span></p>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- tab-content结束 -->

                    </div><!-- tabbable结束 -->
                </div>
            </div>
        </div>
    </div>
    <!-- </div>container结束 -->

    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="list-title"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>  图书排行版</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php
                $result_u=$db->query("select * from book limit 13,15 ");
                $result_u->setFetchMode(PDO::FETCH_ASSOC);
                while($row=$result_u->fetch()){ ?>
                    <div class="col-md-2">
                        <img alt="Bootstrap Image Preview" src="<?= $row['src'] ?>" width="160" height="160"/>

                        <p class="name"><a  href="scan.php?id=<?=$row['id']?>" target="_blank"><?= $row['name'] ?></a></p>

                        <p class="price"><span class="sign">￥</span><?= $row['price'] ?>
                            <span class="price_r"><span class="sign">￥</span><?= $row['price'] ?></span></p>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

</div><!-- container结束 -->
<div class="modal-footer">
    <tr>
        <td class="panel-footer">
            <ul>
                <li class="logo"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> BookShop</li>
                <li><a>About us</a></li>
                <li>create by xxxxxx</li>
                <li></li>
            </ul>
        </td>
        <td class="panel-footer">
            <ul>
                <li class="panel_t">合作伙伴</li>
                <li>xxx</li>
                <li>xx</li>
                <li>xxx</li>
            </ul>
        </td>
        <td class="panel-footer">
            <ul>
                <li class="panel_t">Contact Us</li>
                <li>Wechat : BookShop_chat</li>
                <li>Email : BookShop@com</li>
                <li>Tel : 15984652462</li>
            </ul>
        </td>
    </tr>
</div>


<script src="js/head.js"></script><!--弹出框js文件 -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>