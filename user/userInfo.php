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
<div class="header">
    <div class="container">
        <div class="logo"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> BookShop</div>
        <div class="welcome">修改个人信息</div>


    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form class="form-horizontal" action="userInfoOK.php" method="post">
                <div class="form-group">

                    <div class="list-group">
                        <label>修改密码</label>
                        <div>
                            <input type="password" name="password1" placeholder="建议至少使用两种字符组合">
                        </div>
                    </div>

                    <div class="list-group">
                        <label>确认密码</label>
                        <div>
                            <input type="password" name="password2" placeholder="请再次输入密码">
                        </div>
                    </div>

                    <!-- <div class="list-group">
                      <label>电话号码</label>
                      <div>
                        <input type="text" name="" placeholder="建议使用常用手机">
                      </div>
                    </div> -->

                    <div class="list-group">
                        <label>电子邮箱</label>
                        <div>
                            <input type="email" name="email" placeholder="建议使用常用邮箱">
                        </div>
                    </div>

                    <div class="list-group register">
                        <input type="submit" value="保存">
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