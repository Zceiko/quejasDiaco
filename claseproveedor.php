<?php
require ('conexion.php');

class Proveedor{

private $idProveedor;
private $nitRepresentante;
private $empresa;
private $razonSocial;
private $direccion;
private $zona;
private $departamento;
private $municipio;
private $telefono;
private $correo;
private $estado;
private $idConsumidor;
private $idCuenta;
private $correo2;
private $tipoConsumidor;
private $estado2;
private $idQueja;




 public function getIdProveedor(){
      return $this->idProveedor;
    }
    public function setIdProveedor($idProveedor){
      $this->idProveedor = $idProveedor;
    }

	 public function getNitRepresentante(){
      return $this->nitRepresentante;
    }
    public function setNitRepresentante($nitRepresentante){
      $this->nitRepresentante = $nitRepresentante;
    }

	 public function getEmpresa(){
      return $this->empresa;
    }
    public function setEmpresa($empresa){
      $this->empresa = $empresa;
    }

	 public function getRazonSocial(){
      return $this->razonSocial;
    }
    public function setRazonSocial($razonSocial){
      $this->razonSocial = $razonSocial;
    }


	 public function getDireccion(){
      return $this->direccion;
    }
    public function setDireccion($direccion){
      $this->direccion = $direccion;
    }


	 public function getZona(){
      return $this->zona;
    }
    public function setZona($zona){
      $this->zona = $zona;
    }


	 public function getDepartamento(){
      return $this->departamento;
    }
    public function setDepartamento($departamento){
      $this->departamento = $departamento;
    }


	 public function getMunicipio(){
      return $this->municipio;
    }
    public function setMunicipio($municipio){
      $this->municipio = $municipio;
    }


	 public function getTelefono(){
      return $this->telefono;
    }
    public function setTelefono($telefono){
      $this->telefono = $telefono;
    }


	 public function getCorreo(){
      return $this->correo;
    }
    public function setCorreo($correo){
      $this->correo = $correo;
    }


	 public function getEstado(){
      return $this->estado;
    }
    public function setEstado($estado){
      $this->estado = $estado;
    }


	 public function getIdConsumidor(){
      return $this->idConsumidor;
    }
    public function setIdConsumidor($idConsumidor){
      $this->idConsumidor = $idConsumidor;
    }


	 public function getIdCuenta(){
      return $this->idCuenta;
    }
    public function setIdCuenta($idCuenta){
      $this->idCuenta = $idCuenta;
    }

	 public function getCorreo2(){
      return $this->correo2;
    }
    public function setCorreo2($correo2){
      $this->correo2 = $correo2;
    }


	 public function getTipoConsumidor(){
      return $this->tipoConsumidor;
    }
    public function setTipoConsumidor($tipoConsumidor){
      $this->tipoConsumidor = $tipoConsumidor;
    }

	 public function getEstado2(){
      return $this->estado2;
    }
    public function setEstado2($estado2){
      $this->estado2 = $estado2;
    }

	 public function getIdQueja(){
      return $this->idQueja;
    }
    public function setIdQueja($idQueja){
      $this->idQueja = $idQueja;
    }

	 public static function save($proveP){
      $db=Conexion::getConnect();
      $insert=$db->prepare('insert into tbl_proveedor values (NULL,:nitRepresentante, :empresa, :razonSocial, :direccion, :zona, :departamento, :municipio, :telefono, :correo, :estado, :idConsumidor)');

      $insert->bindValue('nitRepresentante',$proveP->getNitRepresentante());
      $insert->bindValue('empresa',$proveP->getEmpresa());
      $insert->bindValue('razonSocial',$proveP->getRazonSocial());
      $insert->bindValue('direccion',$proveP->getDireccion());
      $insert->bindValue('zona',$proveP->getZona());
      $insert->bindValue('departamento',$proveP->getDepartamento());
      $insert->bindValue('municipio',$proveP->getMunicipio());
      $insert->bindValue('telefono',$proveP->getTelefono());
      $insert->bindValue('correo',$proveP->getCorreo());
	    $insert->bindValue('estado',$proveP->getEstado());
	    $insert->bindValue('idConsumidor',$proveP->getIdConsumidor());
      $insert->execute();
    }

	public static function all(){
			$db=Conexion::getConnect();
			$listaProveedor=[];



			$select=$db->query('SELECT  p.idProveedor, p.nitRepresentante, p.empresa, p.razonSocial, p.direccion, p.zona, p.departamento, p.municipio, p.telefono, p.correo, p.estado, p.idConsumidor,
			        ct.idCuenta, ct.correo, c.tipoConsumidor, c.estado, q.idQueja
					from tbl_proveedor p
					inner JOIN tbl_consumidor c on p.idConsumidor = c.idConsumidor
					inner JOIN tbl_cuentas ct  on c.idCuenta = ct.idCuenta
					inner join tbl_queja q on c.idConsumidor = q.idConsumidor
					order by c.idConsumidor');

			foreach($select->fetchAll() as $user){





				$userView = new proveedor();
				$userView->setIdProveedor($user['idProveedor']);
				$userView->setNitRepresentante($user['nitRepresentante']);
				$userView->setEmpresa($user['empresa']);
				$userView->setRazonSocial($user['razonSocial']);
				$userView->setDireccion($user['direccion']);
				$userView->setZona($user['zona']);
				$userView->setDepartamento($user['departamento']);
				$userView->setMunicipio($user['municipio']);
				$userView->setTelefono($user['telefono']);
				$userView->setCorreo($user['correo']);
				$userView->setEstado($user['estado']);
				$userView->setIdConsumidor($user['idConsumidor']);
				$userView->setIdCuenta($user['idCuenta']);
				$userView->setCorreo2($user['correo2']);
				$userView->setTipoConsumidor($user['tipoConsumidor']);
				$userView->setEstado2($user['estado2']);
				$userView->setIdQueja($user['idQueja']);


				$listaProveedor[]= $userView;

			}
			return $listaProveedor;




		}




		public static function update($user){
			$db=Conexion::getConnect();
			$update=$db->prepare('UPDATE tbl_proveedor SET idProveedor=:idProveedor,  nitRepresentante=:nitRepresentante, empresa=:empresa, razonSocial=:razonSocial, direccion=:direccion, zona=:zona, departamento=:departamento, municipio=:municipio, telefono=:telefono, correo=:correo, estado=:estado, idConsumidor=:idConsumidor where idProveedor=:idProveedor');

      $update->bindValue('idProveedor',$user->getIdProveedor());
			$update->bindValue('nitRepresentante',$user->getNitRepresentante());
			$update->bindValue('empresa',$user->getEmpresa());
			$update->bindValue('razonSocial',$user->getRazonSocial());
			$update->bindValue('direccion',$user->getDireccion());
			$update->bindValue('zona',$user->getZona());
			$update->bindValue('departamento',$user->getDepartamento());
			$update->bindValue('municipio',$user->getMunicipio());
			$update->bindValue('telefono',$user->getTelefono());
			$update->bindValue('correo',$user->getCorreo());
			$update->bindValue('estado',$user->getEstado());
			$update->bindValue('idConsumidor',$user->getIdConsumidor());


			$update->execute();
		}

		public static function delete($idProveedor){
			$db=Conexion::getConnect();
			$delete=$db->prepare('UPDATE tbl_proveedor SET estado = 0 where idProveedor = :idProveedor');
			$delete->bindValue('idProveedor',$idProveedor);
			$delete->execute();

		}


	}
?>
