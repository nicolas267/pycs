
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
        $.ajax({
            url: 'views/ajax/ajax.php',
            type: 'POST',
            dataType : 'JSON',
            data: formData,
		    cache: false,
            contentType: false,
            processData: false
        })
        .done(function(data){
            console.log(data)
            if(data.resp == "ok"){
                var notification = alertify.notify('Usuario agragado', 'success', 2, function(){
                    window.location = "registro"
                });
            }else{
                var notification = alertify.notify(data, 'error', 2);
            }
        })
        .fail(function(data){
            console.log("fail")
            console.log(data)
            $("#mensaje_error").html(data.responseText)
        })
    }else{
        var notification = alertify.notify(error, 'error', 2);
    }


    return false

})
//CAMBIAR LA FOTO DE PERFIL
$("#cambiarFoto").on("click",()=>{
    $("#modal-cambiar-foto").modal("show");

    $("#guardarNuevaFoto").on("click",(e)=>{
        e.preventDefault()
        var formData = new FormData(document.getElementById("formNuevaFoto"));
            formData.append("nuevaFoto","true")
        $.ajax({
            url: 'views/ajax/ajax.php',
            type: 'POST',
            dataType: 'JSON',
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(data){
            console.log(data)
            if(data.resp == "ok"){
                var notification = alertify.notify('Foto actualizada', 'success', 2, function(){
                    window.location = "profile"
                });
            }else{
                var notification = alertify.notify(data, 'error', 2);
            }
        })
        .fail(function(data){
            console.log("fail")
            console.log(data)
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
        $.ajax({
            url: 'views/ajax/ajax.php',
            type: 'POST',
            dataType: "JSON",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(data){
            // console.log(data)
            if(data.resp == "ok"){
                var notification = alertify.notify('Información actualizada', 'success', 2, function(){
                    window.location = "profile"
                });
            }else{
                var notification = alertify.notify(data, 'error', 2);
            }
        })
        .fail(function(data){
            console.log("fail")
            console.log(data)
        })
    }else{
        var notification = alertify.notify(error, 'error', 2);
    }
        


    return false
})

