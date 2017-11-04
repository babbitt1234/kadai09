<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍のアーカイブ</title>
  <link href="css/index.css" rel="stylesheet">
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

<form method="post" action="insert.php">
 
  <div>
   <fieldset>
    <legend>書籍の登録</legend>
     <label>書籍の名前：<input type="text" name="name"></label><br>
     <label>書籍のURL：<input type="text" name="url"></label><br>
     <label>読んだ感想•コメント：<textArea name="coment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="登録"><br>
    </fieldset>
    <div><a href="select_reg.php">登録一覧を見る</a></div>
  </div>
</form>

</body>
</html>
