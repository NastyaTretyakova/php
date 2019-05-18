<?php
	unlink(($a = $_POST['delf']));
	echo '<html> <body>';
	echo '<p>Файл удален</p>';
	echo'<a href= "http://127.0.0.1/kyrsovaya/base.php">Назад</a>';
	echo '</html> </body>';
?>