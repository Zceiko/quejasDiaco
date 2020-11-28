<?php
//incluye la clase queja y Crudqueja
require_once('clasequeja.php');
$quejaInstance= new queja();
$objetoQueja = new Queja();

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


				$noDocumento=$_POST['noDocumento'];
				$serieDocumento=$_POST['serieDocumento'];
				$fechaDocumento=$_POST['fechaDocumento'];
				$detalleQueja=$_POST['detalleQueja'];
				$solicitud=$_POST['solicitud'];
				$estado=$_POST['estado'];
				$idConsumidor=$_POST['idConsumidor'];
				$idEstado=$_POST['idEstado'];




				$objetoQueja->setNoDocumento($noDocumento);
				$objetoQueja->setSerieDocumento($serieDocumento);
				$objetoQueja->setFechaDocumento($fechaDocumento);
				$objetoQueja->setDetalleQueja($detalleQueja);
				$objetoQueja->setSolicitud($solicitud);
				$objetoQueja->setEstado($estado);
				$objetoQueja->setIdConsumidor($idConsumidor);
				$objetoQueja->setIdEstado($idEstado);




				//llama a la funcion que guarda el servicio
				$quejaInstance->save($objetoQueja);
			  header('location: index.php');
			break;
      case 'editar':
			break;

			case 'actualizar':

			$noDocumento=$_POST['noDocumento'];
			$serieDocumento=$_POST['serieDocumento'];
			$fechaDocumento=$_POST['fechaDocumento'];
			$detalleQueja=$_POST['detalleQueja'];
			$solicitud=$_POST['solicitud'];
			$estado=$_POST['estado'];
			$idConsumidor=$_POST['idConsumidor'];
			$idEstado=$_POST['idEstado'];




			$objetoQueja->setNoDocumento($noDocumento);
			$objetoQueja->setSerieDocumento($serieDocumento);
			$objetoQueja->setFechaDocumento($fechaDocumento);
			$objetoQueja->setDetalleQueja($detalleQueja);
			$objetoQueja->setSolicitud($solicitud);
			$objetoQueja->setEstado($estado);
			$objetoQueja->setIdConsumidor($idConsumidor);
			$objetoQueja->setIdEstado($idEstado);

     	$quejaInstance->update($objetoQueja);
			header('location: index.php');
			break;
			case 'eliminar':

			    $estado=$_POST['estado'];
			  	$objetoQueja->setEstado($estado);

				$quejaInstance->delete($objetoQueja);
		 		 header('location: index.php');
         break;

			default:
					header('location: index.php');
			break;
		}

?>
