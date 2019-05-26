<html>
	<head>
	 <meta charset="utf-8">
	 <title>Файловый менеджер</title>
	</head>
	<body>
	
<?php








$base_dir = getcwd() . "/" . "directory" . "/";

if (isset($_POST['dir'])) {
    $base_dir = $_POST['dir'];
    echo ($base_dir . 'Открыть директорию<br/>');
}

include 'deldir.php';
if (isset($_POST['delete'])) {
    removeDirectory($_POST['delete']);
}

if (isset($_POST['delfile'])) {
    unlink($_POST['delfile']);
}

if (isset($_FILES['userfile'])&& $_POST['userfile']!="") {
    copy($_FILES['userfile']['tmp_name'], $base_dir . $_FILES['userfile']['name']);
}

if (isset($_POST["ndir"])&&$_POST["ndir"]!="") {
    mkdir($base_dir . $_POST["ndir"], 0777);
    }



$skip = array('.','..');
$base_dir = getcwd() . "/" . "directory" . "/";
//echo ($base_dir . '<br/>'); //не обязательно
$files = scandir($base_dir);

echo "<form action ='show.php' method =POST>
Директория<input type=text name='ndir' value=''>
<input type='hidden' name='dir' value='' . $base_dir . ''>
<input type =submit value='Создать'></form>";


echo ('<form enctype="multipart/form-data" action="show.php" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
	<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
	<input type="hidden" name="dir" value="' . $base_dir . '">
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file"/>
    <input type="submit" value="Отправить файл"/>
</form>');

echo('<form action ="show.php" method =POST>
        <div style="display:flex; flex-direction: row; justify-content: left; align-items: lef">
        <button name="dir" type="submit" value="'.$base_dir. '../'.'">Перейти вверх... </button></div>
		</form>');

echo ('<table border="1">
	<caption>....</caption>
	<tr>
	 <th> </th>
	 <th>Имя файла</th>
	 <th>Последнее время доступа:</th>
     <th>Размер</th>
     <th>Последнее изменение</th>
	 <th>Удалить</th>
	</tr>');

foreach ($files as $file) {
    
    $curent_dir  = $base_dir . $file . '/'; //
    $curent_file = $base_dir . $file;
    $stat        = stat($curent_file);
    $statall     = "";
    $statlasttime    = "";
    $objectsize = '...';
    
    if (!$stat) {
        $statall = 'вызов stat() не удался...';
    } else {
        $statall = date("F d Y H:i:s.", $stat['atime']);
        $statlasttime = date("F d Y H:i:s.",$stat['mtime']);
    }
    
    if ($file != "." && $file != "..") { //ссылки на текущую и родительскую директорию
        $objectname      = $file; //имя папки/файла
        $objectimg       = 'empty';
        $objectdelaction = '';
        if (is_dir($curent_dir)) {
            $objectimg       = "folder.jpg";
            $dirimg          = '<form action ="show.php" method =POST>' . '<button type="submit" name="dir"  value="' . $curent_dir . '">' . '<img  src="' . $objectimg . '"align="left" width="10" height="15">' . '</button></form>';
            $objectdelaction = '<form action ="show.php" method =POST><input type="hidden" name="dir" value="' . $base_dir . '">' . '<button type="submit" name="delete"  value="' . $curent_dir . '">Удалить' . '</button></form>';
            echo (' <tr><td>' . $dirimg . '
		</td><td>' . $objectname . '</td><td>' . $statall . '</td><td>' . $objectsize . '</td><td>' . $statlasttime . '</td><td>' . $objectdelaction . '</td></tr>');
        }
        
    }
}
foreach ($files as $file) {
    
    $curent_dir  = $base_dir . $file . '/';
    $curent_file = $base_dir . $file;
    $stat        = stat($curent_file);
    $statall     = "";
    $statlasttime    = "";
    if (!$stat) {
        $statall = 'вызов stat() не удался...';
    } else {
        $statall = date("F d Y H:i:s.", $stat['atime']);
        $statlasttime = date("F d Y H:i:s.",$stat['mtime']);
    }
    $objectsize = '...';
    
    //ссылки на текущую и родительскую директорию
    $objectname      = $file; //имя папки/файла
    $objectimg       = 'empty';
    $objectdelaction = '';
    if (!is_dir($curent_dir)) {
        $objectimg  = "file.jpg";
        $objectsize = $stat['size'];
        $dirimg     = '<center><img  src="'. $objectimg .'" width="20" height="30"></center>';
        $objectdelaction = '<form action ="show.php" method =POST><input type="hidden" name="dir" value="' . $base_dir . '">' . 
        '<button type="submit" name="delfile"  value="' . $curent_file . '">Удалить' . '</button></form>';
        echo (' <tr><td>' . $dirimg . '</td><td>' . $objectname . '</td><td>' . $statall . '</td><td>' . $objectsize . '</td><td>' . $statlasttime . '</td><td>' . $objectdelaction . '</td></tr>');
    }
}
?>
	   </table>
		</body>
	   </html>

