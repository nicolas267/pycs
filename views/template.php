<!DOCTYPE html>
<html>
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="views/images/favicon.ico" type="image/ico" />

    <title>P Y C</title>

    <!-- Bootstrap -->
    <link href="views/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="views/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="views/plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="views/plugins/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="views/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="views/plugins/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="views/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="views/css/custom.min.css" rel="stylesheet">
    <link href="views/css/alertify.min.css" rel="stylesheet">
    <link href="views/css/default.min.css" rel="stylesheet">
    <link href="views/css/semantic.min.css" rel="stylesheet">
    <link href="views/css/dropify.min.css" rel="stylesheet">
    <link href="views/css/selectize.css" rel="stylesheet">
    <link href="views/css/selectize.default.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="views/css/HoldOn.min.css">
    <link rel="stylesheet" type="text/css" href="views/css/jquery.dataTables.css">

  </head>

  <body class="nav-md bg-white"id="body">
    
      
    <!-- ESTE ES EL TEMPLATE		   -->

	  
	  	<?php
		  	$modulos = new Enlaces();
			$modulos -> enlacesController();

		?>

    <!-- jQuery -->
    <script src="views/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="views/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="views/plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="views/plugins/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="views/plugins/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="views/plugins/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="views/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="views/plugins/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="views/plugins/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="views/plugins/Flot/jquery.flot.js"></script>
    <script src="views/plugins/Flot/jquery.flot.pie.js"></script>
    <script src="views/plugins/Flot/jquery.flot.time.js"></script>
    <script src="views/plugins/Flot/jquery.flot.stack.js"></script>
    <script src="views/plugins/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="views/plugins/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="views/plugins/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="views/plugins/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="views/plugins/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="views/plugins/jqvmap/dist/jquery.vmap.js"></script>
    <script src="views/plugins/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="views/plugins/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="views/plugins/moment/min/moment.min.js"></script>
    <script src="views/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="views/js/alertify.min.js"></script>
    <script src="views/js/dropify.js"></script>
    <script src="views/js/selectize.min.js"></script>
    <script src="views/js/HoldOn.min.js"></script>
    <script src="views/js/jquery.dataTables.js"></script>
    <script src="views/js/mask.min.js"></script>
    <script src="views/js/custom.min.js"></script>
    <script src="views/js/gestorPerfiles.js"></script>
    <script src="views/js/gestorClientes.js"></script>
    <script src="views/js/gestorIngreso.js"></script>
    <script src="views/js/gestorTerritorios.js"></script>

    <script>
        $('.dropify').dropify({
             messages: {
                'default' : 'Arrastra un archivo o da click',
                'replace' : "Arrastra o da click para reemplazar",
                'remove' : 'Eliminar',
                'error' : 'Error, este archivo es muy pesado'
            },
            // maxFileSize : 15000
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


