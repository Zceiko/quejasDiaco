<!DOCTYPE HTML>

<?php
	require_once('header.php');
   require_once('clasecuentas.php');

 ?>
					<section id="menu">
					</section>


					<div id="main">


							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Registro de quejas</a></h2>
										<p>Registrese en la plataforma para registrar su queja</p>
										<p>Se requiere usuario para control interno, no se le pediran mas datos personales, para resguardar su confidencialidad</p>
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

			     		<form method="POST" action="controladorcuenta.php" autocomplete="on"><br />

                				<div class="form-group">
                        			<label>Registre un correo elecrtonico</label>
                        			<input type="email" required name="correo" ID="correo" class="form-control" placeholder="Ingrese su correo"><br/>
               					</div>
               					<div class="form-group">
                       				<label>Registre una clave de acceso</label>
                       				<input type="password" required minlength="7" name="clave" ID="clave"  class="form-control" placeholder="su clave debe contener al menos 7 caracteres"><br/>
             		   			</div>

                        <div class="row">
                        <div class="col-md-3">
                                  <input type="hidden" required ID="estado" name="estado" class="form-control" value="1"><br/>
                            </div>
                        </div>



              					<div class = "btn-group-toggle" data-toggle="buttons">
              						<label class="btn btn-secundary active">
             			 			<input type="submit" name="accion" value="crear" >
           				 			</label>
          						</div>
      					</form>
      				<?php require_once('footer.php') ?>
