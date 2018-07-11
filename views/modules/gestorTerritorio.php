
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
                            <h2>Gestionar provincias y ciudades</h2>
                            <ul class="nav navbar-right panel_toolbox list-group">
                                <li class="list-group-item active" style="border-radius: 3px 0px 0px 3px;" id="gestorProvincias">Provincias</li>
                                <li class="list-group-item" style="border-radius: 0px 3px 3px 0px;" id="gestorCiudades">Ciudades</li>
                            </ul>
                            <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="row" id="contProvincias">

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">AGREGAR PROVINCIA</div>
                                                <div class="panel-body">
                                                   <form id="formAgregarProvincia">
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="pais" class="control-label">Pais</label> -->
                                                            <select name="pais" id="pais">
                                                                <option value="1">España</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="pais" class="control-label">Provincia</label> -->
                                                            <input type="text" name="nuevaProvincia" id="nuevaProvincia" class="form-control" placeholder="Provincia">
                                                        </div>
                                                        
                                                        <button class="btn btn-primary pull-right" id="agregarProvincia">Agregar</button>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="panel panel-warning">
                                                <div class="panel-heading">INHABILITAR PROVINCIA</div>
                                                <div class="panel-body">
                                                   <form id="formInhabilitarProvincia">
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="pais" class="control-label">Pais</label> -->
                                                            <select name="pais2" id="pais2">
                                                                <option value="1">España</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="" class="control-label">Provincia</label> -->
                                                            <select name="provinciaInhabilitar" id="provinciaInhabilitar">
                                                                <option></option>
                                                                
                                                                <?php 

                                                                    $fn = GestorTerritorioController::verProvincias();

                                                                 ?>

                                                            </select>
                                                        </div>
                                                        <button class="btn btn-warning pull-right" id="inhabilitarProvincia">Inhabilitar</button>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
                                    <a  class="btn btn-link" id="opcionesProvincias">Otras opciones</a>
                                    <hr>
                                    <div class="row" style="display: none;" id="otrasOpcionesProvincias">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">HABILITAR PROVINCIA</div>
                                                <div class="panel-body">
                                                    <form id="formHabilitarProvincia">
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="pais" class="control-label">Pais</label> -->
                                                            <select name="paisA" id="paisA">
                                                                <option value="1">España</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="" class="control-label">Provincia</label> -->
                                                            <select name="provinciaHabilitar" id="provinciaHabilitar">
                                                                <option></option>
                                                                
                                                                <?php 

                                                                    $fn = GestorTerritorioController::verProvinciasInhabilitadas();

                                                                 ?>

                                                            </select>
                                                        </div>
                                                        <button class="btn btn-success pull-right" id="habilitarProvincia">Habilitar</button>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="panel panel-danger">
                                                <div class="panel-heading">ELIMINAR PROVINCIA</div>
                                                <div class="panel-body">
                                                   <form id="formEliminarProvincia">
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="pais" class="control-label">Pais</label> -->
                                                            <select name="paisE" id="paisE">
                                                                <option value="1">España</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="" class="control-label">Provincia</label> -->
                                                            <select name="provinciaEliminar" id="provinciaEliminar">
                                                                <option></option>
                                                                
                                                                <?php 

                                                                    $fn = GestorTerritorioController::verProvincias();

                                                                 ?>

                                                            </select>
                                                        </div>
                                                        <button class="btn btn-danger pull-right" id="eliminarProvincia">Eliminar</button>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                       
                                </div>


                                <div class="row" id="contCiudades" style="display: none;">
                                    
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">AGREGAR CIUDAD</div>
                                                <div class="panel-body">
                                                   <form id="formAgregarCiudad">
                                                       <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="provincia" class="control-label">Provincia</label> -->
                                                            <select name="provinciaC" id="provinciaC" accesskey="1">
                                                                <option></option>
                                                                
                                                                <?php 

                                                                    $fn = GestorTerritorioController::verProvincias();

                                                                 ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="pais" class="control-label">Provincia</label> -->
                                                            <input type="text" name="nuevaCiudad" id="nuevaCiudad"  class="form-control" placeholder="Nueva Ciudad" />
                                                        </div>
                                                        <button class="btn btn-primary pull-right" id="agregarCiudad">Agregar</button>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="panel panel-warning">
                                                <div class="panel-heading">INHABILITAR CIUDAD</div>
                                                <div class="panel-body">
                                                   <form id="formInhabilitarCiudad">
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="provincia" class="control-label">Provincia</label> -->
                                                            <select name="provinciaI" class="provincia" id="provinciaI" accesskey="2">
                                                                <option></option>
                                                                
                                                                <?php 

                                                                    $fn = GestorTerritorioController::verProvincias();

                                                                 ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12" id="ciudades2">
                                                                    
                                                         
                                                        </div>
                                                        <button class="btn btn-warning pull-right" id="inhabilitarCiudad">Inhabilitar</button>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a  class="btn btn-link" id="opcionesCiudades">Otras opciones</a>
                                    <hr>

                                    <div class="row" id="otrasOpcionesCiudades" style="display: none;">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">HABILITAR CIUDAD</div>
                                                <div class="panel-body">
                                                   <form id="formHabilitarCiudad">
                                                       <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="provincia" class="control-label">Provincia</label> -->
                                                            <select name="provinciaCiudadHabilitar" class="provinciasIn" id="provinciaCiudadHabilitar" accesskey="1">
                                                                <option></option>
                                                                
                                                                <?php 

                                                                    $fn = GestorTerritorioController::verProvinciasDeCiudadesInhabilitadas();

                                                                 ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12" id="ciudades1">
                                                            
                                                        </div>
                                                        <button class="btn btn-success pull-right" id="habilitarCiudad">Habilitar</button>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="panel panel-danger">
                                                <div class="panel-heading">ELIMINAR CIUDAD</div>
                                                <div class="panel-body">
                                                   <form id="formEliminarCiudad">
                                                       <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                                            <!-- <label for="provincia" class="control-label">Provincia</label> -->
                                                            <select name="provinciaE" class="provincia" id="provinciaE" accesskey="3">
                                                                <option></option>
                                                                
                                                                <?php 

                                                                    $fn = GestorTerritorioController::verProvincias();

                                                                 ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12" id="ciudades3">
                                                           
                                                        </div>
                                                        <button class="btn btn-danger pull-right" id="eliminarCiudad">Eliminar</button>
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
</div>

<?php
    include "footer.php";
?>