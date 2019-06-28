<?php
$dsn="mysql:host=localhost;dbname=phpdb";
$db=new PDO($dsn,'root','');
$db->query('set names utf8');
?>