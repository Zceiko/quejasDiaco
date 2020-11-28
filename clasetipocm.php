<?php

require_once('conexion.php');


class TipoConsumidor{




private $idTipoConsumidor;
private $persona;


   public function getIdTipoConsumidor(){
      return $this->idTipoConsumidor;
   }

   public function setIdTipoConsumidor($idTipoConsumidor){
      $this->idTipoConsumidor = $idTipoConsumidor;
   }

   public function getPersona(){
      return $this->persona;
   }

   public function setPersona($persona){
      $this->persona = $persona;
   }


      	public static function all(){
      			$db=Conexion::getConnect();
      			$listaTipoConsumidor=[];



      			$select=$db->query('SELECT idTipoConsumidor, persona
      					from tbl_tipo_consumidor
      					order by idTipoConsumidor');

      			foreach($select->fetchAll() as $tipoConsumidorDb){

      				$tipoConsumidor = new TipoConsumidor();
      				$tipoConsumidor->setIdTipoConsumidor($tipoConsumidorDb['idTipoConsumidor']);
      				$tipoConsumidor->setPersona($tipoConsumidorDb['persona']);



      				$listaTipoConsumidor[]= $tipoConsumidor;

      			}
      			return $listaTipoConsumidor;




      		}












}




?>
