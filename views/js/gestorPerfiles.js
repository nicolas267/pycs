
//REGISTRAR UN NUEVO USUARIO
$("#guardarNuevoUsuario").on("click",(e)=>{
    var formData = new FormData(document.getElementById("formNuevoUsuario"));
    var error = false
    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            error = "Todos los campos son obligatorios"
        }
    })
    if(!error){
        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                console.log(data)
                if(data.resp == "ok"){
                    var notification = alertify.notify('Usuario agragado', 'success', 2, function(){
                        window.location = "registro"
                    });
                }else{
                    var notification = alertify.notify(data, 'error', 2);
                }
            })
    }else{
        var notification = alertify.notify(error, 'error', 2);
    }
    return false

})

//CAMBIAR LA FOTO DE PERFIL USUAIO ACTUAL

$("#cambiarFoto").on("click",()=>{
    $("#modal-cambiar-foto").modal("show");
    $("#guardarNuevaFoto").on("click",(e)=>{
        e.preventDefault()
        var formData = new FormData(document.getElementById("formNuevaFoto"));
            formData.append("nuevaFoto","true")

        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                console.log(data)
                if(data.resp == "ok"){
                    var notification = alertify.notify('Foto actualizada', 'success', 2, function(){
                        window.location = "profile"
                    });
                }else{
                    var notification = alertify.notify(data, 'error', 2);
                }
            })
    })
})

//ACTUALIZAR INFORMACIÓN DEL PERFIL
$("#actualizarInformacion").on("click",()=>{

    var formData = new FormData(document.getElementById("formActualizarInfo"));
        formData.append("actualizarInfo","true")

    var error = false

    formData.forEach((valor,key,obj)=>{
        if(valor == ""){
            error = "Todos los campos son obligatorios"
        }
    })
    if(!error){
        OptionsAjax.data = formData
        ajax.setDataForm(OptionsAjax)
        ajax.ejecutar()
            .then((data)=>{
                // console.log(data)
                if(data.resp == "ok"){
                    var notification = alertify.notify('Información actualizada', 'success', 2, function(){
                        window.location = "profile"
                    });
                }else{
                    var notification = alertify.notify(data, 'error', 2);
                }
            })
    }else{
        var notification = alertify.notify(error, 'error', 2);
    }
        


    return false
})

