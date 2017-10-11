<?php

//1.DB接続 
try {
  $pdo = new PDO('mysql:dbname=gs_db30;charset=utf8;host=127.0.0.1','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//2.データ登録SQL
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY id DESC");
//SQL実行
$status = $stmt->execute();

//3.データ表示
$view = "";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //selectデータの数だけ自動でループしてくれる
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
      
      $view .="<tr>";
      $view .="<td>";
      $view .=$result["indate"];
      $view .="</td>";
      $view .="<td>";
      $view .='<a href="bm_detail_view.php?id='.$result["id"].'">'.$result["name"].'</a>';
      $view .="</td>";
      $view .="<td>";
      $view .=$result["url"];
      $view .="</td>";
      $view .="<td>";
      $view .=$result["coment"];
      $view .="</td>";
      $view .="</tr>";

  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍のアーカイブ</title>
<link href="css/select_gen1.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/jquery.quicksearch.js" type="text/javascript"></script>
<header>
    <div class="container-fluid">
        <div class="tittle">書籍のアーカイブ</div>
        <div class="login"><a href="login.php">ログイン</a></div>
    </div>
</header>

<p class="list">書籍登録一覧</p>
<form action="#">
    <p>書籍登録書籍検索　<input type="text" name="search" value="" id="search" /></p>
</form>
<table>
<tr>
<th>時間</th>
<th>書籍の名前</th>
<th>書籍のURL</th>
<th>読んだ感想•コメント</th>
</tr>
<?=$view?>
</table>

<div>※タイトル（書籍の名前）をクリックすると内容の詳細が確認できます</div>

<script>
    $(function(){
        $('input#search').quicksearch('table tbody tr');
    });
</script>

</body>

</html>
