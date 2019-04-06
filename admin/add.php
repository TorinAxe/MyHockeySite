<?
session_start ();
header('Content-Type: text/html; charset=utf-8');
if($_SESSION['admin_example'])
{
$info = '<button class="btn middle" type="button" onclick="showLoginForm()"><a href="adminindex.php">Выход </a></button>';
}
else
{
    echo 'У вас недостаточно прав для просмотра данной информации! ';
    echo '<html> <head> <meta http-equiv="Refresh" content="2; URL=adminindex.php"> </head> <body> </body> </html>';
    exit;
}
?>
<!DOCTYPE HTML PUBLIC  "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Админка</title>
</head>
<body>
<form   action="chetbd.php" method="post" enctype="multipart/form-data">
    <p align=left>Название<input type="text" name="name" placecholder="name"></p>
    <p align=left>Цена<input type="text" name="cost" placecholder="name"></p>
    <p align=left>Количество <input type="text" name="kol-vo" placecholder="name"></p>
    <p align=left>Описание <input type="text" name="discription" placecholder="name"></p>
    <p align=left>Категория <input type="text" name="items" placecholder="name"></p>
    <input type="file" name="image">
    <input type="submit" value="Загрузить">
</form>
</body>
<? echo $info ?>
</html>