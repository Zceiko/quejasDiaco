<?php
//incluye la clase queja y Crudqueja
require_once('claseadmincaso.php');
$adminInstance= new admin();
$objetoAdmin = new Admin();

$accion='none';

	if (isset($_POST['accion'])) {

		$accion=$_POST['accion'];

	}elseif ($_GET['accion']) {
		$accion=$_GET['accion'];
	}
	switch ($accion) {
			case 'crear':
				// echo "quiere crear";
				if (!isset($_POST['activo'])) {
					$activo="of";
				}else{
					$activo="on";
				}


				$nombre1=$_POST['nombre1'];
				$nombre2=$_POST['nombre2'];
				$nombre3=$_POST['nombre3'];
				$apellido1=$_POST['apellido1'];
				$apellido2=$_POST['apellido2'];
				$apellidoCasada=$_POST['apellidoCasada'];
				$estado=$_POST['estado'];
				$uRol=$_POST['uRol'];
				$nit=$_POST['nit'];
				$dpi=$_POST['dpi'];
				$idSede=$_POST['idSede'];
				$idQueja=$_POST['idQueja'];




				$objetoAdmin->setNombre1($nombre1);
				$objetoAdmin->setNombre2($nombre2);
				$objetoAdmin->setNombre3($nombre3);
				$objetoAdmin->setApellido1($apellido1);
				$objetoAdmin->setApellido2($apellido2);
				$objetoAdmin->setApellidoCasada($apellidoCasada);
				$objetoAdmin->setEstado($estado);
				$objetoAdmin->setURol($uRol);
				$objetoAdmin->setNit($nit);
				$objetoAdmin->setDpi($dpi);
				$objetoAdmin->setIdSede($idSede);
				$objetoAdmin->setIdQueja($idQueja);




				//llama a la funcion que guarda el servicio
				$adminInstance->save($objetoAdmin);
				header('location: vistaAdmin.php');
			break;
			case 'editar':
				//echo "quiere actualizar";
				// direcciona a la vista actualizar
				header('Location: vistaAdmin.php');
			break;
			case 'actualizar':
				//echo "quiere actualizar";

				$idAdmin=$_POST['idAdmin'];
				$nombre1=$_POST['nombre1'];
				$nombre2=$_POST['nombre2'];
				$nombre3=$_POST['nombre3'];
				$apellido1=$_POST['apellido1'];
				$apellido2=$_POST['apellido2'];
				$apellidoCasada=$_POST['apellidoCasada'];
				$estado=$_POST['estado'];
				$uRol=$_POST['uRol'];
				$nit=$_POST['nit'];
				$dpi=$_POST['dpi'];
				$idSede=$_POST['idSede'];
				$idQueja=$_POST['idQueja'];


				$objetoAdmin->setIdAdmin($idAdmin);
				$objetoAdmin->setNombre1($nombre1);
				$objetoAdmin->setNombre2($nombre2);
				$objetoAdmin->setNombre3($nombre3);
				$objetoAdmin->setApellido1($apellido1);
				$objetoAdmin->setApellido2($apellido2);
				$objetoAdmin->setApellidoCasada($ApellidoCasada);
				$objetoAdmin->setEstado($estado);
				$objetoAdmin->setURol($uRol);
				$objetoAdmin->setNit($nit);
				$objetoAdmin->setDpi($dpi);
				$objetoAdmin->setIdSede($idSede);
				$objetoAdmin->setIdQueja($idQueja);
				//llama a la funcion que actualiza el servicio
				$adminInstance->update($objetoAdmin);
				header('location: vistaAdmin.php');
			break;
			case 'eliminar':

				$estado=$_POST['estado'];

				$objetoAdmin->setEstado($estado);

				//llama a la funcion que actualiza el servicio
				$adminInstance->delete($objetoAdmin);
				header('location: vistaAdmin.php');
			break;
			default:
					header('location: vistaAdmin.php');
			break;
		}

?>
