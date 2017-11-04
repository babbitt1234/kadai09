<?php

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db30;charset=utf8;host=127.0.0.1','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//2．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//3．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
      $view .="<tr>";
      $view .="<td>";
      $view .= '<a href="bm_u_detail_view.php?id='.$result["id"].'">'.$result["name"].'</a>';
      $view .="</td>";
      $view .="<td>";
      $view .=$result["lid"];
      $view .="</td>";
      $view .="<td>";
      $view .=$result["lpw"];
      $view .="</td>";
      $view .='<td>';
      $view .='<a href="delete.php?id='.$result["id"].'">'.'[削除]'.'</a>';
      $view .="</td>";
      $view .="</tr>";
  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<!--<head>-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍のアーカイブ</title>
<link  href="css/list.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
    <div class="container-fluid">
        <div class="tittle">ユーザー一覧</div>
        <div><a href="select_man.php">書籍登録一覧に戻る</a></div>
    </div>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
<table>
<tr>
<th>ユーザー名</th>
<th>ユーザーID</th>
<th>ユーザーPASSWORD</th>
<th>削除</th>
</tr>
<?=$view?>
</table>
</div>
<!-- Main[End] -->

</body>
</html>
