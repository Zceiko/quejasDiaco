<!DOCTYPE HTML>

<?php
	require_once('hearderadmin.php');
  require_once('clasequeja.php');

	 $queja = new Queja();
	 $listaQueja=$queja->all();



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


								<div class="card-body table-full-width table-responsive">
										<table class="table table-bordered table-hover" id='tablaQueja'>
											<thead>
													<tr>
															<th>No de Queja</th>
															<th>No Documento</th>
															<th>Serie Documento</th>
															<th>Fecha Documento</th>
															<th>Detalle Queja</th>
															<th>Solicitud</th>
															<th>Estado</th>
															<th>Codigo cuenta Consumidor</th>
															<th>Estado del proceso de la queja</th>
															<th>Acciones</th>
													</tr>
											</thead>
												<tbody>
												<!-- aca se itera la lista de las categorias  y se va sacando cada categoria  -->
												<?php foreach ($listaQueja as $queja) {?>
														<tr>
														<td id="#idQueja"><?php echo $queja->getIdQueja();?></td>
														<td><?php echo $queja->getNoDocumento();?></td>
														<td><?php echo $queja->getSerieDocumento();?></td>
														<td><?php echo $queja->getFechaDocumento();?></td>
														<td><?php echo $queja->getDetalleQueja();?></td>
														<td><?php echo $queja->getSolicitud();?></td>
														<td>
																<?php if ( $queja->getEstado()=='checked'):?>
																		Activo
																<?php  else:?>
																		Inactivo
																<?php endif; ?>
														</td>
														<td><?php echo $queja->getPersona();?></td>
														<td><?php echo $queja->getEstadoCaso();?></td>

														<td>
																<a href="vistaquejaeditar.php?idQueja=<?php echo $queja->getIdQueja()?>&accion=editar" class="btn btn-sm " role="button" aria-pressed="true" title="Modificar" data-position= 'top center'>
																<i class="fas fa-pencil-alt"></i>
																</a>
																<a  id="aEliminar" href="#" class="btn btn-sm" role="button" aria-pressed="true" title="Eliminar" data-position= 'top center'>
																<i class="far fa-trash-alt"></i>
																</a>
														</td>

																</tr>
																<?php } ?>
														</tbody>
												</table>
										</div>




      					</form>


								<script type="text/javascript">
						        $(document).ready(function(){
						            $('#dt_form').DataTable({
						                "language": {


						                "sProcessing":     "Procesando...",
						                "sLengthMenu":     "Mostrar _MENU_ registros",
						                "sZeroRecords":    "No se encontraron resultados",
						                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
						                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
						                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
						                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						                "sInfoPostFix":    "",
						                "sSearch":         "Buscar:",
						                "sUrl":            "",
						                "sInfoThousands":  ",",
						                "sLoadingRecords": "Cargando...",
						                "oPaginate": {
						                    "sFirst":    "Primero",
						                    "sLast":     "Último",
						                    "sNext":     "Siguiente",
						                    "sPrevious": "Anterior"
						                },
						                "oAria": {
						                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
						                },
						                "buttons": {
						                    "copy": "Copiar",
						                    "colvis": "Visibilidad"
						                }



						                }
						            });
						        });


						    </script>




      				<?php require_once('footer.php') ?>
