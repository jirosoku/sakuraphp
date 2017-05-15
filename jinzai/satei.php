<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>売却可能性査定サイト</title>
</head>
<body>

<?php
    $dcf = array( 
    'name' => $_POST['name'],
    'sector' => $_POST['sector'],
    'fcf' => $_POST['fcf'],
    'wacc' => $_POST['wacc']
    );
   $test = $_POST['sector'];
    echo $dcf['name'];
    echo htmlspecialchars($_POST['sector']);
    echo htmlspecialchars($test);
    
    $value = $dcf['fcf'] / 2; 
    if ($dcf['sector'] == '製造業'){
      $comp = 500;
     }else{
      $comp = 100;
     }
     
   if($value > $comp){
        $chance ="売却可能性高です。";
        }else{
        $chance ="売却可能性低です。";
        }
    echo $_POST['name'] ."の価値は、";
    echo $value."百万円です。";
    echo "同業他社の価値は、".$sector."百万円です。";
    echo "同業他社と比べた場合の売却可能性は、".$chance;

?>
</body>
</html>