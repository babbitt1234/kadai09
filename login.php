<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="css/login1.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>書籍のアーカイブ</title>
</head>
<body>

<header>
  <div class="container-fluid">
      <div class="login">書籍のアーカイブ</div>
      <div>初めての方は<a href="u_index.php">こちら</a></div>
      <div><a href="man_login.php">管理者ページ</a></div>
 </div>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<div>
<fieldset>
<legend class="legend">ログイン</legend>
<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" /><br>
<input type="submit" value="ログイン" />
</form>
</fieldset>
</div>
<div><a href="select_gen.php">書籍登録一覧を見る</a></div>

</body>
</html>