<?php
  session_start(); 
  $ordauto=$_GET["autono"];
  $_SESSION["ordauto"]=$ordauto;
  $gdno = $_GET["mgdno"];
  $gdname = $_GET["mgdname"];
  $price = (int)$_GET["mprice"];
  $ordqty = $_GET["mordqty"];
  echo "商品編號: ".$gdno."<br>";
  echo "商品名稱: " .$gdname."<br>";
  echo "售    價: " .$price." 元<br>";
  echo "原訂購數量: <font color=red size=5>". $ordqty."</font>"; 
?>
<form action="upd_car2.php" method="post">
  修改訂購量:
  <input type="text" name="new_ordqty" size=4>
  <input type="submit" value="修改儲存">
</form>