
								<footer>
									<ul class="stats">
										<li><a href="#">Califica nuestro servicio</a></li>
										<li><a href="#" class="icon solid fa-user">Bueno</a></li>
										<li><a href="#" class="icon solid fa-user">Deben Mejorar</a></li>
									</ul>
								</footer>
						    </span>
						    </p>
							</div>
							</article>

					</div>



			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>


	    <!-- DataTables CSS library -->
	    <link rel="stylesheet" type="text/css" href="css/css/datatables.min.css"/>
	    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>

	    <!-- jQuery library -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	    <!-- DataTables JS library -->
	    <script type="text/javascript" src="js/js/datatables.min.js"></script>

	     <!-- CSS CHECKBOX-->
	    <link href="bootstrap/bootstrap/css/bootstrap-toggle.css" rel="stylesheet">




	    <script type="text/javascript">


	        $(document).ready(function(){
	            $('#tablaQueja').DataTable({
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






	<script>
	  $(function() {
	    $('#activo').bootstrapToggle();
	  })
	</script>
	<!--  FIN Bootstrap CHECKBOX  -->


	</body>
</html>
