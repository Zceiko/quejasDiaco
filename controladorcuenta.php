<?php
//incluye la clase queja y Crudqueja
require_once('clasecuentas.php');
$cuentaInstance = new cuenta();
$objetoCuenta = new Cuenta();

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
				$correo=$_POST['correo'];
				$estado=$_POST['estado'];
				$clave=$_POST['clave'];


				$objetoCuenta->setCorreo($correo);
				$objetoCuenta->setEstado($estado);
				$objetoCuenta->setClave($clave);
				//llama a la funcion que guarda el servicio
				$cuentaInstance->save($objetoCuenta);
				header('location: vistaregistro.php');
			break;
			case 'editar':
				//echo "quiere actualizar";
				// direcciona a la vista actualizar
				header('Location: vistaregistro.php');
			break;
			case 'actualizar':
				//echo "quiere actualizar";

				$idCuenta=$_POST['setIdCuenta'];
				$correo=$_POST['correo'];
				$estado=$_POST['estado'];
				$clave=$_POST['clave'];

				$objetoCuenta->setIdCuenta($idCuenta);
				$objetoCuenta->setCorreo($correo);
				$objetoCuenta->setEstado($estado);
				$objetoCuenta->setClave($clave);

				//llama a la funcion que actualiza el servicio
				$cuentaInstance->update($objetoCuenta);
				header('location: vistaregistro.php');
			break;
			case 'eliminar':
				$estado=$_POST['estado'];
				$cuentaInstance->delete($estado);
				header('location: vistaregistro.php');
			break;
			default:
					header('location: vistaregistro.php');
			break;
		}

?>
