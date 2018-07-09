
// $("#ingresar").on("click",(e)=>{
//     e.preventDefault()

//     var usuario = $("#usuario").val()
//     var password = $("#contra").val()


//     $.ajax({
//         url: 'views/ajax/ajax.php',
//         type: 'POST',
//         data: {
//             ingresar: true,
//             usuario: usuario,
//             password:password
//         }
//     })
//     .done((data)=>{
//         console.log("success")
//         console.log(data)
//         if (data == "ok") {
//             window.location = "index"
//         }
//     })
//     .fail((data)=>{
//         console.log("fail")
//         console.log(data)
//     })
    
// })