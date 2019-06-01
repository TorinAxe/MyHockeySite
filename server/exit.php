<?php
  session_start();

  unset($_SESSION['username']); // разрегистрировали переменную
  session_destroy(); // разрушаем сессию
  $otkuda = $_SERVER['HTTP_REFERER'];
  //echo $otkuda;
  header ("Location: $otkuda");
?>
