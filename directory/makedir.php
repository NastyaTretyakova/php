<?php
	mkdir($a = $_POST["dir"], 0777);
	echo '<html> <body>';
	echo '<p>Дирректория создана</p>';
	echo'<a href= "http://127.0.0.1/kyrsovaya/base.php">Назад</a>';
	echo '</html> </body>';
?>