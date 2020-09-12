<?php
//incluyo libreria de nusoap y mi php de conexion
require("../lib/nusoap.php");
require_once("conexion.php");

// url donde tengo las funciones para buscar , agregar y modificar datos. En nuestro caso la url donde esta el archivo php servicios.php
$url= "http://localhost/Usuarios/servicios.php";

// armo con las librerias de nuosap el array que me va a devolver
$server = new nusoap_server();
$server->configureSDL("consulta", $url);
$server->wsdl->schemaTargetNamespace=$url;
$server->soap_defencoding='utf-8';
$server->register
        ("MisUsuarios", array("username" => "xsd:string"),
                        array("password" => "xsd:string"),
                        array("estado" => "xsd:string"),
                        array("email" => "xsd:string"), $url);

// funcion para BUSCAR UN USUARIO
function MisUsuarios($usuario)
{
if ($usuario!= "")
{
    $sql="select username, email from usuarios where username='$usuario' . AND estado=1";
} else {
    $sql="select username, email from usuarios  where estado=1 ";
}
try {
$cadena="<usuarios>";
if($resultado1=conectar::con()->query($sql)){    
    $row_cnt = $resultado1->rowCount();
    if ($row_cnt > 0 ){
        foreach(conectar::con()->query($sql) as $row ) {
            $cadena.="<usuario>".$row[0]."</usuario>";
            $cadena.="<br>";
            $cadena.="<email>".$row[1]."</email";
            $cadena.="</usuarios>";
        }
        $misusuarios=new soapval('return', 'xsd:string', $cadena);
        return $cadena;
    } else {
        $cadena="<error>No se encontro Usuario</error>";    
    }    

    if (!isset($HTTP_RAW_POST_DATA)){
        $HTTP_RAW_POST_DATA=file_get_contents('php://input');
        $server->service($HTTP_RAW_POST_DATA);
        $ar =fopen("log.txt", "a") or die("Error en Log.txt");
        fwrite($ar, date());
        fwrite($ar, "\n");
        fwrite($ar, "USUARIO :" . $cadena);
        fwrite($ar, "\n");
    }
}  
} 

catch (Exception $e) {
    echo $e->getMessage();
    $ar =fopen("log.txt", "a") or die("Error en Log.txt");
    fwrite($ar, date());
    fwrite($ar, "\n");
    fwrite($ar, "ERROR - Hubo un error al intentar procesar" . $cadena);
    fwrite($ar, "\n"); 
}  
}

function desactivoUsuario($usuario)
{
if ($usuario != "")
{
    $sql="select username, email from usuarios where username='$usuario' . AND estado=1";
} else {
// genero error por falta de ingreso de un usuario buscado
	$ar =fopen("log.txt", "a") or die("Error en Log.txt");
    fwrite($ar, date());
    fwrite($ar, "\n");
    fwrite($ar, "ERROR - Hubo un error al intentar desactivar" . $cadena);
    fwrite($ar, "\n"); 
}
try {
$cadena="<usuarios>";

if($resultado1=conectar::con()->query($sql)){    
    $row_cnt = $resultado1->rowCount();
    if ($row_cnt > 0 ){
        foreach(conectar::con()->query($sql) as $row ) {
            $cadena.="<usuario>".$row[0]."</usuario>";
            $cadena.="<br>";
            $cadena.="<email>".$row[1]."</password>";
            $cadena.="</usuarios>";
        }
        $misusuarios=new soapval('return', 'xsd:string', $cadena);
        return $cadena;
    } else {
        $cadena="<error>No se encontro Usuario</error>";    
    }    
        $con="UPDATE usuarios SET estado=9 WHERE  username=".$usuario;
        $resultado=mysqli_query(conectar::con(), $con); 
		
    if (!isset($HTTP_RAW_POST_DATA)){
        $HTTP_RAW_POST_DATA=file_get_contents('php://input');
        $server->service($HTTP_RAW_POST_DATA);
        $ar =fopen("log.txt", "a") or die("Error en Log.txt");
        fwrite($ar, date());
        fwrite($ar, "\n");
        fwrite($ar, "USUARIO DESACTIVADO");
        fwrite($ar, $cadena);
        fwrite($ar, "\n");
    }
}  
} 

catch (Exception $e) {
    echo $e->getMessage();
    $ar =fopen("log.txt", "a") or die("Error en Log.txt");
    fwrite($ar, date());
    fwrite($ar, "\n");
    fwrite($ar, "ERROR - Hubo un error al intentar procesar desactivacion  " . $cadena);
    fwrite($ar, "\n");
}  
}

function activoUsuario($usuario)
{
if ($usuario != "")
{
    $sql="select username, email from usuarios where username='$usuario' . AND estado=1";
}
try {
$cadena="<usuarios>";
if($resultado1=conectar::con()->query($sql)){    
    $row_cnt = $resultado1->rowCount();
    if ($row_cnt > 0 ){
        foreach(conectar::con()->query($sql) as $row ) {
            $cadena.="<usuario>".$row[0]."</usuario>";
            $cadena.="<br>";
            $cadena.="<email>".$row[1]."</password>";
            $cadena.="</usuarios>";
        }
        $misusuarios=new soapval('return', 'xsd:string', $cadena);
        return $cadena;
    } else {
        $cadena="<error>No se encontro Usuario</error>";    
    }    
        $con="UPDATE usuarios SET estado=1 WHERE  username=".$usuario;
        $resultado=mysqli_query(conectar::con(), $con); 

    if (!isset($HTTP_RAW_POST_DATA)){
        $HTTP_RAW_POST_DATA=file_get_contents('php://input');
        $server->service($HTTP_RAW_POST_DATA);
        $ar =fopen("log.txt", "a") or die("Error en Log.txt");
        fwrite($ar, date());
        fwrite($ar, "\n");
        fwrite($ar, "USUARIO ACTIVADO");
        fwrite($ar, $cadena);
        fwrite($ar, "\n");
    }
}  
} 

catch (Exception $e) {
    echo $e->getMessage();
    $ar =fopen("log.txt", "a") or die("Error en Log.txt");
    fwrite($ar, date());
    fwrite($ar, "\n");
    fwrite($ar, "ERROR - Hubo un error al intentar procesar activacion" . $cadena);
    fwrite($ar, "\n");     
}  
}
?>










