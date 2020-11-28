<?php

require_once('conexion.php');

//require_once('conexion_sql_server.php');

class Queja{
     private $idQueja;
     private $noDocumento;
     private $serieDocumento;
     private $fechaDocumento;
     private $detalleQueja;
     private $solicitud;
     private $idEstado;
     private $estadoCaso;
     private $estado;
     private $idConsumidor;
     private $persona;



     function __construct(){}

    /* ID GET Y SET */
    public function getIdQueja(){
      return $this->idQueja;
    }
    public function setIdQueja($idQueja){
      $this->idQueja = $idQueja;
    }

    /* LUGAR GET Y SET */
    public function getNoDocumento(){
      return $this->noDocumento;
    }
    public function setNoDocumento($noDocumento){
      $this->noDocumento = $noDocumento;
    }


    /* LUGAR GET Y SET */
    public function getSerieDocumento(){
      return $this->serieDocumento;
    }
    public function setSerieDocumento($serieDocumento){
      $this->serieDocumento = $serieDocumento;
    }

    /* LUGAR GET Y SET */
    public function getFechaDocumento(){
      return $this->fechaDocumento;
    }
    public function setFechaDocumento($fechaDocumento){
      $this->fechaDocumento = $fechaDocumento;
    }

    /* FECHATOP GET Y SET */
    public function getDetalleQueja(){
      return $this->detalleQueja;
    }
    public function setDetalleQueja($detalleQueja){
      $this->detalleQueja = $detalleQueja;
    }

    /* FECHATOP GET Y SET */
    public function getSolicitud(){
      return $this->solicitud;
    }
    public function setSolicitud($solicitud){
      $this->solicitud = $solicitud;
    }

    /* FECHATOP GET Y SET */
    public function getIdEstado(){
      return $this->idEstado;
    }
    public function setIdEstado($idEstado){
      $this->idEstado = $idEstado;
    }

    /* FECHATOP GET Y SET */
    public function getEstadoCaso(){
      return $this->estadoCaso;
    }
    public function setEstadoCaso($estadoCaso){
      $this->estadoCaso = $estadoCaso;
    }

    /* FECHATOP GET Y SET */
    public function getPersona(){
      return $this->persona;
    }
    public function setPersona($persona){
      $this->persona = $persona;
    }



       public function getEstado(){
   			return $this->estado;
   		}
   		public function setEstado($estado){

   		if (strcmp($estado, 'on')==0) {
   			$this->estado=1;
   		} elseif(strcmp($estado, '1')==0) {
   			$this->estado='checked';
   		}elseif (strcmp($estado, '0')==0) {
   			$this->estado='of';
   		}else {
   			$this->estado=0;
   		}

   	}


    /* FECHATOP GET Y SET */
    public function getIdConsumidor(){
      return $this->idConsumidor;
    }
    public function setIdConsumidor($idConsumidor){
      $this->idConsumidor = $idConsumidor;
    }
    /* FECHATOP GET Y SET */




//$db = new PDO("sqlsrv:Server=TR-IT31\SQLEXPRESS;Database=DB_PRUEBA2", "admin", "123456");



public static function save($quejaP){
  $db=Conexion::getConnect();
  $insert=$db->prepare('INSERT INTO tbl_queja VALUES (NULL,:noDocumento,:serieDocumento,:fechaDocumento,:detalleQueja,:solicitud,:estado,:idConsumidor,:idEstado)');

  $insert->bindValue('noDocumento',$quejaP->getnoDocumento());
  $insert->bindValue('serieDocumento',$quejaP->getSerieDocumento());
  $insert->bindValue('fechaDocumento',$quejaP->getFechaDocumento());
  $insert->bindValue('detalleQueja',$quejaP->getDetalleQueja());
  $insert->bindValue('solicitud',$quejaP->getSolicitud());
  $insert->bindValue('estado',$quejaP->getEstado());
  $insert->bindValue('idConsumidor',$quejaP->getIdConsumidor());
  $insert->bindValue('idEstado',$quejaP->getidEstado());
  $insert->execute();
}



    public static function all(){
        $db=Conexion::getConnect();
        $listaQueja=[];



        $select=$db->query('SELECT  Q.idQueja, Q.noDocumento, Q.serieDocumento, Q.fechaDocumento, Q.detalleQueja, Q.solicitud, Q.estado, C.idConsumidor, TC.persona, CA.correo , E.idEstado , E.estadoCaso
                                  from tbl_queja Q
                                  inner join tbl_consumidor C on Q.idConsumidor = C.idConsumidor
                                  INNER join tbl_estados E on Q.idEstado = E.idEstado
                                  INNER JOIN tbl_tipo_consumidor TC on C.idTipoConsumidor = TC.idTipoConsumidor
                                  INNER join tbl_cuentas CA on C.idCuenta = CA.idCuenta
                                  order by idQueja');

        foreach($select->fetchAll() as $quejaDb){

          $queja = new Queja();
          $queja->setIdQueja($quejaDb['idQueja']);
          $queja->setNoDocumento($quejaDb['noDocumento']);
          $queja->setSerieDocumento($quejaDb['serieDocumento']);
          $queja->setFechaDocumento($quejaDb['fechaDocumento']);
          $queja->setDetalleQueja($quejaDb['detalleQueja']);
          $queja->setSolicitud($quejaDb['solicitud']);
          $queja->setEstado($quejaDb['estado']);
          $queja->setPersona($quejaDb['persona']);
          $queja->setEstadoCaso($quejaDb['estadoCaso']);


          $listaQueja[]= $queja;

        }

        return $listaQueja;
      }

    public static function update($idQuejaU){
      $db=Conexion::getConnect();
      $update=$db->prepare('UPDATE tbl_queja SET idQueja=:idQueja,detalleQueja=:detalleQueja,estado=:estado,fechaDocumento=:fechaDocumento,idConsumidor=:idConsumidor,idEstado=:idEstado,noDocumento=:noDocumento, serieDocumento=:serieDocumento,solicitud=:solicitud  where idQueja=:idQueja');

      $update->bindValue('idQueja',$idQuejaU->getIdQueja());
      $update->bindValue('detalleQueja', $idQuejaU->getDetalleQueja());
      $update->bindValue('estado', $idQuejaU->getEstado());
      $update->bindValue('fechaDocumento', $idQuejaU->getFechaDocumento());
      $update->bindValue('idConsumidor', $idQuejaU->getIdConsumidor());
      $update->bindValue('idEstado', $idQuejaU->getIdEstado());
      $update->bindValue('noDocumento', $idQuejaU->getNoDocumento());
      $update->bindValue('serieDocumento', $idQuejaU->getSerieDocumento());
      $update->bindValue('solicitud', $idQuejaU->getSolicitud());

      $update->execute();
    }

    public static function delete($idQueja){
      $db=Conexion::getConnect();
      $delete=$db->prepare('UPDATE tbl_queja set estado = 0 WHERE idQueja=:idQueja');
      $delete->bindValue('idQueja',$idQueja);
      $delete->execute();
    }

  }
?>
