<?php
  //$userid="111111";
  //$username="aaaaasssss";
  session_start();
  $userid=$_SESSION["userid"];
  $username=$_SESSION["username"];
  header("Content-Type: text/html; charset=utf-8");
  require("connmysql.php");
  
  $strsql = "SELECT * FROM orditems WHERE userid='".$userid."'";  
  $result = mysql_query($strsql);
  $total_records = mysql_num_rows($result);
  
?>
<html>
<body bgcolor="#FFFF99">
<center><br>
<?php
If ($total_records>0){ 
  echo "[訂購者ID]：<font color=red>".$userid."</font>&nbsp; [訂購者名稱]：<font color=red>".$username."</font>";
  $tot_qty=0;
  $tot_price=0;
?>
 <br>
 <table border=1 bgcolor="#99FF99">
  <tr align=center>
   <td bgcolor="#f0caa0">是否<br>刪除</td>
   <td bgcolor="#f0caa0">序號</td>
   <td bgcolor="#f0caa0">訂購日期</td>
   <td bgcolor="#f0caa0">商品編號</td>
   <td bgcolor="#f0caa0">商品名稱</td>
   <td bgcolor="#f0caa0">訂購單價</td>
   <td bgcolor="#f0caa0">訂購數量</td>
   <td bgcolor="#f0caa0">小計金額</td>
   <td bgcolor="#f0caa0">修改<br>訂購量</td>
   </tr>
  
<?php
  while($row_result=mysql_fetch_assoc($result)){ 
	echo "<tr align=center>";
	echo "<form  method='post'>
   <td><a href=Del_car.php?autono=".$row_result["ord_autono"].">刪除</a></td>";
    echo "<td>".$row_result["ord_autono"]."</td>";
	echo "<td>".$row_result["ord_date"]."</td>"; 
	echo "<td>".$row_result["ord_gdno"]."</td>";
	echo "<td>".$row_result["ord_gdname"]."</td>";
	echo "<td>".$row_result["ord_price"]."</td>";
	echo "<td>".$row_result["ord_qty"]."</td>";
	echo "<td>".$row_result["ord_price"]* $row_result["ord_qty"]."</td>";
	echo "<td><a href=upd_car1.php?autono=".$row_result["ord_autono"]."&mgdno=".$row_result["ord_gdno"]."&mgdname=".$row_result["ord_gdname"]."&mprice=".$row_result["ord_price"]."&mordqty=".$row_result["ord_qty"].">修改</a></td>";
	echo "</tr>";
	$tot_qty=$tot_qty+$row_result["ord_qty"];
	$tot_price=$tot_price+$row_result["ord_price"]* $row_result["ord_qty"];
  } 
?>
</table>
<?php   
  echo "<br>訂購數量合計：<font color=red>".$tot_qty." 件</font>    訂購金額總計：<font color=red>".$tot_price." 元</font>";
  echo "&nbsp;&nbsp;<a href=car2ord.php?userid=".$userid.">[確認訂購]</a>";
  } 
  Else{
    echo "<p><b>您尚未選購商品!</b></p>";
  }
?>
</center>
</body>
</html>	