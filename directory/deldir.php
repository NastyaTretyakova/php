
<?php
//$dir=$_POST["deld"];
  function removeDirectory($dir) {
    if ($objs = glob($dir."/*")) {
       foreach($objs as $obj) {
         is_dir($obj) ? removeDirectory($obj) : unlink($obj);
       }
    }
    rmdir($dir);
  }
 // echo '<p>Дирректория удалена</p>';
?>
  
