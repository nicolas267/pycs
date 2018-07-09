



<div class="container body">
<div class="main_container">
<?php
    include "botonera.php";
    include "cabecera.php";

?>


<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3></h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Registrar nuevo usuario <small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">

            <form class="form-horizontal form-label-left" id="formNuevoUsuario">
                <span class="section">Información</span>

                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Usuario <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nuevoUsuario" placeholder="" required="required" type="text">
                </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" id="email" name="nuevoEmail" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                </div>
                <div class="item form-group">
                <label for="password" class="control-label col-md-3">Contraseña</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="password" type="password" name="nuevoPassword" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol">rol</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="rol" id="">
                        <option value="0">Administrador</option>
                        <option value="1">Editor</option>
                    </select>
                </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Foto</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="foto" name="nuevaImagen" data-validate-linked="foto" class="col-md-7 col-xs-12">
                </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button id="guardarNuevoUsuario" type="submit" class="btn btn-success">Submit</button>
                </div>
                </div>
            </form>

            <div id="mensaje_error"></div>
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