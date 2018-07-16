
$("#gestorCiudades").on("click",()=>{
    $("#contProvincias").hide();
    $("#contCiudades").slideToggle();
    $("#gestorProvincias").removeClass("active")
    $("#gestorCiudades").addClass("active")
})
$("#gestorProvincias").on("click",()=>{
    $("#contCiudades").hide()
    $("#contProvincias").slideToggle();
    $("#gestorCiudades").removeClass("active")
    $("#gestorProvincias").addClass("active")
})

$("#opcionesProvincias").on("click",()=>{
    $("#otrasOpcionesProvincias").slideToggle()
    return false
})
$("#opcionesCiudades").on("click",()=>{
    $("#otrasOpcionesCiudades").slideToggle()
    return false
})



/*GESTOR PROVINCIAS*/

//MOSTRAR LAS CIUDADES DE LAS PROVINCIAS
$(".provincia").on("change",(e)=>{

    var id = e.target.id
    var cod = e.target.accessKey
    var idProvincia = $("#"+id).val(); 
    OptionsAjax.data = {
        varCiudadesAjax: "true",
        idProvincia : idProvincia
    }
    ajax.setData(OptionsAjax)
    ajax.ejecutar()
        .then((data)=>{
            // console.log(data)
            if(data.length != 0){
                $("#ciudades"+cod).html(`
                    <!-- <label for="ciudad" class="control-label">Ciudad</label> -->
                    <select name="ciudad">
                                                        
                    </select>

                `)
                for(key in data){
                    $(`#ciudades${cod} select`).append(`
                        <option value="` + data[key].idciudad + `">`  + data[key].ciudad +  `</option>
                    `)
                
                }

                $("select").selectize({
                    create: false,
                    sortField: 'text'
                })
            }else{
                var notification = alertify.notify('No hay ciudades disponibles', 'error', 3);
            }
        })
})

$(".provinciasIn").on("change",(e)=>{

    var id = e.target.id
    var cod = e.target.accessKey
    var idProvincia = $("#"+id).val(); 

    OptionsAjax.data = {
        varCiudadesInhabilitadas: "true",
        idProvincia : idProvincia
    }
    ajax.setData(OptionsAjax)
    ajax.ejecutar()
        .then((data)=>{
            // console.log(data)
            if(data.length != 0){
                $("#ciudades"+cod).html(`
                    <!-- <label for="ciudad" class="control-label">Ciudad</label> -->
                    <select name="ciudad">
                                                        
                    </select>

                `)
                for(key in data){
                    $(`#ciudades${cod} select`).append(`
                        <option value="` + data[key].idciudad + `">`  + data[key].ciudad +  `</option>
                    `)
                
                }

                $("select").selectize({
                    create: false,
                    sortField: 'text'
                })
            }else{
                var notification = alertify.notify('No hay ciudades disponibles', 'error', 3);
            }
        })
})

//AGREGAR PROVINCIA
$("#agregarProvincia").on("click",(e)=>{
    e.preventDefault()

    var formData = new FormData(document.getElementById("formAgregarProvincia"));
    var error = false

    $("#formAgregarProvincia div").removeClass('has-error')
    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            $("#"+key)[0].parentElement.className += " has-error"
            error = "Llene los campos obligatorios"
        }
    })
    formData.append('agregarProvincia','true')

    if (!error) {
        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                console.log(data)
                if (data.resp == "ok") {
                    var notification = alertify.notify('Provincia agregada', 'success', 2, function(){
                        window.location = "gestorTerritorio"
                    });
                }else{
                    var notification = alertify.notify(data, 'error', 3);
                }
            })
    }else{
        var notification = alertify.notify(error, 'error', 3);
    }
})

//INHABILITAR PRIVINCIA
$("#inhabilitarProvincia").on("click",(e)=>{

    e.preventDefault()

    var formData = new FormData(document.getElementById("formInhabilitarProvincia"));
    var error = false

    $("#formInhabilitarProvincia div").removeClass('has-error')
    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            $("#"+key)[0].parentElement.className += " has-error"
            error = "Llene los campos obligatorios"
        }
    })
    formData.append('inhabilitarProvincia','true')

    if (!error) {
        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                // console.log(data)
                if (data.resp == "ok") {
                    var notification = alertify.notify('Provincia Inhabilitada', 'success', 2, function(){
                        window.location = "gestorTerritorio"
                    });
                }else{
                    var notification = alertify.notify(data, 'error', 3);
                }
            })
    }else{
        var notification = alertify.notify(error, 'error', 3);
    }

})

//HABILITAR PRIVINCIA
$("#habilitarProvincia").on("click",(e)=>{

    e.preventDefault()

    var formData = new FormData(document.getElementById("formHabilitarProvincia"));
    var error = false

    $("#formHabilitarProvincia div").removeClass('has-error')
    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            $("#"+key)[0].parentElement.className += " has-error"
            error = "Llene los campos obligatorios"
        }
    })
    formData.append('habilitarProvincia','true')

    if (!error) {
        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                // console.log(data)
                if (data.resp == "ok") {
                    var notification = alertify.notify('Provincia habilitada', 'success', 2, function(){
                        window.location = "gestorTerritorio"
                    });
                }else{
                    var notification = alertify.notify(data, 'error', 3);
                }
            })
    }else{
        var notification = alertify.notify(error, 'error', 3);
    }
})
//ELIMINAR PRIVINCIA
$("#eliminarProvincia").on("click",(e)=>{
    e.preventDefault()

    var formData = new FormData(document.getElementById("formEliminarProvincia"));
    var error = false

    $("#formEliminarProvincia div").removeClass('has-error')
    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            $("#"+key)[0].parentElement.className += " has-error"
            error = "Llene los campos obligatorios"
        }
    })
    formData.append('eliminarProvincia','true')

    alertify.confirm("<h5>¿Está seguro de borrar esta provincia? se borrán todas sus ciudades.</h5>", function(){
        borrar()
    },function(){
        alertify.error("Cancelado")
    })

    function borrar(){
        if (!error) {
            OptionsAjax.data = formData
            ajax.setDataForm(OptionsAjax)
            ajax.ejecutar()
                .then((data)=>{
                    if (data.resp == "ok") {
                        var notification = alertify.notify('Provincia eliminada', 'success', 2, function(){
                            window.location = "gestorTerritorio"
                        });
                    }else{
                        var notification = alertify.notify(data, 'error', 3);
                    }
                })
        }else{
            var notification = alertify.notify(error, 'error', 3);
        }
    }

        

})

/*FIN DE GESTOR PROVINCIAS*/

//-------------------------------------------------------------------------------------------------------

/*GESTOR CIUDADES*/

//AGREGAR CIUDAD
$("#agregarCiudad").on("click",(e)=>{
    e.preventDefault()

    var formData = new FormData(document.getElementById("formAgregarCiudad"));
    var error = false

    $("#formAgregarCiudad div").removeClass('has-error')
    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            $("#"+key)[0].parentElement.className += " has-error"
            error = "Llene los campos obligatorios"
        }
    })
    formData.append('agregarCiudad','true')

    if (!error) {
        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                console.log(data)
                if (data.resp == "ok") {
                    var notification = alertify.notify('Ciudad agregada', 'success', 2, function(){
                        window.location = "gestorTerritorio"
                    });
                }else{
                    var notification = alertify.notify(data, 'error', 3);
                }
            })
    }else{
        var notification = alertify.notify(error, 'error', 3);
    }
})

//HABILITAR CIUDAD
$("#habilitarCiudad").on("click",(e)=>{

    e.preventDefault()

    var formData = new FormData(document.getElementById("formHabilitarCiudad"));
    var error = false

    $("#formHabilitarCiudad div").removeClass('has-error')
    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            $("#"+key)[0].parentElement.className += " has-error"
            error = "Llene los campos obligatorios"
        }
    })
    formData.append('habilitarCiudad','true')
    if (!error) {
        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                console.log(data)
                if (data.resp == "ok") {
                    var notification = alertify.notify('Ciudad habilitada', 'success', 2, function(){
                        window.location = "gestorTerritorio"
                    });
                }else{
                    var notification = alertify.notify(data, 'error', 3);
                }
            })
    }else{
        var notification = alertify.notify(error, 'error', 3);
    }

})

//INHABILITAR CIUDAD
$("#inhabilitarCiudad").on("click",(e)=>{

    e.preventDefault()

    var formData = new FormData(document.getElementById("formInhabilitarCiudad"));
    var error = false

    $("#formInhabilitarCiudad div").removeClass('has-error')
    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            $("#"+key)[0].parentElement.className += " has-error"
            error = "Llene los campos obligatorios"
        }
    })
    formData.append('inhabilitarCiudad','true')

    if (!error) {
        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                console.log(data)
                if (data.resp == "ok") {
                    var notification = alertify.notify('Ciudad Inhabilitada', 'success', 2, function(){
                        window.location = "gestorTerritorio"
                    });
                }else{
                    var notification = alertify.notify(data, 'error', 3);
                }
            })
    }else{
        var notification = alertify.notify(error, 'error', 3);
    }

})

//ELIMINAR PRIVINCIA
$("#eliminarCiudad").on("click",(e)=>{

    e.preventDefault()
    var formData = new FormData(document.getElementById("formEliminarCiudad"));
    var error = false

    $("#formEliminarCiudad div").removeClass('has-error')
    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            $("#"+key)[0].parentElement.className += " has-error"
            error = "Llene los campos obligatorios"
        }
    })
    formData.append('eliminarCiudad','true')

    if (!error) {
        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                console.log(data)
                if (data.resp == "ok") {
                    var notification = alertify.notify('Ciudad eliminada', 'success', 2, function(){
                        window.location = "gestorTerritorio"
                    });
                }else{
                    var notification = alertify.notify(data, 'error', 3);
                }
            })
    }else{
        var notification = alertify.notify(error, 'error', 3);
    }
})