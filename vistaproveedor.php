<!DOCTYPE HTML>

<?php
	require_once('header.php');
   require_once('claseproveedor.php');
   require_once('clasetipocm.php');



   $tipoConsumidor = new TipoConsumidor();
   $listaTipoConsumidor=$tipoConsumidor->all();

 ?>
					<section id="menu">
					</section>


					<div id="main">


							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Registro de datos de proveedor o representante del servicio</a></h2>
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

			     		<form method="POST" action="controladorproveedor.php" autocomplete="on"><br />

                				<div class="form-group">
                        			<label>Ingrese correo</label>
                        			<input type="text" required name="correo" ID="correo" class="form-control" placeholder="Ingrese el correo"><br/>
               					</div>
               					<div class="form-group">
                       				<label>Ingrese departamento</label>
                       				<input type="text" required name="departamento" ID="departamento"  class="form-control" placeholder="Departamento"><br/>
             		   			</div>
             		   			<div class="form-group">
                        			<label>Ingrese direccion</label>
                        			<input type="text" required name="direccion"  ID="direccion"class="form-control" placeholder="direccion"><br/>
               					</div>
               					<div class="form-group">
                        			<label>Ingrese Empresa</label>
                        			<input type="text" required name="empresa" ID="empresa" class="form-control" placeholder="Empresa"></textarea><br/>
               					</div>
												<div class="form-group">
															<label>Ingrese Municipio</label>
															<input type="text" required name="municipio" ID="municipio" class="form-control" placeholder="Municipio"></textarea><br/>
												</div>
												<div class="form-group">
															<label>Ingrese nit</label>
															<input type="text" required name="nitRepresentante" ID="nitRepresentante" class="form-control" placeholder="Nit del representante de servicio o empresa"></textarea><br/>
												</div>
												<div class="form-group">
															<label>Ingrese razon Social</label>
															<input type="text" required name="razonSocial" ID="razonSocial" class="form-control" placeholder="Razon social a la que se dedica"></textarea><br/>
												</div>
												<div class="form-group">
															<label>Ingrese telefono</label>
															<input type="text" required name="telefono" ID="telefono" class="form-control" placeholder="Ingrese telefono"></textarea><br/>
												</div>
												<div class="form-group">
															<label>Ingrese zona de ubicacion de la empresa</label>
															<input type="text" required name="zona" ID="zona" class="form-control" placeholder="Ingrese la direccion de la empresa"></textarea><br/>
												</div>

                        <div class="row">


                            <div class="col-md-3">
                                  <input type="hidden" required ID="estado" name="estado" class="form-control" value="1"><br/>
                            </div>
                        </div>

												<div class="row">


                            <div class="col-md-3">
                                  <input type="hidden" required ID="idConsumidor" name="idConsumidor" class="form-control" value="1"><br/>
                            </div>
                        </div>


              					<div class = "btn-group-toggle" data-toggle="buttons">
              						<label class="btn btn-secundary active">
             			 			<input type="submit" name="accion" value="crear" >
           				 			</label>
          						</div>
      					</form>
      				<?php require_once('footer.php') ?>
