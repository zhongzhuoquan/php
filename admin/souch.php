<?php
if(isset($_POST['button'])) {
    session_start();
    $_SESSION['seltype'] = $_POST['seltype'];
    $_SESSION['coun'] = $_POST['coun'];
    header("Location:book_search2.php");
}

?>