
<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(!$_SESSION["validar"]){

    header("location:ingreso");

    exit();

    }

?>
<div class="container body">
    <div class="main_container">

        <?php
            include "botonera.php";
            include "cabecera.php";
        ?>
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h2>Gestionar clientes</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li> -->
                                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                            </ul>
                            <div class="clearfix"></div>
                            </div>
                            <div class="x_content">


                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" id="ventanaInfoCliente"></li>
                                        <li role="presentation" class="active">
                                            <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Clientes</a>
                                        </li>
                                         <li role="presentation" id="ventanaEditarCliente"></li>
                                        <li role="presentation" class="">
                                            <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Agregar Cliente</a>
                                        </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade" id="infoCliente" aria-labelledby="infoCliente-tab">
                                            <div id="mostrarInfoCliente"></div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                            <table id="tablaClientes" class="display table table-responsive table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>NOMBRE</th>
                                                        <th>APELLIDO</th>
                                                        <th>DNI</th>
                                                        <th>EMAIL</th>
                                                        <th>TELÉFONO1</th>
                                                        <th>PROVINCIA</th>
                                                        <th>CIUDAD</th>
                                                        <th>OPCIONES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $fn = new GestorClientesController();
                                                        $fn -> verClientes(); 
                                                    ?>
                                                </tbody>
                                            </table>
                                           
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="editarCliente" aria-labelledby="editarCliente-tab">
                                            <div id="mostrarEditarCliente"></div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                    
                                            <div class="contentForm">
                                                <form id="formNuevoCliente">
                                                    <div>
                                                        <label id="errorTipoUsuario" style="color: #a94442;"></label>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <input type="checkbox" checked class="tipoUsuario" id="cliente" name="cliente">
                                                                <label for="clientes">Cliente</label>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <input type="checkbox" class="tipoUsuario" id="proveedor" name="proveedor">
                                                                <label for="proveedor">Proveedor</label>
                                                            </div>
                                                        </div>                                

                                                        <hr>
                                                        <div class="fila1 row">
                                                            <div class="form-group col-md-6">
                                                                <label for="nombre" class="control-label">Nombres *</label>
                                                                <input type="text" name="nombre" id="nombre" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="apellido" class="control-label">Apellidos *</label>
                                                                <input type="text" name="apellido" id="apellido" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="fila2 row">
                                                            <div class="form-group col-md-6" id="contentEmail">
                                                                <label for="email" class="control-label">Email *</label>
                                                                <input type="email" name="email" id="email" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="dni" class="control-label">DNI *</label>
                                                                <input type="text" name="dni" id="dni" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="fila3 row">
                                                            <div class="form-group col-md-6">
                                                                <label for="telefono1" class="control-label">Teléfono 1 *</label>
                                                                <input type="text" name="telefono1" id="telefono1" class="form-control phone">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="telefono2" class="control-label">Telefono 2 *</label>
                                                                <input type="text" name="telefono2" id="telefono2" class="form-control phone">
                                                            </div>
                                                        </div>
                                                        <div class="fila4 row">
                                                            <div class="form-group col-md-6">
                                                                <label for="direccion1" class="control-label">Dirección 1 *</label>
                                                                <textarea name="direccion1" id="direccion1" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="direccion2" class="control-label">Dirección 2 *</label>
                                                                <textarea name="direccion2" id="direccion2" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="fila5 row">
                                                            <div class="form-group col-md-6">
                                                                <label for="pais" class="control-label">Pais</label>
                                                                <select name="pais" id="pais">
                                                                    <option value="1">España</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="provincia" class="control-label">Provincia</label>
                                                                <select name="provincia" id="provincia">
                                                                    <option></option>
                                                                    
                                                                    <?php 

                                                                        $fn = GestorTerritorioController::verProvincias();

                                                                     ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="fila6 row">
                                                            <div class="form-group col-md-6">
                                                                <label for="fechaNacimiento">Fecha de nacimiento</label>
                                                                <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6" id="ciudades">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="fila7 row">
                                                            <div class="form-group col-md-6">
                                                                <label for="hombre">Masculino</label>
                                                                <input type="radio" name="sexo" id="hombre" value="1" checked class="genero">
                                                                <label for="mujer">Femenino</label>
                                                                <input type="radio" name="sexo" id="mujer" value="0" class="genero">
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="fila6 row">
                                                            <div class="form-group col-md-12">
                                                                <button class="btn btn-success" id="guardarNuevoCliente">Guardar</button>
                                                            </div>
                                                        </div>
                                                            
                                                    </div>
                                                </form>
                                                   
                                            </div>
                                        </div>
                                            
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "footer.php";
?>