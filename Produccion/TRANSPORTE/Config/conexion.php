<?php
require_once "global.php";
$servidor= DB_HOST;
$usuario= DB_USERNAME;
$password = DB_PASSWORD;
$base= DB_NAME;
$encode=DB_ENCODE;
	$mysqli = new mysqli($servidor, $usuario,$password,$base);
	$connection = mysqli_connect($servidor, $usuario,$password,$base) or die("Error " . mysqli_error($connection));
$conexion = $mysqli;
mysqli_query($conexion, 'SET NAMES "' . DB_ENCODE . '"');

//Si tenemos un posible error en la conexión lo mostramos
if (mysqli_connect_error()) {
	printf("Falló conexión a la base de datos: %s\n", mysqli_connect_error());
	exit();
}

if (!function_exists('ejecutarConsulta')) {
	function validar_select($sql)
	{
		global $conexion;
		$query = mysqli_query($conexion, $sql);

		if (mysqli_num_rows($query)) {
			# code...
			//	mysqli_close($query);
			return true;
		} else {
			//mysqli_close($query);

			return false;
		}
	}

	class conexion
	{
		function ejecutarConsulta($sql)
		{
			global $conexion;
			$query = $conexion->query($sql);
			return $query;
		}

		function ejecutarConsultaSimpleFila($sql)
		{
			global $conexion;
			$query = $conexion->query($sql);
			$row = $query->fetch_assoc();
			return $row;
		}

		function ejecutarConsulta_retornarID($sql)
		{
			global $conexion;
			$query = $conexion->query($sql);
			return $conexion->insert_id;
		}

		public function limpiarCadena($str)
		{
			global $conexion;
			$str = mysqli_real_escape_string($conexion, trim($str));
			return htmlspecialchars($str);
		}

		//con esta funciones mandamos parametros para poder encriptar las contraseñas
		function validaPassword($var1, $var2)
		{
			if (strcmp($var1, $var2) !== 0) {
				return false;
			} else {
				return true;
			}
		}
		function validar_select($sql){

			global $conexion;
	
			$query=mysqli_query($conexion,$sql);
	
			if (mysqli_num_rows($query)) {

				return true;
			}
			else{
				return false;
			}
		}
	
		function salir()
		{
			global $conexion;
			mysqli_close($conexion);
		}
	}
}
function limpiarCadena1($str)
{
	global $conexion;
	$str = mysqli_real_escape_string($conexion, trim($str));
	return htmlspecialchars($str);
}
