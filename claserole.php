<?php

class Role{

private $uRol;
private $area;
private $estado;



   public function getUrol(){
      return $this->uRol;
   }

   public function setUrol($uRol){
      $this->uRol = $uRol;
   }

   public function getArea(){
      return $this->area;
   }

   public function setArea($area){
      $this->area = $area;
   }

   public function getEstado(){
      return $this->estado;
   }

   public function setEstado($estado){
      $this->estado = $estado;
   }





      	 public static function save($rol){
            $db=Conexion::getConnect();
            $insert=$db->prepare('insert into tbl_role values (null, :area, :estado)');

            $insert->bindValue('uRol',$rol->getUrol());
            $insert->bindValue('area',$rol->getArea());
            $insert->bindValue('estado',$rol->getEstado());
            $insert->execute();
          }


      	public static function all(){
      			$db=Conexion::getConnect();
      			$listaRoles=[];



      			$select=$db->query('SELECT uRol, area, estado
      					from tbl_role
      					order by uRol');

      			foreach($select->fetchAll() as $rols{

      				$rolView = new role();
      				$rolView->setUrol($rols['uRol']);
      				$rolView->setArea($rols['area']);
      				$rolView->setEstado($rols['estado']);



      				$listaRoles[]= $rolView;

      			}
      			return $listaRoles;




      		}




      		public static function update($rols){
      			$db=Conexion::getConnect();
      			$update=$db->prepare('UPDATE tbl_role SET uRol=:uRol, area=:area');

            $update->bindValue('uRol',$rols->getUrol());
      			$update->bindValue('area',$rols->getArea());


      			$update->execute();
      		}

      		public static function delete($uRol){
      			$db=Conexion::getConnect();
      			$delete=$db->prepare('UPDATE tbl_role SET estado = 0 where uRol = :uRol');
      			$delete->bindValue('uRol',$uRol);
      			$delete->execute();

      		}










}










?>
