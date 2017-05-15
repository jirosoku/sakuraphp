<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>事業入札画面</title>
<script type="text/javascript"><!--指値画面を小窓で表示する。-->
function m_win(url,windowname,width,height) {
 var features="location=no, menubar=no, status=yes, scrollbars=yes, resizable=yes, toolbar=no";
 if (width) {
  if (window.screen.width > width)
   features+=", left="+(window.screen.width-width)/2;
  else width=window.screen.width;
  features+=", width="+width;
 }
 if (height) {
  if (window.screen.height > height)
   features+=", top="+(window.screen.height-height)/2;
  else height=window.screen.height;
  features+=", height="+height;
 }
 window.open(url,windowname,features);
}
</script> 
</head>
<body>

<form action="sashine.php" method="GET">
  <p>この事業の買収希望金額を入力する</p>
  <p>
    <label for="price">金額（円）:</label>
    <input type="number" name="price" id="price" required>
  </p>
  <p>
    <input type="submit"  value="送信">
    <input type="reset"  value="リセット">
	<a href="sashine.php" onclick="m_win(this.href,null,600,400); return false;">入札状況を開く</a>
  </p>
</form>


</label>
</body>
</html>