<!DOCTYPE HTML>

<?php
	require_once('hearderadmin.php');
   require_once('claseconsumidor.php');
   require_once('clasesede.php');
	 require_once('clasetipocm.php');

   $tipoconsumidor = new TipoConsumidor();
   $listaTipoConsumidor=$tipoconsumidor->all();


	 $sedes = new Sedes();
	 $listaSedes=$sedes->all();






 ?>
					<section id="menu">
					</section>


					<div id="main">


							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Registro datos de Consumidor</a></h2>
										<p>Para registrar una queja anonima, unicamente debera proporcionar datos que sirvan a nuestros administradores, para dar seguimiento al caso.</p>
									</div>
									<div class="meta">
										<script>
										var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        var f=new Date();
                                        document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                        </script>
									</div>
								</header>
								<!--<span class="image featured"><img src="" alt="" /></span>-->
			     		<div style="border">
			     	    <p>
			     	    <span style="image featured"/>

			     		<form method="POST" action="controladorconsumidor.php" autocomplete="on"><br />

                				<div class="form-group">
                        			<label>Ingrese el departamento donde reside</label>
                        			<input type="text" required name="departamento" ID="departamento" class="form-control" placeholder="Ingrese el departamenteo del pais o la ciudad de su pais"><br/>
               					</div>
               					<div class="form-group">
                       				<label>Ingrese el muncipio del departamento en que reside o capital de su pais</label>
                       				<input type="text" required name="municipio" ID="municipio"  class="form-control" placeholder="Ingrese la capital, municipio o alguna referencia de su pais"><br/>
             		   			</div>
             		   			<div class="form-group">
                        			<label>Ingres su nacionalidad, si es extrangero(su pais de origen)</label>
                        			<input type="date" required name="nacionalidad"  ID="nacionalidad"class="form-control" placeholder="Ingrese la nacionalidad"><br/>
               					</div>
               					<div class="form-group">
                        			<label>Ingrese la zona donde reside o numero de referencia</label>
                        			<input type="text" required name="zona" ID="zona" class="form-control" placeholder="Ingrese la zona o numero de referencia de su ubicacion"></textarea><br/>
               					</div>


                        <div class="row">


                            <div class="col-md-3">
                                  <input type="hidden" required ID="estado" name="estado" class="form-control" value="1"><br/>
                            </div>
                        </div>


                      <div class="row">

                     <div class="col-md-3">
                        <input type="hidden" required ID="idCuenta" name="idCuenta" class="form-control" value="1"><br/>
                   </div>
                        </div>

                        <div class="form-group">
                                  <label>Seleccione la sede mas cercana</label>
                                  <select class="costum-select" name="idSede" id="idSede">
                                    <option selected value=0>Seleccione la sede a la que desea reportar su queja
                                    <?php
                                      foreach ($listaSedes as $idSede) {
                                        echo '<option value="'.$idSede->getIdSede().'">'.$idSede->getDepartamento().'</option>';
                                      }
                                     ?>

                                  </select>
                                  <br/>
                            </div>


														<div class="form-group">
														 <label>TIpo Consumidor: </label>
														 <select class="costum-select" name="idTipoConsumidor" id="idTipoConsumidor">
															 <option selected value=0>Seleccione el tipo de consumidor que presenta la queja</option>
															 <?php
																 foreach ($listaTipoConsumidor as $idTipoConsumidor) {
																	 echo '<option value="'.$idTipoConsumidor->getIdTipoConsumidor().'">'.$idTipoConsumidor->getPersona().'</option>';
																 }
																?>

														 </select>
														 <br/>
											 </div>


              					<div class = "btn-group-toggle" data-toggle="buttons">
              						<label class="btn btn-secundary active">
             			 			<input type="submit" name="accion" value="crear" >
           				 			</label>
          						</div>
      					</form>
      				<?php require_once('footer.php') ?>
