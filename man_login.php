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
      <div class="login">書籍のブックマーク</div>
      <div><a href="login.php">ログイン画面に戻る</a></div>
  </div>
</header>

<div>
<fieldset>
<legend class="legend">管理者ログイン</legend>
<form name="form1" action="man_login_act.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" /><br>
<input type="radio" name="kanri_flg" value="1">私は管理者です<br>
<input type="submit" value="ログイン" />
</form>
</fieldset>
</div>

</body>
</html>