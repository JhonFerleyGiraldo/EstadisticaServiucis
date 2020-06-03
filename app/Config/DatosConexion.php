<?php  

	/*
		Archivo encargado de la configuracion de datos
		para la base de datos y rutas estaticas
		tambien del controlador por defecto y metodo por defecto
	*/

	
	//datos conexion sqlserver
    define("DBNAME","HOSVITAL");
	define("DBUSER","sa");
	define("DBPASS","rRDi4dKj4w1Vwl3peXL8");
	define("DBHOST","10.10.10.115");
	define("DBCHARSET","utf8");

	/*INICIO SERVIDOR LOCAL */
/*
	//datos conexion mysql
	define("DBNAMEM","bdestadistica");
	define("DBUSERM","root");
	define("DBPASSM","");
	define("DBHOSTM","localhost");
	
	define("BASEURL","http://localhost/UCI/EstadisticaServiucis/");//para llamados a archivos
	define("BASEPATH","C:\\xampp\\htdocs\\UCI\\EstadisticaServiucis\\");//para imagenes
*/
	/*FIN CONEXION LOCAL*/



	/*INICIO CONEXION SERVIDOR UBUNTU*/
	
	//datos conexion mysql
	define("DBNAMEM",'bdestadistica');
	define("DBUSERM",'userbdestadistica');
	define("DBPASSM",'bdestadistica');
	define("DBHOSTM",'localhost');
	
	define("BASEURL","http://10.10.10.110:8081/serviucis/aplicaciones/EstadisticaServiucis/");//para llamados a archivos
	define("BASEPATH","/var/www/html/serviucis/aplicaciones/EstadisticaServiucis/");//para imagenes
	
	/*FIN CONEXION SERVIDOR UBUNTU*/


	//muestra el controlador si no envia un controlador(controllers) por GET
	define("DefaultController","ControllerLogin");
	// muestra el metodo si no envia una accion(metodo) por GET
	define("ActionDefault", "Iniciar");
	
	define("VERSION","1.1 PROD");

	//indicamos la configuracion de la zona
    date_default_timezone_set("America/Bogota");
    
?>    