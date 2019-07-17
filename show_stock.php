<?php
  require("connmysql.php");  
  $sql = "SELECT * FROM stock order by gdno"; //設SQL指令
  //$sql = "SELECT * FROM stock where gdname like '%牛%'"; 
  $result = mysql_query($sql); //執行SQL
  $total_records = mysql_num_rows($result); //取得總筆數
  echo "<html><head></head><body><center><font size=5 color=blue>商品資料明細(1)<br>";
  echo "查詢筆數：<font size=5 color=red>".$total_records;
  echo "<table border=1 align=center>";//以表格顯示資料
  echo "<tr bgcolor=#FFB573>"; //印欄標題
  echo "<th>商品編號</th>";
  echo "<th>商品名稱</th>";
  echo "<th>廠商編號</th>";
  echo "<th>進價</th>";
  echo "<th>售價</th>";
  echo "<th>庫存量</th>";
  echo "<th>安全存量</th>";
  echo "</tr>";
  
  while($row_result=mysql_fetch_assoc($result)){ //逐筆顯示
    //echo "<form action='putcar.php' method='post'>";
    echo "<tr>";	
	echo "<td>".$row_result["gdno"]."</td>"; 
	echo "<td>".$row_result["gdname"]."</td>";
	echo "<td>".$row_result["suno"]."</td>";
	echo "<td>".$row_result["inprice"]."</td>";
	echo "<td>".$row_result["saleprice"]."</td>";
	echo "<td>".$row_result["stockqty"]."</td>";
	echo "<td>".$row_result["safeqty"]."</td>";	
    echo "</tr>";
    //echo "</form>";	
  }
  echo "</table></center></body></html>";
?>