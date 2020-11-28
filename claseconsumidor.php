<?php

require_once('conexion.php');

class Consumidor{


private $idConsumidor;
private $idCuenta;
private $nacionalidad;
private $idTipoConsumidor;
private $zona;
private $departamento;
private $municipio;
private $idSede;
private $estado;
private $correo;
private $clave;



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

	 public function getNacionalidad(){
      return $this->nacionalidad;
    }
    public function setNacionalidad($nacionalidad){
      $this->nacionalidad  = $nacionalidad;
    }

	 public function getIdTipoConsumidor(){
      return $this->idTipoConsumidor;
    }
    public function setIdTipoConsumidor($idTipoConsumidor){
      $this->idTipoConsumidor = $idTipoConsumidor;
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


	 public function getIdSede(){
      return $this->idSede;
    }
    public function setIdSede($idSede){
      $this->idSede = $idSede;
    }
	 public function getEstado(){
      return $this->estado;
    }
    public function setEstado($estado){
      $this->estado = $estado;
    }

	 public function getCorreo(){
      return $this->correo;
    }
    public function setCorreo($correo){
      $this->correo = $correo;
    }

	 public function getClave(){
      return $this->clave;
    }
    public function setClave($clave){
      $this->clave = $clave;
    }



	 public static function save($consumQ){
     $db=Conexion::getConnect();
      $insert=$db->prepare('insert into tbl_consumidor values (NULL,:idCuenta ,:nacionalidad,:idTipoConsumidor,:zona,:departamento, :municipio, :idSede, :estado)');

      $insert->bindValue('idCuenta',$consumQ->getIdCuenta());
      $insert->bindValue('nacionalidad',$consumQ->getNacionalidad());
      $insert->bindValue('idTipoConsumidor',$consumQ->getIdTipoConsumidor());
      $insert->bindValue('zona',$consumQ->getZona());
      $insert->bindValue('departamento',$consumQ->getDepartamento());
      $insert->bindValue('municipio',$consumQ->getMunicipio());
      $insert->bindValue('idSede',$consumQ->getIdSede());
	    $insert->bindValue('estado',$consumQ->getEstado());

      $insert->execute();
    }

	public static function all(){
			$db=Conexion::getConnect();
			$listaConsumidor=[];



			$select=$db->query('SELECT c.idConsumidor, c.idCuenta, c.nacionalidad, c.idTipoConsumidor, c.zona, c.departamento, c.municipio, c.idSede, c.estado, ct.correo from tbl_consumidor c inner JOIN tbl_cuentas ct on c.idCuenta = ct.idCuenta order by c.idConsumidor');

			foreach($select->fetchAll() as $consumidorDb){

				$consumidor = new Consumidor();
				$consumidor->setIdConsumidor($consumidorDb['idConsumidor']);
				$consumidor->setIdCuenta($consumidorDb['idCuenta']);
				$consumidor->setNacionalidad($consumidorDb['nacionalidad']);
				$consumidor->setIdTipoConsumidor($consumidorDb['idTipoConsumidor']);
				$consumidor->setZona($consumidorDb['zona']);
				$consumidor->setDepartamento($consumidorDb['departamento']);
				$consumidor->setMunicipio($consumidorDb['municipio']);
				$consumidor->setIdSede($consumidorDb['idSede']);
				$consumidor->setEstado($consumidorDb['estado']);
				$consumidor->setCorreo($consumidorDb['correo']);

				$listaConsumidor[]= $consumidor;

			}
			return $listaConsumidor;




		}




		public static function update($cons){
			$db=Conexion::getConnect();
			$update=$db->prepare('UPDATE tbl_consumidor SET idCuenta =:idCuenta , nacionalidad =:nacionalidad , idTipoConsumidor=:idTipoConsumidor, zona=:zona, departamento=:departamento, municipio=:municipio, idSede=:idSede, estado=:estado');


			$update->bindValue('idConsumidor',$cons->getIdConsumidor());
			$update->bindValue('idCuenta',$cons->getIdCuenta());
			$update->bindValue('nacionalidad',$cons->getNacionalidad());
			$update->bindValue('idTipoConsumidor',$cons->getIdTipoConsumidor());
			$update->bindValue('zona',$cons->getZona());
			$update->bindValue('departamento',$cons->getDepartamento());
			$update->bindValue('municipio',$cons->getMunicipio());
			$update->bindValue('idSede',$cons->getIdSede());
			$update->bindValue('estado',$cons->getEstado());


			$update->execute();
		}

		public static function delete($idConsu){
			$db=Conexion::getConnect();
			$delete=$db->prepare('UPDATE tbl_consumidor SET estado = 0 where idConsumidor = :idConsumidor');
			$delete->bindValue('idConsumidor',$idConsu);
			$delete->execute();

		}


	}
?>
