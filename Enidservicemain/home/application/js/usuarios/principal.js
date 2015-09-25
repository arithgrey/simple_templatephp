$(document).on("ready" , function(){
        
    $(".sednewsolicitud").click(sed_mail_request);

    $(".editar_permisos_miembro").click(try_update_perfil_usuario);
    $("#integrantes-l").keyup(function(){
        
        filtro =  $(this).val();        
        load_users_cuenta(filtro);        


    });    

});

/*Carga los usuarios de la cuenta*/
function load_users_cuenta(filtro){

    url = now + "index.php/api/cuentageneralrest/integrantescuenta/format/json";
    var clientresponse = ["Error al cargar los colaboradores, reporte al administrador"];
    $.get(url, {"filtro": filtro } ).done(function( data ){
        
        llenaelementoHTML("#integrantes-table-info" , data);
        $(".editar_permisos_miembro").click(try_update_perfil_usuario);

    }).fail(function(){
        alert("Falla");
        llenaelementoHTML( "#listausuariosempresa", clientresponse[0]);
    });

}
/*Termina la función*/
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


        load_users_cuenta("0");   

    }).fail(function(){
        alert("un error se produjo....");
    });
}
/*Termina la función */



/**/
function try_update_perfil_usuario(e){

    usuario = e.target.id;
    url = now + "index.php/api/cuentageneralrest/integrantescuentaperfil/format/json";    
    $(".repo-edith").hide();    

    $("#edit-perfil-select").change(function(){

        perfil = $(this).val();
        actualiza_data(url , {"usuario" : usuario , "perfil" : perfil } );
        $(".repo-edith").show();
        load_users_cuenta("0");   

        
    }

    ); 


}