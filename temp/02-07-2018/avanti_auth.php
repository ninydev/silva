


<pre>
<?php
session_start ();



var_dump( $_POST);
var_dump( $_GET);

var_dump( $_SESSION);
/*
var_dump( $_SERVER);
var_dump( $_COOKIE);
*/

?>

<?php
if (isset ($_GET['doLogin'])) {
  echo ' Нажата клавиша войти и надо делать вход пользователя';
  if ($_GET['login'] ==  'admin' && $_GET['password'] == 'admin'){
    echo 'Пришли сови - надо запоминать';
    $_SESSION ['user_id'] = 1;
    $_SESSION ['user_name'] = 'Admin';
    header ('Location: ' . $_SERVER['PHP_SELF']);

  } else {
    echo ' не вреный логин и пароль';
  }
}

if (isset ($_GET['doLogout'])){
  session_destroy ();
  header ('Location: ' . $_SERVER['PHP_SELF']);
}

 ?>
</pre>


<?php
if (!isset($_SESSION['user_id'])) {
 ?>
<br/><div><form action="<?=$_SERVER['PHP_SELF']?>" method="GET" ><input  type="hidden"  name="doLogin"  id="doLogin"  class=""  />
<br/><label for="login">Логин</label><input  type="text"  name="login"  id="login"  class=""  />
<br/><label for="password">Пароль</label><input  type="password"  name="password"  id="password"  class=""  />
<br/><input type="reset" />
<br/><input type="submit" /></div>
<?php
}
else {
  echo $_SESSION ['user_id'] .  $_SESSION ['user_name'] ;
  echo '<a href="' . $_SERVER['PHP_SELF'] .'?doLogout=true" > Выход </a>';
}
