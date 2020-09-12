<?php
class conectar
{
public static function con()
{
 $user="oprateldb";
 $pass="0pr4t3l.!";
 $host="db4free.net";
 $db="opratel";
try {
      $coneccion=mysqli_connect($host, $user , $pass, $db);
      mysqli_select_db($coneccion, $db);
      return $coneccion;
} catch (Exception $e) {
  echo $e->getMessage();
}
return $db;      
}
}
?>