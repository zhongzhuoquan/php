<?php
header('content-type:text/html;charset=utf-8;');
$link = mysqli_connect('localhost', 'root', '', 'phpdb');
if (!$link){
    echo"<script>alert('数据库连接失败！')</script>";

}else {
    if (isset($_POST['login'])){
        if($_POST['name']==null){
            echo"<script>alert('用户名不能为空');window.location.href='test.php';</script>";

            exit();
        } if($_POST['password']==null){
            echo"<script>alert('密码不能为空');window.location.href='test.php';</script>";

            exit();
        }
        if($_POST['name']=="admin"){
            $query = "select * from admin where username = '{$_POST['name']}' and password = '{$_POST['password']}'";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) == 1){
                echo"<script>alert('管理员登录成功');
window.location.href='../ks2/admin.html';</script>";


            }
            else{
                echo"<script>alert('登录失败');window.location.href='test.php';</script>";
            }

        }else{
        $query = "select * from host where name = '{$_POST['name']}' and password = '{$_POST['password']}'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
            session_start();
            $_SESSION['username']=$_POST['name'];
            echo"<script>alert('登录成功');
window.location.href='loginOK.php';</script>";


        }
        else{
            echo"<script>alert('登录失败');window.location.href='test.php';</script>";
        }
    }
}}
if (isset($_POST['login_1'])){
    header("Location:register.php");
}

?>