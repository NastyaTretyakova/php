<title>Файловый менеджер</title>
<fieldset> <legend>Информация о файлах и директориях</legend>
<form action ="show.php" method =POST>
<input type =submit value="Вывести">
</form></fieldset>

<fieldset> <legend>Создание директорий и файлов</legend>
<form action ="makedir.php" method =POST>
Директория<input type=text name="dir" value="">
<input type =submit value="Создать">
</form>
<form action ="addfile.php" method =POST>
Файл<input type=text name="file" value="">
<input type =submit value="Создать">
</form></h5> </fieldset>

<fieldset> <legend>Удаление директорий</legend>
<form action ="deldir.php" method =POST>
<br>Директория <input type=text name="deld" value="">
Выберите директорию <input type=text name="ddir" value="">
<input type =submit value="Удалить">
</form></fieldset>

<fieldset> <legend>Удаление файлов</legend>
<form action ="delfile.php" method =POST>
<br>   Файл  <input type=text name="delf" value=""><br>

<input type =submit value="Удалить">
</form></h5></fieldset>