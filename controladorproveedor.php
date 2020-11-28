<?php
//incluye la clase queja y Crudqueja
require_once('claseproveedor.php');
$proveedorInstance= new proveedor();
$objetoProveedor = new Proveedor();

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


				$nitRepresentante=$_POST['nitRepresentante'];
				$empresa=$_POST['empresa'];
				$razonSocial=$_POST['razonSocial'];
				$direccion=$_POST['direccion'];
				$zona=$_POST['zona'];
				$departamento=$_POST['departamento'];
				$municipio=$_POST['municipio'];
				$telefono=$_POST['telefono'];
				$correo=$_POST['correo'];
				$estado=$_POST['estado'];
				$idConsumidor=$_POST['idConsumidor'];





				$objetoProveedor->setNitRepresentante($nitRepresentante);
				$objetoProveedor->setEmpresa($empresa);
				$objetoProveedor->setRazonSocial($razonSocial);
				$objetoProveedor->setDireccion($direccion);
				$objetoProveedor->setZona($zona);
				$objetoProveedor->setDepartamento($departamento);
				$objetoProveedor->setMunicipio($municipio);
				$objetoProveedor->setTelefono($telefono);
				$objetoProveedor->setCorreo($correo);
				$objetoProveedor->setEstado($estado);
				$objetoProveedor->setIdConsumidor($idConsumidor);





				//llama a la funcion que guarda el servicio
				$proveedorInstance->save($objetoProveedor);
				header('location: vistaqueja.php');
			break;
      case 'editar':

			break;

			case 'actualizar':

			$nitRepresentante=$_POST['nitRepresentante'];
			 $empresa=$_POST['empresa'];
			 $razonSocial=$_POST['razonSocial'];
			 $direccion=$_POST['direccion'];
			 $zona=$_POST['zona'];
			 $departamento=$_POST['departamento'];
			 $municipio=$_POST['municipio'];
			 $telefono=$_POST['telefono'];
			 $correo=$_POST['correo'];
			 $estado=$_POST['estado'];
			 $idConsumidor=$_POST['idConsumidor'];





			 $objetoProveedor->setNitRepresentante($nitRepresentante);
			 $objetoProveedor->setEmpresa($empresa);
			 $objetoProveedor->setRazonSocial($razonSocial);
			 $objetoProveedor->setDireccion($direccion);
			 $objetoProveedor->setZona($zona);
			 $objetoProveedor->setDepartamento($departamento);
			 $objetoProveedor->setMunicipio($municipio);
			 $objetoProveedor->setTelefono($telefono);
			 $objetoProveedor->setCorreo($correo);
			 $objetoProveedor->setEstado($estado);
			 $objetoProveedor->setIdConsumidor($idConsumidor);


			 $proveedorInstance->update($objetoProveedor);
			 header('location: vistaqueja.php');
			 break;
			 case 'eliminar':

			          $estado=$_POST['estado'];
                $objetoProveedor->setEstado($estado);


        $proveedorInstance->delete($objetoProveedor);
				header('location: vistaqueja.php');
				break;
				default;
				    header('location: vistaqueja.php');
				break;






}

?>
