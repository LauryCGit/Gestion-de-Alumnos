function valta(){
   //campoName campoAp campoNU campoPass campoPass2 campoMail campoMail2 perfil1 perfil2
    if($("#campoName").val() === "" && $("#campoAp").val() === "" && $("#campoNU").val() === "" &&
            $("#campoPass").val() === "" && $("#campoPass2").val() === "" && $("#campoMail").val() === ""
            && $("#campoMail2").val() === ""){
        $("#msj1").css({"visibility": "visible", "color":"red"});
        $("#msj1").html("Ingresa nombre de usuario");
        $("#msj2").css({"visibility": "visible", "color":"red"});
        $("#msj2").html("Ingresa apellido");
        $("#msj3").css({"visibility": "visible", "color":"red"});
        $("#msj3").html("Ingresa nombre de usuario");
        $("#msj4").css({"visibility": "visible", "color":"red"});
        $("#msj4").html("Ingresa contraseña");
        $("#msj5").css({"visibility": "visible", "color":"red"});
        $("#msj5").html("Reingresa contraseña");
        $("#msj6").css({"visibility": "visible", "color":"red"});
        $("#msj6").html("Ingresa correo electrónico");
        $("#msj7").css({"visibility": "visible", "color":"red"});
        $("#msj7").html("Reingresa correo electrónico");
        //cuando se comience a escribir en los campos desaparece el cartel error
        $(document).ready(function(){
            $("#campoName").focus(function(){
                $("#campoName").removeAttr("style");
                $("#msj1").attr("hidden","");
            });
            $("#campoAp").focus(function(){
                $("#campoAp").removeAttr("style");
                $("#msj2").attr("hidden","");
            });
            $("#campoNU").focus(function(){
                $("#campoNU").removeAttr("style");
                $("#msj3").attr("hidden","");
            });
            $("#campoPass").focus(function(){
                $("#campoPass").removeAttr("style");
                $("#msj4").attr("hidden","");
            });
            $("#campoPass2").focus(function(){
                $("#campoPass2").removeAttr("style");
                $("#msj5").attr("hidden","");
            });
            $("#campoMail").focus(function(){
                $("#campoMail").removeAttr("style");
                $("#msj6").attr("hidden","");
            });
            $("#campoMail2").focus(function(){
                $("#campoMail2").removeAttr("style");
                $("#msj7").attr("hidden","");
            });
        });
        return false;
    }
            
    if($("#campoName").val() === ""){
        $("#campoName").attr("style","border:1px solid red");
        $("#msj1").css({"visibility": "visible", "color":"red"});
        $("#msj1").html("Ingresa nombre");
        $(document).ready(function(){
            $("#campoName").focus(function(){
                $("#campoName").removeAttr("style");
                $("#msj1").attr("hidden","");
            });
        });
        return false;
    }
    if($("#campoAp").val() === ""){
        $("#campoAp").attr("style","border:1px solid red");
        $("#msj2").css({"visibility": "visible", "color":"red"});
        $("#msj2").html("Ingresa apellido");
        $(document).ready(function(){
            $("#campoAp").focus(function(){
                $("#campoAp").removeAttr("style");
                $("#msj2").attr("hidden","");
            });
        });
        return false;
    }
    if($("#campoNU").val() === ""){
       $("#campoNU").attr("style","border:1px solid red");
        $("#msj3").css({"visibility": "visible", "color":"red"});
        $("#msj3").html("Ingresa nombre de usuario");
        $(document).ready(function(){
           $("#campoNU").focus(function(){
                $("#campoNU").removeAttr("style");
                $("#msj3").attr("hidden","");
            });
        });
        return false;
    }
    if($("#campoPass").val() === ""){
       $("#campoPass").attr("style","border:1px solid red");
        $("#msj4").css({"visibility": "visible", "color":"red"});
        $("#msj4").html("Ingresa contraseña");
        $(document).ready(function(){
           $("#campoPass").focus(function(){
                $("#campoPass").removeAttr("style");
                $("#msj4").attr("hidden","");
            });
        });
        return false;
    }
    if($("#campoPass2").val() === ""){
       $("#campoPass2").attr("style","border:1px solid red");
        $("#msj5").css({"visibility": "visible", "color":"red"});
        $("#msj5").html("Reingresa contraseña");
        $(document).ready(function(){
           $("#campoPass2").focus(function(){
                $("#campoPass2").removeAttr("style");
                $("#msj5").attr("hidden","");
            });
        });
        return false;
    }
    if($("#campoMail").val() === ""){
       $("#campoMail").attr("style","border:1px solid red");
        $("#msj6").css({"visibility": "visible", "color":"red"});
        $("#msj6").html("Ingresa correo electrónico");
        $(document).ready(function(){
           $("#campoMail").focus(function(){
                $("#campoMail").removeAttr("style");
                $("#msj6").attr("hidden","");
            });
        });
        return false;
    }
    if($("#campoMail2").val() === ""){
       $("#campoMail2").attr("style","border:1px solid red");
        $("#msj7").css({"visibility": "visible", "color":"red"});
        $("#msj7").html("Ingresa correo electrónico");
        $(document).ready(function(){
           $("#campoMail2").focus(function(){
                $("#campoMail2").removeAttr("style");
                $("#msj7").attr("hidden","");
            });
        });
        return false;
    }
    //------------------------------------------------------------------------------
    if($("#campoPass").val() === "" || $("#campoPass").val().length < 8 ){
        $("#msj4").css({"visibility": "visible", "color":"red"});
        $("#msj4").html("Ingresa contraseña de 8 a 15 caracteres");
        $(document).ready(function(){
            $("#campoPass").focus(function(){
                $("#campoPass").removeAttr("style");
                $("#msj4").attr("hidden","");
            });
        });
        return false;
    }else if($("#campoPass2").val() === "" || $("#campoPass2").val().length < 8 ){
            $("#msj5").css({"visibility": "visible", "color":"red"});
            $("#msj5").html("Ingresa contraseña de 8 a 15 caracteres");
            $(document).ready(function(){
                $("#campoPass2").focus(function(){
                    $("#campoPass2").removeAttr("style");
                    $("#msj5").attr("hidden","");
                });
            });
        }else{    
        if($("#campoPass").val() !== $("#campoPass2").val()){
            $("#msj5").css({"visibility": "visible", "color":"red"});
            $("#msj5").html("Las contraseñas deben ser iguales");
            $(document).ready(function(){
                $("#campoPass2").focus(function(){
                    $("#campoPass2").removeAttr("style");
                    $("#msj5").attr("hidden","");
                });
            });
        return false;
        }
    }
    //--------------------------------------------------------------------------------
    if($("#campoMail").val() === "" || $("#campoMail").val().length < 4){
        $("#msj6").css({"visibility": "visible", "color":"red"});
        $("#msj6").html("Ingresa correo electrónico de 4 a 120 caracteres");
        $(document).ready(function(){
            $("#campoMail").focus(function(){
                $("#campoMail").removeAttr("style");
                $("#msj6").attr("hidden","");
            });
        });
        return false;
    }else if($("#campoMail2").val() === "" || $("#campoMail2").val().length < 4){
            $("#msj7").css({"visibility": "visible", "color":"red"});
            $("#msj7").html("Ingresa correo electrónico de 4 a 120 caracteres");
            $(document).ready(function(){
                $("#campoMail2").focus(function(){
                    $("#campoMail2").removeAttr("style");
                    $("#msj7").attr("hidden","");
                });
            });
        }else{    
        if($("#campoMail").val() !== $("#campoMail2").val()){
            $("#msj7").css({"visibility": "visible", "color":"red"});
            $("#msj7").html("Las contraseñas deben ser iguales");
            $(document).ready(function(){
                $("#campoMail2").focus(function(){
                    $("#campoMail2").removeAttr("style");
                    $("#msj7").attr("hidden","");
                });
            });
        return false;
        }
    }
    usuario.alta();
    return true;
}

let usuario = {
    //alta baja y modificacion reciben data
    "data" :{"id":0,"cuenta":"","clave":"","apellido":"","nombres":"","correo":"","fechaAlta":"","accion":""},
    //listar recibe filtros
    "filtros" : {"accion":"","orden":"", "indice":0,"cantidad":0, "clave":""},
    "parametros": {"url":"files/controlador/usuarioControlador.php"},
    "resetearAlta": function(){
        $("#formA input[type=text]").val("");
    },
    "cancelar": function(){
        $("#fieldset").attr("disabled", "disabled");
        $("#bacepta").attr("disabled", "disabled");
        $("#bcancela").attr("disabled","disabled");
        $("#bmodifica").removeAttr("disabled");
        $("#belimina").removeAttr("disabled");
        $("input").attr("disabled","disabled");
        $("select").attr("disabled","disabled");
        let idUsuario = document.getElementById("idUser");
        idUsuario = parseInt(idUsuario.value);
        usuario.cargar(idUsuario);
    },
    "alta": function(){
        //data es lo que enviamos al controlador
        usuario.data.id = 0;
        usuario.data.cuenta = $("#campoNU").val();
        usuario.data.clave = $("#campoPass").val(); 
        usuario.data.apellido = $("#campoAp").val(); 
        usuario.data.nombres = $("#campoName").val();
        usuario.data.correo = $("#campoMail").val(); 
        usuario.data.fechaAlta = "";
        usuario.data.accion = "ALTA";
        usuario.abm(this.data);
        
    },
    "actualizar": function(){
        usuario.data.id = $("#idUser").val();
        usuario.data.cuenta = $("#campoNU").val();
        usuario.data.apellido = $("#campoAp").val(); 
        usuario.data.nombres = $("#campoName").val();
        usuario.data.correo = $("#campoMail").val(); 
        usuario.data.accion = "ACTUALIZAR";
        usuario.abm(this.data);
    },
    "eliminar": function(){
        usuario.data.id = $("#idUser").val();
        usuario.data.cuenta = $("#campoNU").val();
        usuario.data.apellido = $("#campoAp").val(); 
        usuario.data.nombres = $("#campoName").val();
        usuario.data.correo = $("#campoMail").val(); 
        usuario.data.accion = "ELIMINAR";
        usuario.abm(this.data);
        
    },
    "listar": function(){
        usuario.filtros.accion = "LISTAR";
        usuario.filtros.indice = 0;
        usuario.filtros.cantidad = 20;
        usuario.filtros.clave = "";
        usuario.abm(this.filtros);
    },
    "cargar": function(id){
        usuario.abm({"id":id,"accion":"CARGAR"});
    },
    "abm": function(datojson){
        $.ajax(
                {"url":usuario.parametros.url,
                "method":"post",
                "dataType":"json",
                "accept":"json",
                "data":{"data":JSON.stringify(datojson)}
            }).done(function(data,textStatus){
                
                switch(data.accion){
                    case "ELIMINAR":
                        $("#idalerta").removeAttr("hidden");
                        $("#idalerta").removeAttr("class");
                        $("#idalerta").attr("class","alert alert-success alert-dismissible col-6");
                        $("#idalerta").html("<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button><small>¡Datos eliminados correctamente!</small>");
                        $("#fconsulta input").val("");
                        setTimeout("location.href='http://localhost/proyecto_2019_carballo_laura/files/usuarios.php'",2000);

                    break;
                    case "ACTUALIZAR":
                        if(data.error == "Duplicado"){
                            $("#idalerta").removeAttr("hidden");
                            $("#idalerta").removeAttr("class");
                            $("#idalerta").attr("class","alert alert-danger alert-dismissible col-6");
                            $("#idalerta").html("<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button><small>Datos duplicados: Revise nombre de usuario o correo eletronico</small>");
                        }
                        else{
                            $("#idalerta").removeAttr("hidden");
                            $("#idalerta").removeAttr("class");
                            $("#idalerta").attr("class","alert alert-success alert-dismissible col-6");
                            $("#idalerta").html("<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button><small>¡Datos modificados correctamente!</small>");
                            setTimeout("location.href='http://localhost/proyecto_2019_carballo_laura/files/usuarios.php'",2000);
                        }
                       
                    break;
                    case "CARGAR":
                        if(data.error != ""){
                            console.log("hay un error :(");
                        }
                        else{
                            $("#campoNU").val(data.registros.cuenta);
                            $("#campoAp").val(data.registros.apellido); 
                            $("#campoName").val(data.registros.nombres);
                            $("#campoMail").val(data.registros.correo); 
                        }
                    break;
                    case "ALTA":
                        if(data.error == "Duplicado"){
                          $("#idalerta").removeAttr("hidden");
                          $("#idalerta").removeAttr("class");
                          $("#idalerta").attr("class","alert alert-danger alert-dismissible col-6");
                          $("#idalerta").html("<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button><small>No se pueden guardar datos duplicados</small>");
                       
                        }
                        else{
                            $("#idalerta").removeAttr("hidden");
                            $("#idalerta").removeAttr("class");
                            $("#idalerta").attr("class","alert alert-success alert-dismissible col-6");
                            $("#idalerta").html("<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button><small>¡Datos ingresados correctamente!</small>");
                            setTimeout("location.href='http://localhost/proyecto_2019_carballo_laura/files/usuarios.php'",2000);
                            alumno.resetearAlta();
                        }             
                        break;
                    case "LISTAR":
                        $("#tbodyU").empty();
                        $("#tfootU").empty();
                        $("#listaU").css({"visibility":"visible"});
                        if(data.registros.length == 0){
                            $("#tbodyU").html('<tr><td class="text-center" colspan="4">No se encontraron registros.</td></tr>');
                        }
                        else{
                            //in porque no necesitamos indices
                            for(let registro of data.registros){
                                let apellido = registro.user_apellido;
                                let nombre = registro.user_nombres;
                                let cuenta = registro.user_cuenta;
                                let id = registro.id_usuario;
                                
                                $("#tbodyU").append('<tr><td>'+apellido+'</td><td>'+nombre+'</td><td>'+cuenta+'</td><td><a href="files/usuarios_consulta.php?id='+id+'">Consultar</a></td></tr>');
                            }
                            $("#tfootU").html('<tr><th class="text-center" colspan="3"><small>Registros encontrados:'+data.total+'</small></th><th class="text-center" colspan="1"><button type="button" class="btn btn-secondary btn-sm" onclick="generarPDF()">Ver en PDF</button></th></tr>');
                        }
                        break;
                    default: break;
                }
                console.log(data);
               
                //usuario.resetarAlta();
            }).fail(function(jqXHR, textStatus, errorThrown){
                console.error("Error: "+textStatus+"-"+errorThrown); 
            }).always(function(){
                //independiemente si entra a done o fal se va a ejecutar (normalmente resetear
            });
    }
}; //objeto json

let sugestivo = {
    "parametros":{
        "contenedor":"divSugestivo",
        "inputText":"textSugestivo",
        "lista":"ulSugestivo",
        "actualizar": false,
        "buscar": false
    },
    "activar": function(){
        $("#"+sugestivo.parametros.inputText).keydown(function(e){
            let cod = e.which;
            if(cod == null) cod = e.keyCode;
            if(cod == 27) $("#"+sugestivo.parametros.lista).remove();
            if(cod == 8) sugestivo.parametros.actualizar = true;
        });
        
        $("#"+sugestivo.parametros.inputText).keypress(function(e){
            let cod = e.which;
            if (cod == null) cod = e.keyCode;
            if((cod >= 97 && cod <=122) 
                    || (cod >= 65 && cod <= 90)
                    || (cod >= 48 && cod <= 57)
                    || (cod == 32) || (cod == 46)){
                sugestivo.parametros.buscar = true;
                return true;
            }
            if(sugestivo.parametros.actualizar) return true;
            else{
                sugestivo.parametros.buscar = false;
                return false;
            }
        });
        
        $("#"+sugestivo.parametros.inputText).keyup(function(e){
            if(sugestivo.parametros.buscar || sugestivo.parametros.actualizar){
                if($("#"+sugestivo.parametros.inputText).val().length > 2) sugestivo.buscar();
                else $("#"+sugestivo.parametros.lista).remove();
            }
            sugestivo.parametros.actualizar = sugestivo.parametros.buscar = false;
        });
    },

    "buscar":function(){
        usuario.filtros.accion = "LISTAR";
        usuario.filtros.indice = 0;
        usuario.filtros.cantidad = 10;
        usuario.filtros.clave = $("#"+sugestivo.parametros.inputText).val();
        $.ajax(
                {"url":usuario.parametros.url,
                "method":"post",
                "dataType":"json",
                "accept":"json",
                "data":{"data":JSON.stringify(usuario.filtros)}
            }).done(function(data,textStatus){
                $("#"+sugestivo.parametros.lista).remove();
                //agrego al principio con un id
                if(data.registros.length > 0){
                    //siempre y cuando haya registros agrega a la tabla
                    $("#"+sugestivo.parametros.contenedor).prepend('<ul id="'+sugestivo.parametros.lista+'" class="list-group text-left" style="position:absolute; z-index: 100; margin-top:36px; margin-left:0px;">');
                    for(let registro of data.registros){
                        $("#"+sugestivo.parametros.lista).append('<li class="list-group-item" style="line-height:1.8em" onclick="window.location.href = \'files/usuarios_consulta.php?id='+registro.id_usuario+'\'">Cuenta: '+registro.user_cuenta+'</li>');
                    }
                }
            }).fail(function(jqXHR, textStatus, errorThrown){
                console.error("Error: "+textStatus+"."+errorThrown);
                
            }).always(function(){
                //independiemente si entra a done o fal se va a ejecutar (normalmente resetear
            });    
    }
};

$().ready(function(){
    sugestivo.activar();
    let idUsuario = document.getElementById("idUser");
    if(idUsuario !== null){
        idUsuario = parseInt(idUsuario.value);
        usuario.cargar(idUsuario);
    }
    
});

function generarPDF(){
    window.open("http://localhost/proyecto_2019_carballo_laura/files/modelo/lista_usuarios.php","Usuarios PDF",width =300, height = 300 );
}
