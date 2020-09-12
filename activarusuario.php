<?php
//incluyo libreria de nusoap y mi php de conexion
require_once("../lib/nusoap.php");
require_once("conexion.php");

// url donde tengo las funciones para buscar , agregar y modificar datos. En nuestro caso la url donde esta el archivo php servicios.php
$url= "http://localhost/Usuarios/servicios.php";
$usuario=new nusoap_client($url."?wsdl", 'wsdl');

// ingresa el parametro que viene desde el archivo HTML
$miusuario=$_GET["usuario"];

// ejecuto la funcion MisUsuarios para realizar el log
$usuarios=$usuario->call('activoUsuario', array("usuario"=>$miusuario),'uri:'.$url, 'uri'.$url.'/activoUsuario');

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