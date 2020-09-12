# Consigna: Parte 1 (PHP)
> Primera Consigna: Web Service en SOAP (PHP):

> Sin utilizar ningún framework, crear un WS en SOAP utilizando las librerías nativas de PHP o en su defecto nusoap.

> El mismo debe contar con la capacidad de responder 4 tipos de consultas diferentes:

>	addUser: parámetros: username, password, email (metodo POST, respuesta: status_code = 0)
>	activateUser: parámetros: username (método POST, respuesta: status_code = 0)
>	deactivateUser: parámetros: username (método POST, respuesta: status_code = 0)
>	getUser: parametros: username (metodo GET, respuesta: username, password, email)

> Create WSDL del servicio.

> Script service.php con la implementación del WS y el objeto con sus respectivos métodos.

> Utilizar MySQL para persistir esta información:

> Loggear en 3 niveles todo lo que se procese: access, debug y error, ej:

>	[2019-05-15 10:00:00] INFO - "Procesamos request X | Param1: Y | Param2: Z"
>	[2019-05-15 10:00:00] ERROR - "Hubo un error al intentar procesar request X"


### Seteando el proyecto

Se requiere un inicio de sesión primario para luego dirigir a usuarios.php

### Estructura

La estructura del WS se encuentra diagramado por 3 partes: las opciones brindadas al usuario, la conexión (actualmente apuntando a una base de prueba en la nube) y la decisón por función realizada (y dividiada en archivos distintos). Esto mismo proporciona escabilidad en caso de necesidad.
