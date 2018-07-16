//REGISTRAR UN NUEVO CLIENTE

$("#guardarNuevoCliente").on("click",(e)=>{
    e.preventDefault()
    var formData = new FormData(document.getElementById("formNuevoCliente"));
    var error = false
    var cliente = $("#cliente")[0].checked,
        proveedor = $("#proveedor")[0].checked 

    if (!cliente && !proveedor) {
        error = 'Seleccione el tipo de cliente'
        $("#errorTipoUsuario").html(error)
    }else{
        $("#errorTipoUsuario").html('')
    }

    $("#formNuevoCliente div").removeClass('has-error')
    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            $("#"+key)[0].parentElement.className += " has-error"
            error = "Llene los campos obligatorios"
        }
    })
    formData.append("guardarCliente", "true");

    if(!error){
        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then(function(data){
                console.log(data)
                if(data.resp == "ok"){
                    var notification = alertify.notify(' OK ', 'success', 2, function(){
                        window.location = "clientes"
                    });
                }else{
                    $("#"+data.id).addClass('has-error')
                    var notification = alertify.notify(data.texto, 'error', 3);
                }
            })
    }else{
        var notification = alertify.notify(error, 'error', 3);
    }
})

//MOSTRAR LAS CIUDADES DE LAS PROVINCIAS

$("#provincia").on("change",()=>{
    var idProvincia = $("#provincia").val(); 
    OptionsAjax.data = {
        varCiudadesAjax: true,
        idProvincia : idProvincia
    }
    ajax.setData(OptionsAjax)
    ajax.ejecutar()
        .then((data)=>{
            // console.log(data)
            if(data.length != 0){
                $("#ciudades").html(`
                    <label for="ciudad" class="control-label">Ciudad</label>
                    <select name="ciudad" id="ciudad"></select>

                `)
                for(key in data){
                    $("#ciudad").append(`
                        <option value="` + data[key].idciudad + `">`  + data[key].ciudad +  `</option>
                    `)
                }
                $("select").selectize({
                    create: false,
                    sortField: 'text'
                })
            }
        })
})

//MOSTRAR LA INFORMACIÓN GENERAL DE LOS CLIENTES

$(".verInfoCliente").on("click",(e)=>{

    $("#ventanaInfoCliente").html(`
        <a href="#infoCliente" id="infoCliente-tab" role="tab" data-toggle="tab" aria-expanded="true">Información</a>
    `)
    $("#myTab li:first-child a").tab("show")

    var idCliente = e.target.accessKey
    OptionsAjax.data = {
        verCliente: true,
        idCliente : idCliente
    }
    ajax.setData(OptionsAjax)
    ajax.ejecutar()
        .then((array)=>{
            var data = array.cliente
            console.log(data)
            
            var sexo = data[0].sexo == "1" ? "Masculino" : "Femenino"
            
            var op1 = data[0].demanda == '1' ? "<span class='fa fa-check'></span>" : "<span class='fa fa-times'></span>",
                op2 = data[0].oferta == '1' ? "<span class='fa fa-check'></span>" : "<span class='fa fa-times'></span>",
                mensaje = data[0].foto == '' ? "No ha foto disponible" : ''
            
            $("#mostrarInfoCliente").html(`
                <div class="form-group col-md-6">
                    <div class="modal fade" id="modal-verfoto" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="modalLabel">`+data[0].nombre + ' ' + data[0].apellido +`</h4>
                                </div>
                                <div class="modal-body">
                                    <img src="` + data[0].foto +  `" style="width: 100%;">
                                    <h4>` + mensaje + `</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="panel panel-info">
                    <div class="panel-heading">`+data[0].nombre + ' ' + data[0].apellido +` </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Fecha de nacimiento</b> : `+data[0].fechanacimiento+`</li>
                            <li class="list-group-item"><b>DNI</b> : `+data[0].dni+`</li>
                            <li class="list-group-item"><b>Email</b> : `+data[0].email+`</li>
                            <li class="list-group-item"><b>Teléfono 1</b> : `+data[0].telefono1+` / <b>Teléfono 2</b> : `+data[0].telefono2+`</li>
                            <li class="list-group-item"><b>Provincia</b> : `+data[0].provincia+` / <b>Ciudad</b> : `+data[0].ciudad+`</li>
                            <li class="list-group-item"><b>Cliente</b> : ${op1}</li>
                            <li class="list-group-item"><b>Proveedor</b> : ${op2}</li>
                        </ul>
                        <div>
                            <h5><b>Dirección 1</b> : </h5>
                            <p class="help-block">`+data[0].direccion1+`</p>
                            <h5><b>Dirección 2</b> : </h5>
                            <p class="help-block">`+data[0].direccion2+`</p>
                        </div>
                        <button class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-verfoto">Foto</button>
                    </div>
                </div>
                        
            `)
        })
  
    return false
})

//BORRAR CLIENTES
$(".borrarCliente").on("click",(e)=>{
    var idCliente = e.target.accessKey

    alertify.confirm("<h4>¿Está seguro de borrar a este cliente?</h4>", function(){
        borrar()
    },function(){
        alertify.error("Cancelado")
    })
    function borrar(){

        OptionsAjax.data = {
            borrarCliente: true,
            idCliente : idCliente
        }
        ajax.setData(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                console.log(data)
                if (data.resp == 'ok') {
                     var notification = alertify.notify(' OK ', 'success', 1, function(){
                            window.location = "clientes"
                        });
                }else{
                    var notification = alertify.notify(data, 'error', 3);
                }
            })  
    }
})


//EDITAR CLIENTES

$(".editarCliente").on("click",(e)=>{

    var idCliente = e.target.accessKey
    $("#ventanaEditarCliente").html(`
        <a href="#editarCliente" id="editarCliente-tab" role="tab" data-toggle="tab" aria-expanded="true">Editar cliente</a>
    `)
    $("#myTab #ventanaEditarCliente a").tab("show")

    OptionsAjax.data = {
        verCliente: true,
        idCliente : idCliente
    }
    ajax.setData(OptionsAjax)
    ajax.ejecutar()
        .then((array)=>{
            // console.log(array)
            var cliente = array.cliente,
                provincias = array.provincias,
                ciudades = array.ciudades,
                provincia = cliente[0].provincia,
                lista = "",
                lista2 = "",
                checkCliente = cliente[0].demanda == 1 ? 'checked' : '',
                checkProveedor = cliente[0].oferta == 1 ? 'checked' : '',
                checkMasculino = cliente[0].sexo == 1 ? "checked" : '',
                checkFemenino = cliente[0].sexo == 0 ? "checked" : ''

            provincias.forEach(function(valor,key,obj){
                lista += "<option value='" + valor.idprovincia+ "'>"+valor.provincia+"</option>"
            })

            ciudades.forEach(function(valor,key,obj){
                lista2 += "<option value='" + valor.idciudad+ "'>"+valor.ciudad+"</option>"
            })

            $("#mostrarEditarCliente").html(`
                <form id="formEditarCliente">
                    <div>
                        <label id="errorTipoUsuarioAc" style="color: #a94442;"></label>
                        <div class="row">
                            <div class="form-group col-xs-12 col-md-6">
                                <input type="checkbox" ${checkCliente} class="tipoUsuarioEditar" id="nuevoCliente" name="nuevoCliente">
                                <label for="nuevoCliente">Cliente</label>
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <input type="checkbox" ${ checkProveedor} class="tipoUsuarioEditar" id="nuevoProveedor" name="nuevoProveedor">
                                <label for="nuevoProveedor">Proveedor</label>
                            </div>
                        </div>                                

                        <hr>
                        <div class="fila1 row">
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="nuevoNombre" class="control-label">Nombres *</label>
                                <input type="text" name="nuevoNombre" id="nuevoNombre" class="form-control" value="`+cliente[0].nombre+`">
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="nuevoApellido" class="control-label">Apellidos *</label>
                                <input type="text" name="nuevoApellido" id="nuevoApellido" class="form-control" value="`+cliente[0].apellido+`">
                            </div>
                        </div>
                        <div class="fila2 row">
                            <div class="form-group col-xs-12 col-md-6" id="contentEmailActualizar">
                                <label for="nuevoEmail" class="control-label">Email *</label>
                                <input type="email" name="nuevoEmail" id="nuevoEmail" class="form-control" value="`+cliente[0].email+`">
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="nuevoDni" class="control-label">DNI *</label>
                                <input type="text" name="nuevoDni" id="nuevoDni" class="form-control" value="`+cliente[0].dni+`">
                            </div>
                        </div>
                        <div class="fila3 row">
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="nuevoTelefono1" class="control-label">Teléfono 1 *</label>
                                <input type="text" name="nuevoTelefono1" id="nuevoTelefono1" class="form-control phone" value="`+cliente[0].telefono1+`">
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="nuevoTelefono2" class="control-label">Telefono 2 *</label>
                                <input type="text" name="nuevoTelefono2" id="nuevoTelefono2" class="form-control phone" value="`+cliente[0].telefono2+`">
                            </div>
                        </div>
                        <div class="fila4 row">
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="nuevaDireccion1" class="control-label">Dirección 1 *</label>
                                <textarea name="nuevaDireccion1" id="nuevaDireccion1" class="form-control">`+cliente[0].direccion1+`</textarea>
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="nuevaDireccion2" class="control-label">Dirección 2 *</label>
                                <textarea name="nuevaDireccion2" id="nuevaDireccion2" class="form-control">`+cliente[0].direccion2+`</textarea>
                            </div>
                        </div>
                        <div class="fila5 row">
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="nuevoPais" class="control-label">Pais</label>
                                <select name="nuevoPais" id="nuevoPais" class="lista">
                                    <option value="1">España</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="nuevaProvincia" class="control-label">Provincia</label>
                                <select name="nuevaProvincia" id="nuevaProvincia">
                                    <option></option>
                                    ${lista}
                                </select>
                            </div>
                        </div>
                        <div class="fila6 row">
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="nuevaFechaNacimiento">Fecha de nacimiento</label>
                                <input type="date" name="nuevaFechaNacimiento" id="nuevaFechaNacimiento" class="form-control" value="`+cliente[0].fechanacimiento+`">
                            </div>
                            <div class="form-group col-xs-12 col-md-6" id="nuevasCiudades">
                                <label for="ciudad" class="control-label">Ciudad</label>
                                <select name="nuevaCiudad" id="nuevaCiudad">
                                     ${lista2}                    
                                </select>
                            </div>
                        </div>
                        <div class="fila7 row">
                            <div class="form-group col-md-6">
                                <label for="hombre">Masculino</label>
                                <input type="radio" name="sexo" id="hombre" value="1" ${checkMasculino} class="genero">
                                <label for="mujer">Femenino</label>
                                <input type="radio" name="sexo" id="mujer" value="0" ${checkFemenino} class="genero">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="modal fade" id="modal-editar-foto" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="modalLabel">Cambiar foto</h4>
                                            </div>
                                            <div class="modal-body">
                                                <input type="file" name="nuevaFoto" id="nuevaFoto" class="dropify">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="text" name="idcliente" value="`+cliente[0].idcliente+`" hidden/>

                        <div class="fila6 row">
                            <div class="form-group col-md-12">
                                
                            </div>
                        </div>
                            
                    </div>
                </form>
                <div>
                    <button class="btn btn-success" id="actualizarCliente">Actualizar</button>
                    <button class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-editar-foto">Cambiar foto</button>
                </div>
            `)

            //MOSTRAR LAS CIUDADES DE LAS PROVINCIAS AL EDITAR
            $("#nuevaProvincia").on("change",()=>{
                var idProvincia = $("#nuevaProvincia").val();

                OptionsAjax.data = {
                    varCiudadesAjax: "true",
                    idProvincia : idProvincia
                }
                ajax.setData(OptionsAjax) 
                ajax.ejecutar()
                    .then((data)=>{
                        // console.log(data)
                        if(data.length != 0){
                            $("#nuevasCiudades").html(`
                                <label for="ciudad" class="control-label">Ciudad</label>
                                <select name="nuevaCiudad" id="nuevaCiudad"></select>
                            `)
                            for(key in data){
                                $("#nuevaCiudad").append(`
                                    <option value="` + data[key].idciudad + `">`  + data[key].ciudad +  `</option>
                                `)
                            }
                            $("select").selectize({
                                create: false,
                                sortField: 'text'
                            })
                        }
                    })
            })
           
            //GUARDAR ACTUALIZACIÓN
            $("#actualizarCliente").on("click",(e)=>{
                e.preventDefault()
                var formData = new FormData(document.getElementById("formEditarCliente"));
                var error = false

                var cliente = $("#nuevoCliente")[0].checked,
                    proveedor = $("#nuevoProveedor")[0].checked 

                if (!cliente && !proveedor) {
                    error = 'Seleccione el tipo de cliente'
                    $("#errorTipoUsuarioAc").html(error)
                }else{
                    $("#errorTipoUsuarioAc").html('')
                }

                formData.forEach((valor,key,obj)=>{
                    if(valor == ""){
                        $("#"+key)[0].parentElement.className += " has-error"
                        error = "Llene los campos obligatorios"
                    }
                })

                formData.append("actualizarCliente", "true");
                if(!error){
                    OptionsAjax.data = formData
                    ajax.setDataForm(OptionsAjax)
                    ajax.ejecutar()
                        .then((data)=>{
                            console.log(data)
                            if(data.resp == "ok"){
                                var notification = alertify.notify(' OK ', 'success', 3, function(){
                                    window.location = "clientes"
                                });
                            }else{
                                $("#"+data.id).addClass('has-error')
                                var notification = alertify.notify(data.texto, 'error', 3);
                            }
                        })
                }else{
                    var notification = alertify.notify(error, 'error', 3);
                }
            })


            return new Promise((resolve, reject)=>{
                resolve(cliente)
            })
        })
        .then((cliente)=>{

            //ACTIVANDO PLUGINS NUEVAMENTE
            $('.genero').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
            $('.tipoUsuarioEditar').each(function(){
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
            $('.dropify').dropify({
                 messages: {
                    'default' : 'Arrastra un archivo o da click',
                    'replace' : "Arrastra o da click para reemplazar",
                    'remove' : 'Eliminar',
                    'error' : 'Error, este archivo es muy pesado'
                }
            });
            $(".lista").selectize({
                create: false,
                sortField: 'text',
                placeholder: 'Selecciona',
            })
            $select = $("#nuevaProvincia").selectize({
                create: false,
                sortField: 'text',
                placeholder: 'Selecciona',
            })
            $select2 = $("#nuevaCiudad").selectize({
                create: false,
                sortField: 'text',
                placeholder: 'Selecciona',
            })
            control = $select[0].selectize
            control.setValue(cliente[0].idprovincia,1)
            control2 = $select2[0].selectize
            control2.setValue(cliente[0].idciudad,1)

        })

})