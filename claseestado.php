<?php
require_once('conexion.php');

	class Estado{
		private $idEstado;
		private $estadoCaso;


		function __construct(){}

		/*function __construct($idServicio,$nombre,$activo)
		{
			$this->setIdServicio($idServicio);
			$this->setNombre($nombre);
			$this->setActivo($activo);
		}*/
		/* ID GET Y SET */
		public function getIdEstado(){
			return $this->idEstado;
		}
		public function setIdEstado($idEstado){
			$this->idEstado = $idEstado;
		}
		/* ID TIPO GET Y SET */
		public function getEstadoCaso(){
			return $this->estadoCaso;
		}
		public function setEstadoCaso($estadoCaso){
			$this->estadoCaso = $estadoCaso;
		}





		public static function all(){
			$db=Conexion::getConnect();
			$listaEstado=[];

			$select=$db->prepare('select idEstado, estadoCaso  from tbl_estados order by idEstado');

			foreach($select->fetchAll() as $estadoDb){
				$estado = new Estado();
				$estado->setIdEstado($estadoDb['idEstado']);
				$estado->setEstadoCaso($estadoDb['estadoCaso']);

				$listaEstado[]= $estado;
			}
			return $listaEstado;
		}



		public static function searchById($idEstadoP){
			$db=Conexion::getConnect();
			$select=$db->prepare('select *from diaco.tbl_estados WHERE idEstado=:idEstado');
			$select->bindValue('idEstado',$idEstadoP);
			$select->execute();

			$estadoDb=$select->fetch();

			$estado = new Estado ();
			$estado->setIdEstado($estadoDb['idEstado']);
			$estado->setEstadoCaso($estadoDb['estadoCaso']);

			return $estado;

		}

		public static function update($estadoP){
		  $db=Conexion::getConnect();
			$update=$db->prepare('update estado set casoEstado=:casoEstado WHERE idEstado=:idEstado');
			$update->bindValue('idEstado',$estadoP->getIdEstado());
			$update->bindValue('estadoCaso', $estadoP->getEstadoCaso());

			$update->execute();
		}





	}
?>
