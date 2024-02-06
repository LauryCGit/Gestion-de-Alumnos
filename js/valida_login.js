//console.log("nuevo js!!");

function vlogin(){
    //Formato Jquery
    //console.log($("#campoName").val());
    
    //Formato DOM
    let nombre = document.getElementById("campoName").value;
    let contraseña = document.getElementById("campoPass").value;
    if(nombre === "" && contraseña === ""){
        //se muestran carteles de error
        $("#msj").css({"visibility": "visible", "color":"red"});
        $("#msj").html("Ingresa nombre de usuario de 6 a 30 caracteres");
        $("#msj2").css({"visibility": "visible", "color":"red"});
        $("#msj2").html("Ingresa contraseña de 8 a 15 caracteres");
        //cuando se comience a escribir en los campos desaparece el cartel error
        $(document).ready(function(){
            $("#campoName").focus(function(){
                $("#campoName").removeAttr("style");
                $("#msj").attr("hidden","");
            });
            $("#campoPass").focus(function(){
                $("#campoPass").removeAttr("style");
                $("#msj2").attr("hidden","");
            });
        });
        return false;
    }
    if(nombre === "" || nombre.length < 6){
        $("#campoName").attr("style","border:1px solid red");
        $("#msj").css({"visibility": "visible", "color":"red"});
        $("#msj").html("Ingresa nombre de usuario de 6 a 30 caracteres");
        $(document).ready(function(){
            $("#campoName").focus(function(){
                $("#campoName").removeAttr("style");
                $("#msj").attr("hidden","");
            });
        });
        return false;
    }
    if(contraseña === ""){
        $("#campoPass").attr("style","border:1px solid red");
        $("#msj2").css({"visibility": "visible", "color":"red"});
        $("#msj2").html("Ingresa contraseña de 8 a 15 caracteres");
        $(document).ready(function(){
            $("#campoPass").focus(function(){
                $("#campoPass").removeAttr("style");
                $("#msj2").attr("hidden","");
            });
        });
        return false;
    }
    else{
        if(contraseña.length < 8 ){
            $("#msj2").css({"visibility": "visible", "color":"red"});
            $("#msj2").html("La contraseña debe tener entre 8 a 15 caracteres");
            return false;
        }
    }

    return true;
}