
<?php
$base_dir  = getcwd()  . "/" . "directory" . "/";

if( isset($_POST['dir']) )
{
	$base_dir = $_POST['dir'];
	echo ($base_dir . '<br/>');
}

include 'deldir.php';
if( isset($_POST['delete']) )
{
removeDirectory($_POST['delete']);
}

if( isset($_POST['delfile']) )
{
unlink($_POST['delfile']);
} 

if( isset($_FILES['userfile']) )
{
	copy (  $_FILES['userfile']['tmp_name'] , $base_dir. $_FILES['userfile']['name']   );
	// echo ($_FILES['userfile']['tmp_name'] . "_    _" . $base_dir. $_FILES['userfile']['name']);
}


$skip = array('.', '..');
echo ($base_dir . '<br/>');
$files = scandir($base_dir);


echo('<form enctype="multipart/form-data" action="show.php" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить файл" />
</form>');

/*echo('<form action ="show.php" method =POST>
Директория<input type=text name="ndir" value="">
<input type =submit value="Создать"></form>'); 

	if(isset($_POST["ndir"]))
	{
		$base_dir = $_POST['dir'];
		mkdir(  "/".$base_dir ."/".$_POST["ndir"], 0777);
		//header("Refresh:0");
	}*/
	

foreach($files as $file) {

	$curent_item = $base_dir   . $file .'/';
	$curent_file = $base_dir   . $file;
	if($file != "." && $file != "..")
    if(is_dir($curent_item)) 
	{
		echo '<form action ="show.php" method =POST>
		<div style="display:flex; flex-direction: row; justify-content: left; align-items: left">
		<img  src="https://beginpc.ru/images/windows/folder.jpg" align="left" width="40" height="50">
		<b> Is dir  "' .$file.'"</b>
		<button name="delete" type="submit" value="'.$curent_item.'">del</button>
		<button name="dir" type="submit" value="'.$curent_item.'">Go</button>
		</div></form>';
	}
	else
	{
		echo ('<form action ="show.php" method =POST>
		<div style="display:flex; flex-direction: row; justify-content: left; align-items: left">
		<img  src="https://beginpc.ru/images/windows/file.jpg" align="left" width="40" height="50">
		Is file  "' .$file . '"
		<button name="delfile" type="submit" value="'.$curent_file.'">del</button>
		</div></form>');
		
	}
		//$filelist .= sprintf('<option value="%s">%s</option>' . PHP_EOL, $file, $file );
	

	//if(!in_array($file, $skip)){}
}

 
echo ('<form action ="show.php" method =POST>
	
		<div style="display:flex; flex-direction: row; justify-content: left; align-items: lef">
		<button name="dir" type="submit" value="'.$base_dir. '../'.'">Перейти вверх... </button></div>
		</form>'. '<br/>');
?>
