<?php
require_once('conexion.php');

class Cuenta{


private $idCuenta;
private $correo;
private $estado;
private $clave;


   public function getIdCuenta(){
      return $this->idCuenta;
    }


   public function setIdCuenta($idCuenta){
      $this->idCuenta = $idCuenta;
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

   public function getClave(){
      return $this->clave;
   }

   public function setClave($clave){
      $this->clave = $clave;
   }



   	 public static function save($cuentaU){
         	$db=Conexion::getConnect();
         $insert=$db->prepare('insert into tbl_cuentas values (NULL, :correo, :estado, :clave)');

         
         $insert->bindValue('correo',$cuentaU->getCorreo());
         $insert->bindValue('estado',$cuentaU->getEstado());
         $insert->bindValue('clave',$cuentaU->getClave());
         $insert->execute();
       }

   	public static function all(){
   			$db=Conexion::getConnect();
   			$listaCuenta=[];



   			$select=$db->query('SELECT c.idCuenta, c.correo, c.estado, c.clave
   					from tbl_cuentas c
   					inner JOIN tbl_consumidor cm on c.idCuenta = cm.idCuenta
   					order by cm.idConsumidor');

   			foreach($select->fetchAll()as $cuenta){

   				$cuentaView = new cuenta();
   				$cuentaView->setIdCuenta($cuenta['idCuenta']);
   				$cuentaView->setCorreo($cuenta['correo']);
   				$cuentaView->setEstado($cuenta['estado']);
   				$cuentaView->setClave($cuenta['clave']);


   				$listaCuenta[]= $cuentaView;

   			}
   			return $listaCuenta;




   		}




   		public static function update($cuent){
   			$db=Conexion::getConnect();
   			$update=$db->prepare('UPDATE tbl_cuentas SET idCuenta=:idCuenta ,correo=:correo, clave=:clave where idCuenta=:idCuenta');


   			$update->bindValue('idCuenta',$cuent->getIdCuenta());
   			$update->bindValue('correo',$cuent->getCorreo());
   			$update->bindValue('estado',$cuent->getEstado());
   			$update->bindValue('clave',$cuent->getClave());


   			$update->execute();
   		}

   		public static function delete($idCuenta){
   			$db=Conexion::getConnect();
   			$delete=$db->prepare('UPDATE tbl_cuentas SET estado = 0 where idCuenta = :idCuenta');
   			$delete->bindValue('idCuenta ',$idCuenta);
   			$delete->execute();

   		}









}




?>
