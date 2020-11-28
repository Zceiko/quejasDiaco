<?php


class Sedes{


private $idSede;
private $direccion;
private $zona;
private $departamento;
private $municipio;
private $estado;


   public function getIdSede(){
      return $this->idSede;
   }

   public function setIdSede($idSede){
      $this->idSede = $idSede;
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

   public function getEstado(){
      return $this->estado;
   }

   public function setEstado($estado){
      $this->estado = $estado;
   }



      	 public static function save($sedes){
            $db=Conexion::getConnect();
            $insert=$db->prepare('insert into tbl_sedes values (null, :direccion, :zona, :departamento, :municipio, :estado)');

            $insert->bindValue('direccion',$sedes->getDireccion());
            $insert->bindValue('zona',$sedes->getZona());
            $insert->bindValue('departamento',$sedes->getDepartamento());
            $insert->bindValue('municipio',$sedes->getMunicipio());
            $insert->bindValue('estado',$sedes->getEstado());
            $insert->execute();
          }

      	public static function all(){
      			$db=Conexion::getConnect();
      			$listaSedes=[];



      			$select=$db->query('SELECT idSede, direccion, zona, departamento, municipio, estado
      					from tbl_sedes
      					order by idSede');

      			foreach($select->fetchAll() as $sede){

      				$sedeView = new sedes();
      				$sedeView->setIdSede($sede['idSede']);
      				$sedeView->setDireccion($sede['direccion']);
      				$sedeView->setZona($sede['zona']);
      				$sedeView->setDepartamento($sede['departamento']);
              $sedeView->setMunicipio($sede['municipio']);
              $sedeView->setEstado($sede['estado']);


      				$listaSedes[]= $sedeView;

      			}
      			return $listaSedes;




      		}




      		public static function update($sed){
      			$db=Conexion::getConnect();
      			$update=$db->prepare('UPDATE tbl_sedes SET direccion=:direccion, zona=:zona,departamento=:departamento,municipio=:municipio');


      			$update->bindValue('direccion',$sed->getDireccion());
      			$update->bindValue('zona',$sed->getZona());
      			$update->bindValue('departamento',$sed->getDepartamento());
      			$update->bindValue('municipio',$sed->getMunicipio());



      			$update->execute();
      		}

      		public static function delete($idSede){
      			$db=Conexion::getConnect();
      			$delete=$db->prepare('UPDATE tbl_sedes SET estado = 0 where idSede = :idSede');
      			$delete->bindValue('idCuenta ',$idSede);
      			$delete->execute();

      		}









}




?>
