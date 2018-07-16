<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="views/images/favicon.ico" type="image/ico" />

    <title>P Y C</title>


    <link href="views/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="views/plugins/nprogress/nprogress.css" rel="stylesheet">
    <link href="views/plugins/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="views/plugins/iCheck/skins/line/green.css" rel="stylesheet">
    <link href="views/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="views/css/custom.min.css" rel="stylesheet">
    <link href="views/css/alertify.min.css" rel="stylesheet">
    <link href="views/css/default.min.css" rel="stylesheet">
    <link href="views/css/semantic.min.css" rel="stylesheet">
    <link href="views/css/dropify.min.css" rel="stylesheet">
    <link href="views/css/selectize.css" rel="stylesheet">
    <link href="views/css/selectize.default.css" rel="stylesheet">
    <link href="views/css/HoldOn.min.css" rel="stylesheet">
    <link href="views/css/jquery.dataTables.css" rel="stylesheet">

  </head>

  <body class="nav-md bg-white"id="body">
    
      
    <!-- ESTE ES EL TEMPLATE		   -->

	  
	  	<?php
		  	$modulos = new Enlaces();
			$modulos -> enlacesController();

		?>

    <script src="views/plugins/jquery/dist/jquery.min.js"></script>
    <script src="views/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="views/plugins/nprogress/nprogress.js"></script>
    <script src="views/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="views/plugins/iCheck/icheck.min.js"></script>
    <script src="views/plugins/DateJS/build/date.js"></script>
    <script src="views/plugins/moment/min/moment.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="views/js/alertify.min.js"></script>
    <script src="views/js/dropify.js"></script>
    <script src="views/js/selectize.min.js"></script>
    <script src="views/js/HoldOn.min.js"></script>
    <script src="views/js/jquery.dataTables.js"></script>
    <script src="views/js/mask.min.js"></script>
    <script src="views/js/custom.min.js"></script>
    <script src="views/js/ajax.js"></script>
    <script src="views/js/gestorPerfiles.js"></script>
    <script src="views/js/gestorClientes.js"></script>
    <script src="views/js/gestorTerritorios.js"></script>

    <script>
        $('.dropify').dropify({
             messages: {
                'default' : 'Arrastra un archivo o da click',
                'replace' : "Arrastra o da click para reemplazar",
                'remove' : 'Eliminar',
                'error' : 'Error, este archivo es muy pesado'
            }
        });

        $('.genero').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        $('.tipoUsuario').each(function(){
            var self = $(this),
              label = self.next(),
              label_text = label.text();

            label.remove();
            self.iCheck({
              checkboxClass: 'icheckbox_line-green',
              radioClass: 'iradio_line-green',
              insert: '<div class="icheck_line-icon"></div>' + label_text
            });
        });
        
        $("select").selectize({
            create: false,
            sortField: 'text',
            placeholder: 'Selecciona',
        })

        $("#tablaClientes").DataTable({
            bLengthChange: false,
            "bPaginate": true,
            "ordering" : true,
            // "order": [2,"desc"],
            "bFilter": true,
            "language": {
                "search": ""
            }
        });

        $('.phone').mask('(000)-00-00-00');

    </script>
	
  </body>
</html>


