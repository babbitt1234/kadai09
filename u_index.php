<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍のアーカイブ</title>
  <link href="css/u_index.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <div class="container-fluid">
        <div class="tittle">ユーザー登録</div>
        <div><a href="login.php">ログイン画面に戻る</a></div>
    </div>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="u_insert.php">
  <div>
   <fieldset>
    <legend class="legend">登録内容</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>ログインID：<input type="text" name="lid"></label><br>
     <label>ログインPASSWORD：<input type="text" name="lpw"></label><br>
     <label><input type="radio" name="kanri_flg" value="0">私はルールを守ります</label><br>
<!--
     <label><input type="radio" name="kanri_flg_0" value="0">管理者</label>
     <label><input type="radio" name="kanri_flg" value="1">スーパー管理者</label><br>
     <label><input type="radio" name="life_flg" value="0">使用中</label>
     <label><input type="radio" name="life_flg" value="1">使用しなくなった</label><br>
-->
     <input type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
