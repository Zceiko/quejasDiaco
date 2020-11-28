<?php
//incluye la clase queja y Crudqueja
require_once('claseconsumidor.php');
$consumidorInstance= new consumidor();
$objetoConsumidor = new Consumidor();

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
					$activo="off";
				}else{
					$activo="on";
				}


				$idCuenta=$_POST['idCuenta'];
				$nacionalidad=$_POST['nacionalidad'];
				$idTipoConsumidor=$_POST['idTipoConsumidor'];
				$zona=$_POST['zona'];
				$departamento=$_POST['departamento'];
				$municipio=$_POST['municipio'];
				$idSede=$_POST['idSede'];
				$estado=$_POST['estado'];




				$objetoConsumidor->setIdCuenta($idCuenta);
 				$objetoConsumidor->setNacionalidad($nacionalidad);
 				$objetoConsumidor->setIdTipoConsumidor($idTipoConsumidor);
 				$objetoConsumidor->setZona($zona);
 				$objetoConsumidor->setDepartamento($departamento);
 				$objetoConsumidor->setMunicipio($municipio);
 				$objetoConsumidor->setIdSede($idSede);
 				$objetoConsumidor->setEstado($estado);






				//llama a la funcion que guarda el servicio
				$consumidorInstance->save($objetoConsumidor);
        header('location: vistaproveedor.php');
   			break;

				case 'editar';

				header('location: vistaproveedor.php');
				break;
				case 'actualizar':

				$idCuenta=$_POST['idCuenta'];
				$nacionalidad=$_POST['nacionalidad'];
				$idTipoConsumidor=$_POST['idTipoConsumidor'];
				$zona=$_POST['zona'];
				$departamento=$_POST['departamento'];
				$municipio=$_POST['municipio'];
				$idSede=$_POST['idSede'];
				$estado=$_POST['estado'];





 				$objetoConsumidor->setIdCuenta($idCuenta);
 				$objetoConsumidor->setNacionalidad($nacionalidad);
 				$objetoConsumidor->setIdTipoConsumidor($idTipoConsumidor);
 				$objetoConsumidor->setZona($zona);
 				$objetoConsumidor->setDepartamento($departamento);
 				$objetoConsumidor->setMunicipio($municipio);
 				$objetoConsumidor->setIdSede($idSede);
 				$objetoConsumidor->setEstado($estado);


       	$consumidorInstance->update($objetoConsumidor);
        header('location: vistaproveedor.php');
        break;

				case 'eliminar':

				$estado=$_POST['estado'];
        $objetoConsumidor->setEstado($estado);


				$consumidorInstance->delete($objetoConsumidor);
				header('location: vistaproveedor.php');
				break;
				default:
					header('location: vistaproveedor.php');
			break;
		}

?>
