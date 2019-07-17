<?php 
  require("connmysql.php");
  $sql_query = "select * from stock order by gdno"; //設定sql查詢資料語句
  $result = mysql_query($sql_query); //執行查詢,結果置於變數物件中
  $total_records = mysql_num_rows($result); //將查得筆數置於變數中
  if ($total_records==0) die("查詢結果:尚無資料!.....");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<h1 align="center">商品資料庫存明細(2)</h1>
<p align="center">目前資料筆數：<?php echo $total_records;?>
<table border="1" align="center" bgcolor="#99FF99">
<?php
  $n=1;  
  while($row_result=mysql_fetch_assoc($result)){    
    if($n % 4 == 1 ) echo "<tr color=#2020cc>";
      echo "<form action=putcar.php method=post>"; 
	  echo "<td align=center width=200>";
	  echo "<img src=./imgs5/".$row_result["photo"]." width=140 height=140><br>";
	  echo "<font align=left>商品編號：".$row_result["gdno"]."<br>";
      echo "商品名稱：".$row_result["gdname"]."<br>";
      echo "售價：".$row_result["saleprice"]."元<br>";
	  echo "訂購數量：<input type=text name=txt_ordqty size=4>";
	  echo "<input type=hidden name=txt_gdno value=".$row_result["gdno"].">";
	  echo "<input type=hidden name=txt_gdname value=".$row_result["gdname"].">";
	  echo "<input type=hidden name=txt_price value=".$row_result["saleprice"].">";
	  echo "<input type=submit value=訂購>";
	  echo "</td></form>"; 
      $n++;
      if ($n>$total_records) break;	  
  }	
  echo "</tr></table></center>";
?> 