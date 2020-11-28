<?php
//incluye la clase queja y Crudqueja
require_once('clasesede.php');
$sedeInstance= new sede();
$objetoSede = new Sede();

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
				$sede=$_POST['direccion'];
				$sede=$_POST['zona'];
				$sede=$_POST['departamento'];
				$sede=$_POST['municipio'];
				$sede=$_POST['estado'];

				$objetoSede->setDireccion($direccion);
				$objetoSede->setZona($zona);
				$objetoSede->setDepartamento($departamento);
				$objetoSede->setMunicipio($municipio);
				$objetoSede->setEstado($estado);
				//llama a la funcion que guarda el servicio
				$sedeInstance->save($objetoSede);
				header('location: vistaqueja.php');
			break;
			case 'editar':
				//echo "quiere actualizar";
				// direcciona a la vista actualizar
				header('Location: vistaqueja.php');
			break;
			case 'actualizar':
				//echo "quiere actualizar";

				$idSede=$_POST['setIdSede'];
				$direccion=$_POST['direccion'];
				$zona=$_POST['zona'];
				$departamento=$_POST['departamento'];
				$municipio=$_POST['municipio'];
				$estado=$_POST['estado'];

				$objetoSede->setIdSede($idSede);
				$objetoSede->setDireccion($direccion);
				$objetoSede->setZona($zona);
				$objetoSede->setDepartamento($departamento);
				$objetoSede->setMunicipio($municipio);
				$objetoSede->setEstado($estado);
				//llama a la funcion que actualiza el servicio
				$sedeInstance->update($objetoSede);
				header('location: vistaqueja.php');
			break;
			case 'eliminar':
				$idSede=$_POST['idSede'];
				$sedeInstance->delete($idSede);
				header('location: vistaqueja.php');
			break;					
			default:
					header('location: vistaqueja.php');
			break;
		}

?>