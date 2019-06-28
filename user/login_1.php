<?php
/**
 * Created by PhpStorm.
 * User: Z.suduan
 * Date: 2017/12/7
 * Time: 23:37
 */
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>我的Bootstrap网页</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
</head>
<body>
<script>
    function changing(){
        document.getElementById('checkpic').src="checkcode.php?"+Math.random();
    }
</script>
<div class="header">
    <div class="container">
        <div class="logo"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> BookShop</div>
        <div class="welcome">欢迎登录</div>

        <div class="back pull-right" >
            已有账号？<a href="test.php">返回首页登录</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form class="form-horizontal"  method="post" action="login_2.php">
                <div class="form-group">

                    <div class="list-group">
                        <label >用 户 名</label>
                        <div>
                            <input type="text" name="name" placeholder="您的账户名和登录名">
                        </div>
                    </div>

                    <div class="list-group">
                        <label>密码</label>
                        <div>
                            <input type="password" name="password" placeholder="请再次输入密码">
                        </div>
                    </div>
                    <div class="list-group">
                        <label>验 证 码</label>
                        <span style="width: 60%">
                            <input type="text" name="check" placeholder="请输入验证码">
                        </span>
                        <span>
                            <img  class="img_code" id="checkpic" onclick="changing();"
                                  src='checkcode.php' />
                        </span>
                    </div>

                    <div class="list-group register">
                        <input name="submit" type="submit" value="立即登录">
                    </div>

                </div>
        </div>
        <div class="col-md-4">
            <img src="images/register.jpg">
          <span class="gy">
            <p>书中横卧着整个过去的灵魂。<br><br><small><cite>——［俄］普希金</cite></small></p>
          </span>



        </div>
    </div>

</div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>