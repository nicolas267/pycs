



<div class="container body">
<div class="main_container">
<?php
    include "botonera.php";
    include "cabecera.php";

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2>Perfil</h2>
                <ul class="nav navbar-right panel_toolbox">
                   <!--  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li> -->
                    <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="profile_img">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="<?php echo $_SESSION["photo"]?>" alt="Avatar" title="Change the avatar">
                    </div>
                    </div>
                    <h3><?php echo $_SESSION["usuario"]?></h3>

                    <ul class="list-unstyled user_data">
                    <li><i class="fa fa-envelope user-profile-icon"></i> <?php echo $_SESSION["email"]?>
                    </li>

                    <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> <?php echo ($_SESSION["email"] == 0) ? "Administrador" : "Editor";?>
                    </li>
                    <li>
                        <a href="#" class="btn btn-primary" id="cambiarFoto">Cambiar foto</a>
                    </li>
                    </ul>
                    <br />

                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content_editar" role="tab" id="editar-tab" data-toggle="tab" aria-expanded="true">Editar perfil</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content_editar" aria-labelledby="editar-tab">

                                <div style="margin-top: 20px;">
                                <form action="" class="form-horizontal form-label-left" id="formActualizarInfo">

                                    <div class="item form-group">
                                        <label for="" class="control-label col-md-3">Nombre</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="editarUsuario" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $_SESSION["usuario"]?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="" class="control-label col-md-3">Contraseña</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" name="editarPassword" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="" class="control-label col-md-3">Email</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" name="editarEmail" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $_SESSION["email"]?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="" class="control-label col-md-3">Rol</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="editarRol" id="">
                                                <option value="0">Administrador</option>
                                                <option value="1">Editor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="" class="control-label col-md-3"></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button class="btn btn-success" id="actualizarInformacion">Guardar</button>
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
<!-- /page content -->

<div class="modal fade" id="modal-cambiar-foto" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="main-modal-body">
                <form id="formNuevaFoto">
                <div class="form-group">
                    <label for="" class="control-label">Selecciona una nueva foto</label>
                    <input type="file" name="nuevaFoto" class="dropify" required="required">
                </div>

                <button class="btn btn-success" id="guardarNuevaFoto">Guardar</button>

                </form>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

</div>
</div>
<?php
    include "footer.php";
?>