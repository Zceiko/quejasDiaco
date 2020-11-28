<?php

require_once('conexion.php');

	class Admin{
		private $idAdmin;
		private $nombre1;
		private $nombre2;
		private $nombre3;
		private $apellido1;
		private $apellido2;
		private $apellidoCasada;
		private $estado;
		private $uRol;
		private $nit;
		private $dpi;
		private $idSede;
		private $idQueja;


		//ESTAS VARIABLES LAS VAMOS A USAR PARA QUE SE MÁS FÁCIL OBTENER EL NOMBRE Y EL ID DEL PLAN
		private $noDocumentoQueja;
		private $direccionSede;
		private $areaRol;


		function __construct(){}

		/*function __construct($idServicio,$nombre,$activo)
		{
			$this->setIdServicio($idServicio);
			$this->setNombre($nombre);
			$this->setActivo($activo);
		}*/
		/* ID GET Y SET */
		public function getIdAdmin(){
			return $this->idAdmin;
		}
		public function setIdAdmin($idAdmin){
			$this->idAdmin = $idAdmin;
		}
		/* ID TIPO GET Y SET */
		public function getNombre1(){
			return $this->nombre1;
		}
		public function setNombre1($nombre1){
			$this->nombre1 = $nombre1;
		}

		/* ID AREA GET Y SET */
		public function getNombre2(){
			return $this->nombre2;
		}
		public function setIdArea($nombre2){
			$this->nombre2 = $nombre2;
		}

		/* LUGAR GET Y SET */
		public function getNombre3(){
			return $this->nombre3;
		}
		public function setLugar($nombre3){
			$this->nombre3 = $nombre3;
		}

		/* FECHATOP GET Y SET */
		public function getApellido1(){
			return $this->apellido1;
		}
		public function setApellido1($apellido1){
			$this->apellido1 = $apellido1;
		}


		/* FECHATOP GET Y SET */
		public function getApellidoCasada(){
			return $this->apellidoCasada;
		}
		public function setApellidoCasada($apellidoCasada){
			$this->apellidoCasada = $apellidoCasada;
		}




		/* HORA GET Y SET */
		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}

		/* idTipoP GET Y SET */
		public function getURol(){
			return $this->uRol;
		}
		public function setURol($uRol){
			$this->uRol = $uRol;
		}


		/* Nombre Afectado GET Y SET */
		public function getNit(){
			return $this->nit;
		}
		public function setNit($nit){
			$this->nit = $nit;
		}


		/* edadAfec GET Y SET */
		public function getDpi(){
			return $this->dpi;
		}
		public function setDpi($dpi){
			$this->dpi = $dpi;
		}



		/* desc1 GET Y SET */
		public function getIdSede(){
			return $this->idSede;
		}
		public function setIdSede($idSede){
			$this->idSede = $idSede;
		}






		/* desc1 GET Y SET */
		public function getNoDocumentoQueja(){
			return $this->noDocumentoQueja;
		}
		public function setNoDocumentoQueja($noDocumentoQueja){
			$this->noDocumentoQueja = $noDocumentoQueja;
		}


		/* desc2 GET Y SET */
		public function getDireccionSede(){
			return $this->direccionSede;
		}
		public function setDireccionSede($direccionSede){
			$this->direccionSede = $direccionSede;
		}

		/* desc2 GET Y SET */
		public function getAreaRol(){
			return $this->areaRol;
		}
		public function setAreaRol($areaRol){
			$this->areaRol = $areaRol;
		}



		public static function save($adminP){
			$db=Conexion::getConnect();
			$insert=$db->prepare('INSERT INTO proyecto VALUES (NULL,:nombre1,:nombre2,:nombre3,:apellido1,:apellido2,:apellidoCasada,:estado,:uRol,:nit,:dpi,:idSede,:idQueja)');

			$insert->bindValue('nombre1',$adminP->getNombre1());
			$insert->bindValue('nombre2',$adminP->getNombre2());
			$insert->bindValue('nombre3',$adminP->getNombre3());
			$insert->bindValue('apellido1',$adminP->getApellido1());
			$insert->bindValue('apellido2',$adminP->getApellido2());
			$insert->bindValue('apellidoCasada',$adminP->getApellidoCasada());
			$insert->bindValue('estado',$adminP->getEstado());
			$insert->bindValue('uRol',$adminP->getURol());
			$insert->bindValue('nit',$adminP->getNit());
			$insert->bindValue('dpi',$adminP->getDpi());
			$insert->bindValue('idSede',$adminP->getSede());
			$insert->bindValue('idQueja',$adminP->getIdQueja());
			$insert->execute();
		}


		public static function all(){
			$db=Conexion::getConnect();
			$listaAdmin=[];



			$select=$db->query('SELECT tbl_admin_caso.idAdmin, tbl_admin_caso.nombre1, tbl_admin_caso.nombre2, tbl_admin_caso.nombre3, tbl_admin_caso.apellido1, tbl_admin_caso.apellido2,tbl_admin_caso.apellidoCasada, tbl_admin_caso.estado, tbl_role.uRol, tbl_role.area as areaRol, tbl_admin_caso.nit, tbl_admin_caso.dpi, tbl_sedes.idSede, tbl_sedes.direccion as direccionSede, tbl_queja.idQueja, tbl_queja.noDocumento as noDocumentoQueja
					from tbl_admin_caso
					inner JOIN tbl_queja on tbl_queja.idQueja = tbl_admin_caso.idQueja
					inner JOIN tbl_sedes  on tbl_sedes.idSede = tbl_admin_caso.idSede
					inner join tbl_role  on tbl_role.uRol = tbl_admin_caso.uRol
					order by tbl_admin_caso.idAdmin');

			foreach($select->fetchAll() as $adminDb){


				$admin = new Admin();
				$admin->setIdAdmin($adminDb['idAdmin']);
				$admin->setNombre1($adminDb['nombre1']);
				$admin->setNombre2($adminDb['nombre2']);
				$admin->setNombre3($adminDb['nombre3']);
				$admin->setApellido1($adminDb['apellido1']);
				$admin->setApellido2($adminDb['apellido2']);
				$admin->setApellidoCasada($adminDb['apellidoCasada']);
				$admin->setEstado($adminDb['estado']);
				$admin->setURol($adminDb['uRol']);
				$admin->setNit($adminDb['nit']);
				$admin->setDpi($adminDb['dpi']);
				$admin->setIdSede($adminDb['idSede']);
				$admin->setIdQueja($adminDb['idQueja']);
				$admin->setNoDocumentoQueja($adminDb['noDocumentoQueja']);
				$admin->setDireccionSede($adminDb['direccionSede']);
				$admin->setAreaRol($adminDb['areaRol']);


				$listaAdmin[]= $admin;

			}
			return $listaAdmin;




		}




		public static function update($adminP){
			$db=Conexion::getConnect();
			$update=$db->prepare('UPDATE tbl_admin_caso SET idAdmin=:idAdmin, nombre1=:nombre1, nombre2=:nombre2, nombre3=:nombre3, apellido1=:apellido1, apellidoCasada=:apellidoCasada, estado=:estado, uRol=:uRol, nit=:nit, dpi=:dpi, idSede=:idSede, idQueja=:idQueja WHERE idAdmin=:idAdmin');

			$update->bindValue('idAdmin',$admin->getIdAdmin());
			$update->bindValue('nombre1', $adminP->getNombre1());
			$update->bindValue('nombre2', $adminP->getNombre2());
			$update->bindValue('nombre3', $adminP->getNombre3());
			$update->bindValue('apellido1', $adminP->getApellido1());
			$update->bindValue('apellido2', $adminP->getApellido2());
			$update->bindValue('apellidoCasada', $adminP->getApellidoCasada());
			$update->bindValue('estado', $adminP->getEstado());
			$update->bindValue('uRol', $adminP->getURol());
			$update->bindValue('nit', $adminP->getNit());
			$update->bindValue('dpi', $adminP->getDpi());

			$update->bindValue('idSede', $adminP->getIdSede());

			$update->bindValue('idQueja', $adminP->getIdQueja());


			$update->execute();
		}

		public static function delete($idcaso){
			$db=Conexion::getConnect();
			$delete=$db->prepare('UPDATE tbl_admin_caso SET estado = 0 where idAdmin = :idAdmin');
			$delete->bindValue('idAdmin',$idcaso);
			$delete->execute();

		}


	}
?>
