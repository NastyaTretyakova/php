
 <?php
 $dir = 'directory/'; // Директория для создания страниц
 $a = $_POST["file"];
if (!file_exists($dir.$a)){ // Если файл не существует, то создаем
   $fIn = fopen($dir.$a, 'w+'); // Создаем файл 
  }
  echo '<p>Файл создан</p>';
  echo'<a href= "http://127.0.0.1/kyrsovaya/base.php">Назад</a>';
  ?>