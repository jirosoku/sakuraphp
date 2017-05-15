<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>指値フローティング画面</title>
</head>

<body>
<p>
  <?php
//テスト用ダミー事業などダミーデータを作成。本来はログイン情報などセッション受け渡しするもののため追々実装する。
  $jigyou_id="23456";
  $jigyou_name="テスト用事業";
  $user_id=rand(10000,99999);
  $user_name="テスト用広瀬";
  $bid_date=  $_SERVER[REQUEST_TIME];

//①sashinetop.phpより金額、入札対象事業ID、入札ユーザIDを取得する
  $price=$_GET['price'];

//DB処理スタート
//mysqlへ接続するファイルをコール
  require('dbconnect.php');



//②①の金額をDBに書き込む
  print('<p>データを追加します。</p>');
  $sql = "INSERT INTO sashine (jigyou_id,jigyou_name,user_id,user_name,price,bid_date)
  VALUES ('$jigyou_id','$jigyou_name','$user_id','$user_name','$price','$bid_date')";
  $result_flag = mysql_query($sql);
  
if (!$result_flag) {
    die('INSERTクエリーが失敗しました。'.mysql_error());
}

print('<p>追加後のデータを取得します。</p>');

//③mysql関数で入札対象の事業IDをキーに入札金額と入札ユーザIDを取得する。
  $result = mysql_query('SELECT jigyou_name,user_name,price,bid_date FROM sashine where jigyou_id="23456" order by price desc');
  if (!$result) {
      die('SELECTクエリーが失敗しました。'.mysql_error());
  }
  
$jigyou_name=mysql_query('SELECT distinct jigyou_name from sashine where jigyou_id="23456"');
 if (!$jigyou_name) {
      die('SELECTクエリーが失敗しました。'.mysql_error());
  }

//DBとの接続を切断する
  mysql_close($link);

?>

<!--　④ ①②の金額を金額降順に表示する（テーブル）-->
<!--入札結果の表示画面　フロート-->
</p>
<table width="650" border="5">
 <?php
 	while($table_caption = mysql_fetch_assoc($jigyou_name)) {
    ?>
  <caption>
    指値状況一覧（事業名:<?php print(htmlspecialchars($table_caption['jigyou_name'])); ?>）
  </caption>
   <?php
 }
 ?>

  <tbody>
    <tr>
      <th width=100 scope="col">買収希望額順位</th>
      <th width=100 scope="col">ユーザ名</th>
      <th width=100  scope="col">買収希望額</th>
      <th width=100  scope="col">入札日時</th>
      <th width=100 scope="col">SNSへリンク</th>
      <th width=150 scope="col">このユーザと交渉する（事業の場合のみ見える）</th>
    </tr>
   
    <?php
 	while($table = mysql_fetch_assoc($result)) {
    ?>
 <tr>
  <td><?php print(htmlspecialchars($table['rank'])); ?> </td>
  <td><?php print(htmlspecialchars($table['user_name'])); ?> </td>
  <td><?php print(htmlspecialchars($table['price'])); ?>(円)</td>
  <td><?php print(htmlspecialchars($table['bid_date'])); ?> </td>
  <td><?php print(htmlspecialchars($table['user_url'])); ?> </td>
  <td><?php print(htmlspecialchars($table['nego'])); ?> </td>
 </tr>
  
 <?php
 }
 ?>

 
  </tbody>
</table>
<p>
  <input type="button"  value="ウィンドウを閉じる" onClick="window.close()">
</p>
</body>
</html>
