<?php
  session_start(); 
  $_SESSION["userid"]="abcd";
  $_SESSION["username"]="測試abcd";
  $userid=$_SESSION["userid"];
  $username=$_SESSION["username"];

  $ordqty = $_POST["txt_ordqty"];  
  if ($ordqty=="") die("您未輸入訂購的數量?.....");
  $ordqty =(int)$ordqty;
  
  if ($userid=="") die("您尚未登入會員?.....");
  $today = date("Y-m-d H:i:s");
  $gdno = $_POST["txt_gdno"];
  $gdname = $_POST["txt_gdname"];
  $price = $_POST["txt_price"];
  $price = (int)$price;
  echo "您是: ".$userid. "-->".$username;
  echo "<p>您訂購的商品資料如下:<hr>";
  echo "商品編號: ".$gdno."<br>";
  echo "商品名稱: ".$gdname."<br>";
  echo "售    價: ".$price." 元<br>";
  echo "訂購數量: ".$ordqty."<br>";

  header("Content-Type: text/html; charset=utf-8");
  require("connmysql.php");
  
  $strsql ="INSERT INTO ordItems (userid,ord_date,username,ord_gdno,ord_gdname,ord_Price,ord_qty) ";
  $strsql = $strsql. " VALUES ('".$userid."','".$today."','".$username."','";
  $strsql .= $gdno."','";
  $strsql .= $gdname."',";
  $strsql .= $price.",";
  $strsql .= $ordqty.")"; 
  //echo  "sql: " .$strsql;
  //die(" ....");  
  mysql_query($strsql);
  echo "<center><br><p><b>謝謝您選購本商品! 請按瀏覽器的「上一頁」返回....</b></p></center>"
?>