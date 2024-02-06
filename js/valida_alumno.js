
function valta(){
    
    if($("#campoName").val() === "" && $("#campoAp").val() === "" && $("#campoDNI").val() === "" && $("#campoCuil").val() === ""
            && $("#campoDomicilio").val() === "" && $("#campoLocalidad").val() === "" && $("#campoProvincia").val() === "" && 
            $("#campoTel1").val() === "" && $("#campoMail").val() === "" && $("#campoMail2").val() === "" && 
            $("#campoFechaN").val() === ""){
        $("#msj1").css({"visibility": "visible", "color":"red"});
        $("#msj1").html("Ingresa apellido de alumno");
        $("#msj2").css({"visibility": "visible", "color":"red"});
        $("#msj2").html("Ingresa nombre de alumno");
        $("#msj3").css({"visibility": "visible", "color":"red"});
        $("#msj3").html("Ingresa dni");
        $("#msj4").css({"visibility": "visible", "color":"red"});
        $("#msj4").html("Ingresa cuil");
        $("#msj5").css({"visibility": "visible", "color":"red"});
        $("#msj5").html("Ingresa domicilio");
        $("#msj6").css({"visibility": "visible", "color":"red"});
        $("#msj6").html("Ingresa localidad");
        $("#msj7").css({"visibility": "visible", "color":"red"});
        $("#msj7").html("Ingresa provincia");
        $("#msj8").css({"visibility": "visible", "color":"red"});
        $("#msj8").html("Ingresa un telefono");
        $("#msj9").css({"visibility": "visible", "color":"red"});
        $("#msj9").html("Ingresa correo electronico");
        $("#msj10").css({"visibility": "visible", "color":"red"});
        $("#msj10").html("Reingresa correo electronico");
        $("#msj11").css({"visibility": "visible", "color":"red"});
        $("#msj11").html("Ingresa fecha de nacimiento");
        //cuando se comience a escribir en los campos desaparece el cartel error
        $(document).ready(function(){
            $("#campoAp").focus(function(){
                $("#campoAp").removeAttr("style");
                $("#msj1").attr("hidden","");
            });
            $("#campoName").focus(function(){
                $("#campoName").removeAttr("style");
                $("#msj2").attr("hidden","");
            });
            $("#campoDNI").focus(function(){
                $("#campoDNI").removeAttr("style");
                $("#msj3").attr("hidden","");
            });
            $("#campoCuil").focus(function(){
                $("#campoCuil").removeAttr("style");
                $("#msj4").attr("hidden","");
            });
            $("#campoDomicilio").focus(function(){
                $("#campoDomicilio").removeAttr("style");
                $("#msj5").attr("hidden","");
            });
            $("#campoLocalidad").focus(function(){
                $("#campoLocalidad").removeAttr("style");
                $("#msj6").attr("hidden","");
            });
            $("#campoProvincia").focus(function(){
                $("#campoProvincia").removeAttr("style");
                $("#msj7").attr("hidden","");
            });
            $("#campoTel1").focus(function(){
                $("#campoTel1").removeAttr("style");
                $("#msj8").attr("hidden","");
            });
            $("#campoMail").focus(function(){
                $("#campoMail").removeAttr("style");
                $("#msj9").attr("hidden","");
            });
            $("#campoMail2").focus(function(){
                $("#campoMail2").removeAttr("style");
                $("#msj10").attr("hidden","");
            });
            $("#campoFechaN").focus(function(){
                $("#campoFechaN").removeAttr("style");
                $("#msj11").attr("hidden","");
            });
        });
        return false;
    }
    //------------------------------------------------------------------------------
    if($("#campoDNI").val() === "" || $("#campoDNI").val().length < 7){
        $("#msj3").css({"visibility": "visible", "color":"red"});
        $("#msj3").html("Ingresa DNI valido de 7 u 8 numeros");
        $(document).ready(function(){
            $("#campoDNI").focus(function(){
                $("#campoDNI").removeAttr("style");
                $("#msj3").attr("hidden","");
            });
        });
        return false;
    } 
    if($("#campoCuil").val() === "" || $("#campoCuil").val().length < 11){
        $("#msj4").css({"visibility": "visible", "color":"red"});
        $("#msj4").html("Ingresa cuil valido de 11 numeros");
        $(document).ready(function(){
            $("#campoCuil").focus(function(){
                $("#campoCuil").removeAttr("style");
                $("#msj4").attr("hidden","");
            });
        });
        return false;
    }
    
    if($("#campoDNI").val().length == 7 && !isNaN($("#campoDNI").val())) {
        $("#campoDNI").val() == '0'.concat($("#campoDNI").val());
        console.log('El numero es correcto: '+ $("#campoDNI").val());
        return false;
    }
    
    if($("#campoDNI").val().length == 8 && !isNaN($("#campoDNI").val())) {
        console.log('El numero ingresado no es correcto');
    }

    //--------------------------------------------------------------------------------
    if($("#campoMail").val() === "" || $("#campoMail").val().length < 4){
        $("#msj10").css({"visibility": "visible", "color":"red"});
        $("#msj10").html("Ingresa correo electrónico de 4 a 120 caracteres");
        $(document).ready(function(){
            $("#campoMail").focus(function(){
                $("#campoMail").removeAttr("style");
                $("#msj10").attr("hidden","");
            });
        });
        return false;
    }else if($("#campoMail2").val() === "" || $("#campoMail2").val().length < 4){
            $("#msj11").css({"visibility": "visible", "color":"red"});
            $("#msj11").html("Ingresa correo electrónico de 4 a 120 caracteres");
            $(document).ready(function(){
                $("#campoMail2").focus(function(){
                    $("#campoMail2").removeAttr("style");
                    $("#msj11").attr("hidden","");
                });
            });
        }else{    
        if($("#campoMail").val() !== $("#campoMail2").val()){
            $("#msj11").css({"visibility": "visible", "color":"red"});
            $("#msj11").html("Las contraseñas deben ser iguales");
            $(document).ready(function(){
                $("#campoMail2").focus(function(){
                    $("#campoMail2").removeAttr("style");
                    $("#msj11").attr("hidden","");
                });
            });
        return false;
        }
    }
    alumno.alta();
    return true;
}
//-----------------------------------------------------------------------------------


let alumno = {
    "data" :{"id":0,"apellido":"","nombres":"","dni":"","cuil":"","domicilio":"","localidad":"","provincia":"","telefono1":"","telefono2":"","correo":"","fecha":"","fechaNac":"","accion":""},
    "filtros" : {"accion":"","orden":"", "indice":0,"cantidad":0, "clave":""},
    "parametros": {"url":"files/controlador/alumnoControlador.php"},
    "resetearAlta": function(){
        $("#formA input").val("");
    },
    "cancelar": function(){
        document.forms["fconsulta"].reset();
        $("#fieldset").attr("disabled", "disabled");
        $("#bacepta").attr("disabled", "disabled");
        $("#bcancela").attr("disabled","disabled");
        $("#bmodifica").removeAttr("disabled");
        $("#belimina").removeAttr("disabled");
        $("input").attr("disabled","disabled");
        $("select").attr("disabled","disabled");
    },
    "alta": function(){
        //data es lo que enviamos al controlador
        alumno.data.id = 0;
        alumno.data.apellido = $("#campoAp").val();
        alumno.data.nombres = $("#campoName").val();
        alumno.data.dni = parseInt($("#campoDNI").val());
        alumno.data.cuil = parseInt($("#campoCuil").val());
        alumno.data.domicilio = $("#campoDomicilio").val();
        alumno.data.localidad = $("#campoLocalidad").val();
        alumno.data.provincia = $("#campoProvincia").val();
        alumno.data.telefono1 = $("#campoTel1").val();
        alumno.data.telefono2 = $("#campoTel2").val();
        alumno.data.correo = $("#campoMail").val(); 
        alumno.data.fechaNac = $("#campoFechaN").val(); 
        alumno.data.accion = "ALTA";
        alumno.abm(this.data);
        
    },
    "actualizar": function(){
        alumno.data.id = $("#idAlu").val();
        alumno.data.apellido = $("#campoAp").val();
        alumno.data.nombres = $("#campoName").val();
        alumno.data.dni = $("#campoDNI").val();
        alumno.data.cuil = $("#campoCuil").val();
        alumno.data.domicilio = $("#campoDomicilio").val();
        alumno.data.localidad = $("#campoLocalidad").val();
        alumno.data.provincia = $("#campoProvincia").val();
        alumno.data.telefono1 = $("#campoTel1").val();
        alumno.data.telefono2 = $("#campoTel2").val();
        alumno.data.correo = $("#campoMail").val(); 
        alumno.data.fechaNac = $("#campoFechaN").val(); 
        alumno.data.accion = "ACTUALIZAR";
        console.log(alumno.data);
        alumno.abm(this.data);
    },
    "eliminar": function(){
        alumno.data.id = $("#idAlu").val();
        alumno.data.apellido = $("#campoAp").val();
        alumno.data.nombres = $("#campoName").val();
        alumno.data.dni = $("#campoDNI").val();
        alumno.data.cuil = $("#campoCuil").val();
        alumno.data.domicilio = $("#campoDomicilio").val();
        alumno.data.localidad = $("#campoLocalidad").val();
        alumno.data.provincia = $("#campoProvincia").val();
        alumno.data.telefono1 = $("#campoTel1").val();
        alumno.data.telefono2 = $("#campoTel2").val();
        alumno.data.correo = $("#campoMail").val(); 
        alumno.data.fechaNac = $("#campoFechaN").val(); 
        alumno.data.accion = "ELIMINAR";
        alumno.abm(this.data);
    },
    "listar": function(){
        alumno.filtros.accion = "LISTAR";
        alumno.filtros.indice = 0;
        alumno.filtros.cantidad = 20;
        alumno.filtros.clave = "";
        alumno.abm(this.filtros);
    },
    "cargar": function(id){
        alumno.abm({"id":id,"accion":"CARGAR"});
    },
    "abm": function(datojson){
        $.ajax(
                {"url":alumno.parametros.url,
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
                        setTimeout("location.href='http://localhost/proyecto_2019_carballo_laura/files/alumnos.php'",2000);

                    break;
                    case "ACTUALIZAR":
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
                            $("#idalerta").html("<button type='button' class='close' data-dismiss='alert'><a href='files/alumnos.php'><span aria-hidden='true'>&times;</span></a></button><small>¡Datos modificados correctamente!</small>");
                            setTimeout("location.href='http://localhost/proyecto_2019_carballo_laura/files/alumnos.php'",2000);
                        }
                    break;
                    case "CARGAR":
                        if(data.error != ""){
                            console.log("hay un error :(");
                        }
                        else{
                            $("#campoAp").val(data.registros.apellido);
                            $("#campoName").val(data.registros.nombres);
                            $("#campoDNI").val(data.registros.dni);
                            $("#campoCuil").val(data.registros.cuil);
                            $("#campoDomicilio").val(data.registros.domicilio);
                            $("#campoLocalidad").val(data.registros.localidad);
                            $("#campoProvincia").val(data.registros.provincia);
                            $("#campoTel1").val(data.registros.telefono1);
                            $("#campoTel2").val(data.registros.telefono2);
                            $("#campoMail").val(data.registros.correo); 
                            $("#campoFechaN").val(data.registros.fechaNac); 
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
                            $("#idalerta").html("<button type='button' class='close' data-dismiss='alert'><a href='files/alumnos.php'><span aria-hidden='true'>&times;</span></a></button><small>¡Datos ingresados correctamente!</small>");
                            setTimeout("location.href='http://localhost/proyecto_2019_carballo_laura/files/alumnos.php'",2000);
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
                                let apellido = registro.alu_apellido;
                                let nombre = registro.alu_nombres;
                                let dni = registro.alu_dni;
                                let correo = registro.alu_correo;
                                let id = registro.id_alumno;
                                
                                $("#tbodyU").append('<tr><td>'+apellido+'</td><td>'+nombre+'</td><td>'+dni+'</td><td>'+correo+'</td><td><a href="files/alumnos_consulta.php?id='+id+'">Consultar</a></td></tr>');
                            }
                            $("#tfootU").html('<tr><th class="text-center" colspan="4"><small>Registros encontrados:'+data.total+'</small></th><th class="text-center" colspan="1"><button type="button" class="btn btn-secondary btn-sm" onclick="generarPDF()">Ver en PDF</button></th></tr>');
                        }
                        break;
                    default: break;
                }
                               
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
        alumno.filtros.accion = "LISTAR";
        alumno.filtros.indice = 0;
        alumno.filtros.cantidad = 10;
        alumno.filtros.clave = $("#"+sugestivo.parametros.inputText).val();
        $.ajax(
                {"url":alumno.parametros.url,
                "method":"post",
                "dataType":"json",
                "accept":"json",
                "data":{"data":JSON.stringify(alumno.filtros)}
            }).done(function(data,textStatus){
                $("#"+sugestivo.parametros.lista).remove();
                //agrego al principio con un id
                if(data.registros.length > 0){
                    //siempre y cuando haya registros agrega a la tabla
                    $("#"+sugestivo.parametros.contenedor).prepend('<ul id="'+sugestivo.parametros.lista+'" class="list-group text-left" style="position:absolute; z-index: 100; margin-top:36px; margin-left:6px;">');
                    for(let registro of data.registros){
                        $("#"+sugestivo.parametros.lista).append('<li class="list-group-item" style="line-height:1.8em" onclick="window.location.href = \'files/alumnos_consulta.php?id='+registro.id_alumno+'\'">Alumno: '+registro.alu_apellido+', '+registro.alu_nombres+'</li>');
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
    let idAlumno = document.getElementById("idAlu");
    if(idAlumno !== null){
        idAlumno = parseInt(idAlumno.value);
        alumno.cargar(idAlumno);
    }
    
});

function generarPDF(){
    window.open("http://localhost/proyecto_2019_carballo_laura/files/modelo/lista_alumnos.php","Alumnos PDF",width =300, height = 300);
}