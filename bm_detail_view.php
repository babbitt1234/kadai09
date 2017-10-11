<?PHP
session_start();

include("functions.php");

//1.GETでid値を取得
$id = $_GET["id"];

//2.DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db30;charset=utf8;host=127.0.0.1','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//3.データ登録SQL
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
//実行する
$status = $stmt->execute();

//4.データ表示
$view = "";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍のアーカイブ</title>
  <link href="css/bm_detail_view.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<header>
  <nav>
    <div class="container-fluid">
        <div class="tittle">書籍のアーカイブ</div>
    </div>
  </nav>
</header>

  <div>
   <fieldset>
     <legend class="legend">書籍内容</legend>
     <label>書籍の名前：<?=$row["name"]?></label><br>
     <label>書籍のURL：<?=$row["url"]?></label><br>
     <label>読んだ感想•コメント：<?=$row["coment"]?></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
    </fieldset>
    <div><a href="select_gen.php">書籍登録一覧に戻る</a></div>
  </div>

</body>
</html>
