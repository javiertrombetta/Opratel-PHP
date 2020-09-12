<?php
//incluyo libreria de nusoap y mi php de conexion
require_once("../lib/nusoap.php");
require_once("conexion.php");

// url donde tengo las funciones para buscar , agregar y modificar datos. En nuestro caso la url donde esta el archivo php servicios.php
$url= "http://localhost/Usuarios/servicios.php";
$usuario=new nusoap_client($url."?wsdl", 'wsdl');

// ingresa el parametro que viene desde el archivo HTML
$miusuario=$_POST["username"];

// ejecuto la funcion MisUsuarios para buscar el usuario que quiero buscar $miusuario
$usuarios=$usuario->call('MisUsuarios', array("usuario"=>$miusuario), 'uri:'.$url, 'uri'.$url.'/MisUsuarios');

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