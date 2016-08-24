$(document).ready(function(){

    $(".sednewsolicitud").click(sed_mail_request);        
    $(".botonExcel").click(exporta_excel);
    $("#btn-nuevo-integrante").click(set_config_user_record);
    $(".edit-nota-user").click(load_data_nota_user);
    dinamic_user = 0;
    $("#descripcion-miembro").submit(update_descripcion_user);    
    $(".mas-info").click(dinamic_section);
    $(".menos-info").click(dinamic_section_info);
    $(".form-busqueda-user").submit(load_users_cuenta);

    $(".nuevo_user").click(carga_form_user);
    $(".nueva_busqueda").click(carga_form_busqueda);
    load_users_cuenta();

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
function set_user_id(e){

    $(".seccion-busqueda").hide();
    //$("#modal-title-user").text("Configuración del usuario ");
    id_usuario = e.target.id;
    $("#id_usuario").val(id_usuario);
    $("#email-section").hide();
    reset_form_user();
    /*Mandamos a llamar los datos del usuario */
    load_data_user(id_usuario);
}


function set_config_user_record(){

    $("#modal-title-user").text(" + Registra un nuevo integrante a la cuenta ");
    $("#id_usuario").val(0);   
    valor = $("#email").val()
    $("#email-section").show();    
    reset_form_user();
}
/**/
function reset_form_user(){
    $("#response-update-insert").text("");
    var  inputs_reset = ["#apellido_paterno" , "#apellido_materno"  , "#nombres" , "#email" , "#email_alterno" , "#tel_contacto"  , "#tel_contacto_alterno" , "#inicio_labor" , "#fin_labor" , "#rfc"];
    reset_fields(inputs_reset);     
}
/******************LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS */
/**/
function load_data_nota_user(e){

    var  alerts =  [".alert-ok" , ".alert-fail"];
    ocualta_elementos_array(alerts);
    url = now + "index.php/api/user/miembro/format/json/";
    user = e.target.id;    
    dinamic_user = user;
    $.get( url , {"id_usuario" : user } ).done(function(data){
        /**/
        descripcion = data[0].descripcion; 
        $(".nota-user-text").val(descripcion);
    }).fail(function(){
        alert("Errror");
    });
}
/*Carga los usuarios de la cuenta*/
function load_users_cuenta(){

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
        //load_resumen_usuarios();    
         $(".edit-nota-user").click(load_data_nota_user);
        $(".editar_permisos_miembro").click(set_user_id);    
        $(".config_estatus_user").click(template_config_estatus);
        $(".mas-info").click(dinamic_section);
        $(".menos-info").click(dinamic_section_info);
        $(".img_user").click(carga_imagen_user);
  
              
    }).fail(function(){
        show_error_enid("#integrantes-table-info"  , "Error al registrar, reporte al administrador "); 
    });    
    return false;
}
/*

function load_resumen_usuarios(){    
    url = now + "index.php/api/cuentageneralrest/integranteescuentaresumen/format/json";    
    $.get(url).done(function(data){    
        
        llenaelementoHTML("#resumen-section" , data);
        $(".edit-nota-user").click(load_data_nota_user);
        $(".editar_permisos_miembro").click(set_user_id);    
        $(".config_estatus_user").click(template_config_estatus);
        $(".mas-info").click(dinamic_section);
        $(".menos-info").click(dinamic_section_info);
        $(".img_user").click(carga_imagen_user);
  



    }).fail(function(){    
        alert("Error");
    });

}
*/
/**/
function load_data_user(id_usuario){

  url = now + "index.php/api/user/miembro/format/json/";   
   $.ajax({
        url: url, 
        data: {"id_usuario" : id_usuario }, 
        type: "GET", 
        beforeSend: function(){
            llenaelementoHTML("#integrantes-table-info" , "Cargando ..");             
        }

   }).done(function(data){
        llenaelementoHTML("#integrantes-table-info" , data);           
   }).fail(function(){
        alert("Error ");
   });
}
/**/
function carga_form_user(){

    url = now + "index.php/api/user/miembro/format/json/";       
    showonehideone( ".nueva_busqueda" , ".seccion-busqueda");


    $.ajax({
        url: url, 
        data: {"id_usuario" : 0 }, 
        type: "GET", 
        beforeSend: function(){
                llenaelementoHTML("#integrantes-table-info" , "Cargando ..");             
        }
   }).done(function(data){
        llenaelementoHTML("#integrantes-table-info" , data);           
   }).fail(function(){
        alert("Error ");
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
function update_descripcion_user(){    
    url = now + "index.php/api/user/miembro_descripcion/format/json/";
    data_send =  $("#descripcion-miembro").serialize() + "&" + $.param({"usuario" : dinamic_user });        
    actualiza_data(url , data_send);
    /**/

    llenaelementoHTML( "#response-insert-user" , "<div class='alert-ok' id='alert-ok-nota'><em> Datos actualizados correctamente.!</em></div>");
    
    complete_alert_ok_modal("#alert-ok-nota",  "#edit-nota-user-modal");
    return false;
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
            llenaelementoHTML("#integrantes-table-info" , "Error al tratar de configurar el estado del usuario ");   
        }
    }).done(function(data){
          llenaelementoHTML("#integrantes-table-info" ,  data );   
    }).fail(function(){
          llenaelementoHTML("#integrantes-table-info" , "Error al tratar de configurar el estado del usuario ");   
    });
}