# Consigna: Parte 1 (PHP)
Primera Consigna: Web Service en SOAP (PHP):

a) Sin utilizar ningún framework, crear un WS en SOAP utilizando las librerías nativas de PHP o en su defecto nusoap.

b) El mismo debe contar con la capacidad de responder 4 tipos de consultas diferentes:

	1- addUser: parámetros: username, password, email (metodo POST, respuesta: status_code = 0)
	2- activateUser: parámetros: username (método POST, respuesta: status_code = 0)
	3- deactivateUser: parámetros: username (método POST, respuesta: status_code = 0)
	4- getUser: parametros: username (metodo GET, respuesta: username, password, email)

c) Create WSDL del servicio.

d) Script service.php con la implementación del WS y el objeto con sus respectivos métodos.

e) Utilizar MySQL para persistir esta información:

f) Loggear en 3 niveles todo lo que se procese: access, debug y error, ej:

	[2019-05-15 10:00:00] INFO - "Procesamos request X | Param1: Y | Param2: Z"
	[2019-05-15 10:00:00] ERROR - "Hubo un error al intentar procesar request X"

g) Ejemplo de consumo via consola de linux usando curl.
