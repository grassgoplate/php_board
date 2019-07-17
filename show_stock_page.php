<?php 
  require("connmysql.php");
  
  $page_recs = 10; //設定每頁面顯示的商品筆數
  $pages = 1; //預設頁數
  if (isset($_GET['page'])){ 
    $pages = $_GET['page'];} //若按上下頁時，將頁數更新
  $start_recs = ($pages -1) * $page_recs; //每頁開始的位置
  $sql= "SELECT * FROM stock order by gdno ";//未限筆數時敘述句
  $sql_limit = $sql." LIMIT ".$start_recs.", ".$page_recs; //限制顯示筆數時
  $result = mysql_query($sql_limit);
  $all_result = mysql_query($sql); //執行sql查詢
  $total_recs = mysql_num_rows($all_result); //計算總筆數
  $total_pages = ceil($total_recs/$page_recs); //計算總頁數,以ceil函數無條件進位
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body bgcolor="#FFFF99">
<?php
  if ($total_pages != 0) {
    echo "<center>總共 ". $total_recs." 筆資料， ";
    echo "每頁 ".$page_recs." 筆，";
    echo "共有 ".$total_pages." 頁，";
    echo "目前在第 ".$pages." 頁";
    echo "<br><table border=1 bgcolor=#99FF99><tr align=center>";
    echo "<td bgcolor=#FFE7C6><b>商品編號</b></td>"; 
    echo "<td bgcolor=#FFE7C6><b>產品名稱</b></td>";
    //echo "<td bgcolor=#FFE7C6><b>廠商編號</b></td>";
    //echo "<td bgcolor=#FFE7C6><b>進價</b></td>";
    echo "<td bgcolor=#FFE7C6><b>售價</b></td>";
    echo "<td bgcolor=#FFE7C6><b>庫存數量</b></td>";
    echo "<td bgcolor=#FFE7C6><b>實體圖示</b></td>";
    echo "<td bgcolor=#FFE7C6><b>訂購<br>數量</b></td>";
    echo "<td bgcolor=#FFE7C6><b>置入<br>購物車</b></td>";
    echo "</tr>";   
    $i=1;
    While($row_result=mysql_fetch_assoc($result)){ 
      echo "<tr color=#2020cc>";
      echo "<form action=putcar.php method=post>";
      echo "<td>".$row_result["gdno"]."</td>";
      //echo "<td><a href=show_singgd.php?pic=".$row_result["photo"]."&no=".$row_result["gdno"]."&gdname=".$row_result["gdname"].">". $row_result["gdname"]."</a></td>";
	  echo "<td>".$row_result["gdname"]."</td>";
      //echo "<td>". $row_result["suno"]."</td>";
      //echo "<td>".$row_result["inprice"]."</td>";
      echo "<td>".$row_result["saleprice"]."</td>";
      echo "<td>".$row_result["stockqty"]."</td>";
	  echo "<td align=center>";
	  echo "<a href=show_singgd.php?pic=".$row_result["photo"]."&no=". $row_result["gdno"]."&gdname=".$row_result["gdname"].">";
	  echo "<img src=imgs5/".$row_result["photo"]." width=40 height=40></a></td>";
	  echo "<td><input type=text name=txt_ordqty size=4></td>";
	  echo "<input type=hidden name=txt_gdno value=".$row_result["gdno"].">";
	  echo "<input type=hidden name=txt_gdname value=".$row_result["gdname"].">";
	  echo "<input type=hidden name=txt_price value=".$row_result["saleprice"].">";
	  echo "<td><input type=submit value=訂購></td></form>";
	  echo "</tr>";
    }
    echo "</table>";
    echo "<table>";
    echo " <tr><td>";
    if ($pages >1) echo " <a href=show_stock_page.php?page=". ($pages - 1) .">[上一頁]</a>";
    if ($pages < $total_pages) echo " <a href=show_stock_page.php?page=" .($pages + 1) .">[下一頁]</a>";
    echo "<a href=show_stock_page.php?page=1>[第一頁]</a>";
    echo "<a href=show_stock_page.php?page=".$total_pages. ">[最後頁]</a></td>";
  } ?>
  </tr>
</table>
</center>
</body>
</html>