<?php
//incluyo libreria de nusoap y mi php de conexion
require_once("../lib/nusoap.php");
require_once("conexion.php");

// url donde tengo las funciones para buscar , agregar y modificar datos. En nuestro caso la url donde esta el archivo php servicios.php
$url= "http://localhost/Usuarios/servicios.php";
$usuario=new nusoap_client($url."?wsdl", 'wsdl');

// ingresa el parametro que viene desde el archivo HTML
$miusuario=$_POST["username"];
$mipassword=$_POST["password"];
$miemail=$_POST["email"];

$con="INSERT INTO usuarios(username, email, passwordd , estado) VALUES ('$miusuario','$miemail', $mipassword', '1')";
$resultado=mysqli_query(conectar::con(), $con); 

// ejecuto la funcion MisUsuarios para realizar el log
$usuarios=$usuario->call('AltaDeUsuarios', array("usuario"=>$miusuario),'uri:'.$url, 'uri'.$url.'/AltaDeusuarios');

if ($usuario->fault){
    echo "Error";
} else {
    if ($usuario->get_Error()){
        echo "Error";
    } else {
        print_r($usuarios);
    }
}
?>