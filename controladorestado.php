<?php
//incluye la clase queja y Crudqueja
require_once('conexion.php');
$estadoInstance= new estado();
$objetoEstado = new Estado();

$accion='none';

	if (isset($_POST['accion'])) {

		$accion=$_POST['accion'];

	}elseif ($_GET['accion']) {
		$accion=$_GET['accion'];
	}
	switch ($accion) {
			case 'crear':
				// echo "quiere crear";
				if (isset($_POST['activo'])) {
					$activo="off";
				}else{
					$activo="on";
				}
				$estado=$_POST['estadoCaso'];

				$objetoEstado->setEstadoCaso($estadoCaso);
				//llama a la funcion que guarda el servicio
				$estadoInstance->save($objetoEstado);
				header('location: vistaqueja.php');
			break;

			default:
					header('location: vistaqueja.php');
			break;
		}

?>
