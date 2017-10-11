<?PHP
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
  <link href="css/bm_update_view.css" rel="stylesheet">
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

<form method="post" action="bm_update.php">
  <div>
   <fieldset>
    <legend>内容変更</legend>
     <label>書籍の名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>書籍のURL：<input type="text" name="url" value="<?=$row["url"]?>"></label><br>
     <label>読んだ感想•コメント<textArea name="coment" rows="4" cols="40"><?=$row["coment"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="変更">
    </fieldset>
    <div><a href="select_reg.php">登録一覧に戻る</a></div>
  </div>
</form>

</body>
</html>
