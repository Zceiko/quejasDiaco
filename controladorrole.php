<?php
//incluye la clase queja y Crudqueja
require_once('claserole.php');
$roleInstance= new role();
$objetoRole = new Role();

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
				$sede=$_POST['area'];
				$sede=$_POST['estado'];

				$objetoRole->setArea($area);
				$objetoRole->setEstado($estado);
				//llama a la funcion que guarda el servicio
				$roleInstance->save($objetoRole);
				header('location: vistaqueja.php');
			break;
			case 'editar':
				//echo "quiere actualizar";
				// direcciona a la vista actualizar
				header('Location: vistaquejaeditar.php');
			break;
			case 'actualizar':
				//echo "quiere actualizar";

				$uRol=$_POST['uRol'];
				$area=$_POST['area'];
				$estado=$_POST['estado'];

				$objetoRole->setUrol($uRol);
				$objetoRole->setArea($area);
				$objetoRole->setEstado($estado);
				//llama a la funcion que actualiza el servicio
				$roleInstance->update($objetoRole);
				header('location: vistaqueja.php');
			break;
			case 'eliminar':
				$estado=$_POST['estado'];
				$roleInstance->delete($estado);
				header('location: vistaqueja.php');
			break;
			default:
					header('location: vistaqueja.php');
			break;
		}

?>
