<!DOCTYPE HTML>

<?php
	 require_once('header.php');
   require_once('clasequeja.php');
   require_once('clasetipocm.php');
	 require_once('clasecuentas.php');
	 require_once('claseconsumidor');
	 require_once('claseestados');

   $tipoConsumidor = new TipoConsumidor();
   $listaTipoConsumidor=$tipoConsumidor->all();

 ?>
					<section id="menu">
					</section>


					<div id="main">


							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Registro de quejas</a></h2>
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

			     		<form method="POST" action="controladorqueja.php" autocomplete="on"><br />

                				<div class="form-group">
                        			<label>Numero de documento</label>
                        			<input type="text" required name="noDocumento" ID="noDocumento" class="form-control" placeholder="Ingrese su nacionalidad"><br/>
               					</div>
               					<div class="form-group">
                       				<label>serie del documento</label>
                       				<input type="text" required name="serieDocumento" ID="serieDocumento"  class="form-control" placeholder="Indique si es individual o Juridico"><br/>
             		   			</div>
             		   			<div class="form-group">
                        			<label>fecha del documento</label>
                        			<input type="date" required name="fechaDocumento"  ID="fechaDocumento"class="form-control" placeholder="Ingrese la zona de su residencia en numeros"><br/>
               					</div>
               					<div class="form-group">
                        			<label>Detalle de la queja presentada</label>
                        			<textarea type="text" required name="detalleQueja" ID="detalleQueja" class="form-control" placeholder="Ingrese el departamento o estado en que reside"></textarea><br/>
               					</div>
               					<div class="form-group">
                        			<label>Redacte su solicitud a Diaco</label>
                        			<textarea type="text" required name="solicitud" ID="solicitud" class="form-control" placeholder="Ingrese el muncipio o capital en la que reside"></textarea><br/>
               					</div>

                        <div class="row">


                            <div class="col-md-3">
                                  <input type="hidden" required ID="estado" name="estado" class="form-control" value="1"><br/>
                            </div>
                        </div>



                        <div class="form-group">
                              <label>TIpo Consumidor: </label>
                              <select class="costum-select" name="idConsumidor" id="idConsumidor">
                                <option selected value=0>Seleccione el tipo de consumidor...</option>
                                <?php
                                  foreach ($listaTipoConsumidor as $tipoConsumidor) {
                                    echo '<option value="'.$tipoConsumidor->getIdTipoConsumidor().'">'.$tipoConsumidor->getPersona().'</option>';
                                  }
                                 ?>

                              </select>
                              <br/>
                        </div>

                        <div class="form-group">

                        			<input type="hidden" required ID="idEstado" name="idEstado" class="form-control" value="1"><br/>
               					</div>

              					<div class = "btn-group-toggle" data-toggle="buttons">
              						<label class="btn btn-secundary active">
             			 			<input type="submit" name="accion" value="crear" >
           				 			</label>
          						</div>
      					</form>
      				<?php require_once('footer.php') ?>
