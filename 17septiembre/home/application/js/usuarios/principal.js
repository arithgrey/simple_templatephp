$(document).ready(function(){    
    load_users_cuenta();
    $(".nuevo_user").click(carga_form_user);
    $(".more-inputs").click(show_more_fields);
    $("#form-integrante-edicion").submit(nuevo_user);

    $(".form-busqueda-user").submit(load_users_cuenta);
    $(".nueva_busqueda").click(carga_form_busqueda);        
    $("#btn_cancelar").click(cancelar_modificacion);
    
});
/*Invitación al nuevo usuario*/
function sed_mail_request(){

    idperfil = $("#newperfil").val();
    mailnewcontact  =  $("#mailnewcontact").val();
    nombre = $("#nombre").val();

    url =  now + "index.php/api/mailrest/send_mail_gmail_invitaticon/format/json/";
    $.post( url  , {"idperfil" : idperfil , "mailnewcontact" : mailnewcontact , "nombre" : nombre} ).done(function(data){
        
        if (data ==  true ) {
            llenaelementoHTML("#clientresponse" , " Los datos de acceso han sido enviados a al correo del nuevo miembro");
        }else{

            llenaelementoHTML("#clientresponse" , "Error al enviar el mail, intentar nuevamente, si el error persiste reportar al administrador del sistema");
        }     
    }).fail(function(){
        alert("un error se produjo....");
    });
}
/*Termina la función */

function exporta_excel(){
    $("#datos_a_enviar").val( $("<div>").append( $("#print-section").eq(0).clone()).html());
    $("#FormularioExportacion").submit();
}

/**/
function reset_form_user(){
    $("#response-update-insert").text("");
    var  inputs_reset = ["#apellido_paterno" , "#apellido_materno"  , "#nombres" , "#email" , "#email_alterno" , "#tel_contacto"  , "#tel_contacto_alterno" , "#inicio_labor" , "#fin_labor" , "#rfc"];
    reset_fields(inputs_reset);     
}

/**/
function load_data_user(id_usuario){

  $("#id_usuario").val(id_usuario);
  url = now + "index.php/api/user/miembro/format/json/";   
   $.ajax({
        url: url, 
        data: {"id_usuario" : id_usuario }, 
        type: "GET", 
        beforeSend: function(){
            show_load_enid(".integrantes-table-info" , "Cargando información del usuario" , 1 ); 
        }
   }).done(function(data){
        $(".integrantes-table-info").empty();        
            /**/
            idusuario =  data[0].idusuario;            
            nombre =  data[0].nombre;
            email             =  data[0].email            ;
            fecha_registro =  data[0].fecha_registro;
            idempresa =  data[0].idempresa;
            descripcion =  data[0].descripcion;
            puesto =  data[0].puesto;            
            apellido_paterno =  data[0].apellido_paterno;
            apellido_materno =  data[0].apellido_materno;
            email_alterno =  data[0].email_alterno;
            tel_contacto =  data[0].tel_contacto;
            tel_contacto_alterno =  data[0].tel_contacto_alterno;
            edad =  data[0].edad;
            numero_empleado =  data[0].numero_empleado;
            inicio_labor =  data[0].inicio_labor;
            fin_labor =  data[0].fin_labor;
            grupo =  data[0].grupo;
            cargo =  data[0].cargo;
            rfc =  data[0].rfc;
            turno =  data[0].turno;
            ultima_modificacion =  data[0].ultima_modificacion;
            descripcion_usuario =  data[0].descripcion_usuario;
            url_fb =  data[0].url_fb;
            url_tw =  data[0].url_tw;
            url_www =  data[0].url_www;
            sexo =  data[0].sexo;
            tipo =  data[0].tipo;
            idperfil =  data[0].idperfil;
            
            llenaelementoHTML(".user_edit_text" , email);

            valorHTML( "#apellido_paterno" , apellido_paterno);  
            valorHTML( "#apellido_materno" , apellido_materno);              
            valorHTML( "#nombres" , nombre);  
            valorHTML( "#email" , email);  
            valorHTML( "#email_alterno" , email_alterno);              
            valorHTML( "#tel_contacto" , tel_contacto);              
            valorHTML( "#tel_contacto_alterno" , tel_contacto_alterno);              
            valorHTML( "#inicio_labor" , inicio_labor);  
            valorHTML( "#fin_labor" , fin_labor);  
            valorHTML( "#rfc" , rfc);  

            /**/
            $('#turno_user > option[value="'+ turno +'"]').attr('selected', 'selected');              
            $('#grupo_user > option[value="'+ grupo +'"]').attr('selected', 'selected');              
            $('#cargo_user > option[value="'+ cargo +'"]').attr('selected', 'selected');              
            $('#perfil_user > option[value="'+ idperfil +'"]').attr('selected', 'selected');              
            $('#edad_user > option[value="'+edad +'"]').attr('selected', 'selected');              
            
            $("#form-integrante-edicion").submit(nuevo_user);                        
   }).fail(function(){
        show_error_enid(".integrantes-table-info" , "Error al cargar los datos del usuario, reporte al administrador" ); 
   });
}
/**/
function carga_form_busqueda(){
    showonehideone(  ".seccion-busqueda" ,  ".nueva_busqueda"  );
    llenaelementoHTML("#integrantes-table-info" ,  "");
}
/**/
/*UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES */
function try_update_perfil_usuario(e){

    usuario = e.target.id;
    url = now + "index.php/api/cuentageneralrest/integrantescuentaperfil/format/json";    
    $(".repo-edith").hide();    
    $("#edit-perfil-select").change(function(){

        perfil = $(this).val();
        actualiza_data(url , {"usuario" : usuario , "perfil" : perfil } );
        $(".repo-edith").show();
        }
    ); 
}
/**/
function template_config_estatus(e){

    usuario =  e.target.id; 
    url = now + "index.php/api/user/template_estado/format/json/"; 
    $(".seccion-busqueda").hide();

    $.ajax({        
        url :  url , 
        data :  {"usuario" : usuario} , 
        type : "GET" ,
        beforeSend : function(){
            
            show_load_enid("#integrantes-table-info" , "Cargando ... " , 1 );
        }
    }).done(function(data){
          llenaelementoHTML("#integrantes-table-info" ,  data );   
          $("#form_estatus").submit(actualiza_estado_usuario);
          
    }).fail(function(){
        
        show_error_enid("#integrantes-table-info" , "Error al tratar cargar la configuración del evento "); 
    });
}
/**/
function carga_form_user(){

    $("#integrantes-table-info").empty();  
    $(".hidden_inputs_enid").hide();  
    $("#id_usuario").val(0);
    $(".action").val("registro");
    $("#email-section").show();
    document.getElementById("form-integrante-edicion").reset();    
    showonehideone(".seccion-form-user" , ".seccion-busqueda");    
    $(".user_edit_text").empty();
}
/**/
function modifica_user(e){

    id_usuario = e.target.id;
    document.getElementById("form-integrante-edicion").reset();    
    llenaelementoHTML(".more-inputs" , '<i class="fa fa-chevron-up" aria-hidden="true"> </i>Menos info ');

    $(".action").val("actualizacion");
    $(".seccion-form-user").show();
    $(".seccion-busqueda").hide();
    $(".integrantes-table-info").empty();    
    $(".hidden_inputs_enid").show();  
    $("#email-section").hide();
    load_data_user(id_usuario);    
}
/**/
function show_more_fields(){     
    seccion =  ".hidden_inputs_enid";
    if ($(seccion).is(":visible")) {        
        $(seccion).hide();      
        $(".more-inputs").html("<i class='fa fa-chevron-down' aria-hidden='true'> </i>Más info ");
    }else{
        $(seccion).show();
        $(".more-inputs").html("<i class='fa fa-chevron-up' aria-hidden='true'> </i>Menos info ");
    }   
}
/**/
/*Carga los usuarios de la cuenta*/
function load_users_cuenta(){

    $("#integrantes-table-info").empty();
    $("#integrantes-table-info").show();
    url =  $(".form-busqueda-user").attr("action");
    var clientresponse = ["Error al cargar los colaboradores, reporte al administrador"];        
    $.ajax({
        url :  url , 
        data :   $(".form-busqueda-user").serialize() , 
        type: "GET" , 
        beforeSend : function(){
            /**/
            show_load_enid("#integrantes-table-info" , "Cargando  .. " , 1);                         
        }
    }).done(function(data){
        llenaelementoHTML("#integrantes-table-info" , data);                                 
        $(".editar_permisos_miembro").click(modifica_user);    
        $(".config_estatus_user").click(template_config_estatus);        
              
    }).fail(function(){
        show_error_enid("#integrantes-table-info"  , "Error al registrar, reporte al administrador "); 
    });    
    return false;
}

function nuevo_user(e){    

    /**/   
    id_usuario =  $("#id_usuario").val();
    flag = 0; 
    flag2 = 0; 
    msj_user =  "<br> Información del usuario actualizada.!";
    if (id_usuario  ==  0 ) {msj_user = "<br> Usuario registrado con éxito.!";}    
    flag  =  valida_email_form("#email" ,  ".place_mail_vali");      
    if (flag == 1  ) { flag2 =  valida_text_form("#nombres" , ".place_nombre_vali"  , 4 , " Nombre del integrante " ); }
    if (flag2 == 1){

        /**/        
        url =  $("#form-integrante-edicion").attr("action");                  
        console.log($("#form-integrante-edicion").serialize());
        $.ajax({
            url :  url, 
            data:  $("#form-integrante-edicion").serialize() , 
            type :  "PUT", 
            beforeSend: function(){                    
                show_load_enid(".integrantes-table-info" , "Cargando ... " , 1 );
                $(".place_mail_vali").empty();
                $(".place_nombre_vali").empty(); 
            }
        }).done(function(data){
            
            
            console.log(data);
            $(".integrantes-table-info").empty();
            if (data.status_user !=  "FALSE"){
                show_response_ok_enid( ".integrantes-table-info", "Información registrada con éxito.!");             
                $(".seccion-form-user").hide();
                $(".seccion-busqueda").show();
            }else{                
                llenaelementoHTML(".place_mail_vali" ,  "<span class='alerta_enid'>" + data.msj_user + "</span>");
            }
            

        }).fail(function(){  
            $(".place_mail_vali").empty();
            $(".place_nombre_vali").empty();          
            show_error_enid(".integrantes-table-info" , "Error al cargar los datos del usuario, reporte al administrador");
        });

    }
    e.preventDefault();
}
/**/
function actualiza_estado_usuario(e){

    url =  $("#form_estatus").attr("action" ); 
    $.ajax({
        url :  url , 
        type : "PUT", 
        data :  $("#form_estatus").serialize() , 
        beforeSend :  function(){
            llenaelementoHTML( ".integrantes-table-info" , "Registrando cambios ..");     
        }
    }).done(function(data){                
        llenaelementoHTML( ".integrantes-table-info" , "<br>"  + data);     
    }).fail(function(){
        llenaelementoHTML( ".integrantes-table-info" ,  " Error al modificar el estatus del usuario, reporte al administrador ");     
    });
    $(".seccion-busqueda").show();
    e.preventDefault();
}
/**/
function cancelar_modificacion(){
    
    $(".seccion-busqueda").show();
    $(".seccion-form-user").hide();

    llenaelementoHTML( ".integrantes-table-info" , "");    
}