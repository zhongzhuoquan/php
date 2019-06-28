<?php
if(isset($_POST['submit2'])) {
    session_start();
    $_SESSION['keyword'] = $_POST['keyword'];
    header("Location:souch2.php");
}
if(isset($_POST['submit3'])) {
    session_start();
    $_SESSION['keyword'] = $_POST['keyword'];
    header("Location:souch2.php");
}
?>