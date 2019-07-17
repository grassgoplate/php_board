<?php
  session_start(); 
  $userid=$_SESSION["userid"];
  $username=$_SESSION["username"];
  header("Content-Type: text/html; charset=utf-8");
  require("connmysql.php");
  
  $autono=$_GET["autono"];
  $strsql = "delete FROM ordItems WHERE ord_autono=".$autono;
  mysql_query($strsql);
  header("location:show_car2.php");
?>