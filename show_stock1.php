<?php
  require("connmysql.php");
  
  $sql = "SELECT * FROM stock order by gdno"; 
  //$sql = "SELECT * FROM stock where gdname like '%牛%'"; 
  $result = mysql_query($sql); 
  $total_records = mysql_num_rows($result); 
  echo "<html><head></head><body><center><font size=5 color=blue>商品資料明細(1)<br>";
  echo "查詢筆數：<font size=5 color=red>".$total_records;
  echo "<table border=1 align=center>";
  echo "<tr bgcolor=#FFB573>";
  echo "<th>商品編號</th>";
  echo "<th>商品名稱</th>";
  //echo "<th>廠商編號</th>";
  //echo "<th>進價</th>";
  echo "<th>售價</th>";
  echo "<th>庫存量</th>";
  //echo "<th>安全存量</th>";
  echo "<th>實體圖式</th>";
  echo "<th bgcolor=#FFE7C6>訂購<br>數量</th>";
  echo "<th bgcolor=#FFE7C6>置入<br>購物車</th>";
  echo "</tr>";
  $n=1;   
  while($row_result=mysql_fetch_assoc($result)){ 
    echo "<form action='putcar.php' method='post'>";
	if($n % 2 ==1){ //奇偶數列以不同背景顯示	
	  echo "<tr bgcolor=#A5DE94>";}
	else{
	  echo "<tr bgcolor=#949CCE>";}
	$n++;  
	echo "<td><a href=show_singgd.php?no=".$row_result["gdno"]."&gdname=".$row_result["gdname"]."&price=".$row_result["saleprice"]."&pic=".$row_result["photo"].">".$row_result["gdno"]."</a></td>"; 
	echo "<td>".$row_result["gdname"]."</td>";
	//echo "<td>".$row_result["suno"]."</td>";
	//echo "<td>".$row_result["inprice"]."</td>";
	echo "<td>".$row_result["saleprice"]."</td>";
	echo "<td>".$row_result["stockqty"]."</td>";
	//echo "<td>".$row_result["safeqty"]."</td>";
	//echo "<td><img src=./image1/".$row_result["photo"]." width=50 height=50></td>";
	echo "<td align=absmiddle><a href=show_singgd.php?no=".$row_result["gdno"]."&gdname=".$row_result["gdname"]."&price=".$row_result["saleprice"]."&pic=".$row_result["photo"].">"."<img src=./imgs5/".$row_result["photo"]." width=50 height=50>"."</a></td>";
	echo "<td><input type='text' name='txt_ordqty' size=2 style=font-size:20;color:blue;width:40;></td>";
  echo "<td><input type='submit' value='訂購' style=color:red;font-size:20;></td>";
  echo "<input type='hidden' name='txt_gdno' value='".$row_result["gdno"]."'>";
  echo "<input type='hidden' name='txt_gdname' value=".$row_result["gdname"].">";
  echo "<input type='hidden' name='txt_price' value=".$row_result["saleprice"].">";
  echo "</form>";
	echo "</tr>";
  }
  echo "</table></center></body></html>";
?>