<?php  
require_once 'models/conexion.php';
require_once 'models/consulta.php';
require_once 'models/enlaces.php';
require_once 'models/gestorTerritorio.php';
require_once 'models/gestorPerfiles.php';
require_once 'models/gestorClientes.php';
require_once 'models/ingreso.php';


require_once 'controllers/enlaces.php';
require_once 'controllers/ingreso.php';
require_once 'controllers/gestorTerritorio.php';
require_once 'controllers/gestorPerfiles.php';
require_once 'controllers/gestorClientes.php';
require_once 'controllers/template.php';


$template = new templateControllers();
$template -> template();