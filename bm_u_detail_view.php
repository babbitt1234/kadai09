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
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
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
  <link href="css/bm_u_detail_view.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <div class="container-fluid">
        <div>ユーザー詳細</div>
        <div><a href="u_list.php">ユーザー一覧に戻る</a></div>
    </div>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!--<form method="post" action="u_insert.php">-->
  <div>
   <fieldset>
    <legend>登録内容</legend>
     <label>名前：<?=$row["name"]?></label><br>
     <label>ログインID：<?=$row["lid"]?></label><br>
     <label>ログインPASSWORD：<?=$row["lpw"]?></label><br>
<!--     <label><input type="radio" name="kanri_flg" value="0">私はルールを守ります</label><br>-->
<!--
     <label><input type="radio" name="kanri_flg_0" value="0">管理者</label>
     <label><input type="radio" name="kanri_flg" value="1">スーパー管理者</label><br>
     <label><input type="radio" name="life_flg" value="0">使用中</label>
     <label><input type="radio" name="life_flg" value="1">使用しなくなった</label><br>
-->
<!--     <input type="submit" value="登録">-->
    </fieldset>
  </div>
<!--</form>-->
<!-- Main[End] -->


</body>
</html>
