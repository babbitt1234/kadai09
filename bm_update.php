<?php
//1.POSTで取得
$id     = $_POST["id"];
$name   = $_POST["name"];
$url    = $_POST["url"];
$coment = $_POST["coment"];

//2.DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db30;charset=utf8;host=127.0.0.1','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//3.UPDATE gs_bm-table SET; で更新
$update = $pdo->prepare("UPDATE gs_bm_table SET name=:name, url=:url, coment=:coment WHERE id=:id");
$update ->bindValue(':name', $name, PDO::PARAM_STR);
$update ->bindValue(':url', $url, PDO::PARAM_STR);
$update ->bindValue(':coment', $coment, PDO::PARAM_STR);
$update ->bindValue(':id', $id, PDO::PARAM_INT);
$status = $update->execute();

//4.データ登録処理後
if($status==false){
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  header("Location: select_reg.php");
  exit;
}


?>