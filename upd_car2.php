<?php 
  header("Content-Type: text/html; charset=utf-8");
  require("connmysql.php");
  session_start(); 
  $newordqty=$_POST["new_ordqty"];
  $ordauto=$_SESSION["ordauto"];
  $strsql = "update ordItems set ord_qty =".$newordqty." WHERE ord_autono =".$ordauto;
  mysql_query($strsql);
  header("location:show_car2.php");
?>