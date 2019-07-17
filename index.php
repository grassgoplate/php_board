<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style type="text/css">
a{
	display: block;  /*inline;  */
	width:70px;
	float:left;
	height:40px;
	background-color:#9c9;
	color:#030;
	text-align:center;
	line-height:20px;
	text-decoration:none;
	border-right:1px solid red;
	border-left:1px solid red;
	
}
a:visited{
	background-color:#FFCE9C;
	color:#666;
}
a:hover{
	background-color:#06f;
	color:#FFF;
}
p{
	font-size:10pt;
}
.div1{
	width:90%;	
}
.div2{
	width:90%;
	height:600px;
}
</style>
</head>

<body>

<div class="div1">
  <p>
  <a href="show_stock1.php" target="w2">顯示商品-1</a>
  <a href="show_stock_9c.php" target="w2">顯示商品-2</a>
  <a href="show_stock_page.php" target="w2">顯示商品-3</a>
  <a href="show_car.php" target="w2">檢視購物車</a>
  <a href="show_car2.php" target="w2">更改購物車</a>
  <a href="#4">服務專區</a>
  <a href="#5">聯絡我們</a>
</p>
</div><br><br>

<iframe class="div2" src="show_stock1.php" name="w2" >
</iframe>

</body>
</html>