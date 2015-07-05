$(document).on("ready", function(){


	/*Carga los perfiles y recursos disponibles*/

	displaypermisos();
	
	
	/*Administración de secciones */

	$("#permisos_selection").click(displaypermisos);
	$("#perfiles_section").click(displayperfiles);
	$("#recursos_section").click(displayrecursos);

	/*recursos  */
	$("#nuevo_recurso").click(registrarrecurso);

	$("#textarearecurso").click(showtextarearecurso);
	
	$("#formnewrecurso").submit(registrarrecurso);


	/*Perfil */
	$("#nuevo_perfil_bt").click(registraperfil);
	$("#formnewperfil").submit(registraperfil);

	$("#textareaperfil").click(showtextareaperfil);

	/*Perfil recurso */

	$("#moreperfilrecurso").click(registraperfilrecurso);
	$("#moreperfilrecursorecurso").click(registraperfilrecursorecurso);
	



});







function displaypermisos(){
	


	url = now + "index.php/api/recursosrestcontroller/listrecursosperfilesconfig/format/json";
	list="";


	$.get(url ,  $("#form_recursos").serialize() ).done(function(data){

		/*Comenzamos con iniciar el titulo de la tabla*/
		list="<div>";
        //list+="<table class='table table-bordered table-striped table-condensed cf'>";              
        list+="<table class='table  table-hover general-table'>";              
        
        list+="<tr>";                       
        list+="<td class='blue-col-enid'><strong><span class='title-table-enid'>Modulo</span></strong></td>";                                 
        for(var y in data.perfiles){

        	list += "<td clas='blue-col-enid'>"+data.perfiles[y].nombreperfil+"</td>";
        }                
        list+="<td class='title-table-enid'>Avanzado</td></tr>";
        /*Terminamos de formar titulo de la tabla*/
        
        for(var x in data.recursos){

        	idrecurso = data.recursos[x].idrecurso; 
        	nombre = data.recursos[x].nombre;
        	descripcionrecurso  = data.recursos[x].descripcionrecurso ; 
        

        	inputdescription = "inputdescription_"+ idrecurso;

        	
        	list+="<tr><td class='blue-col-enid' > <label >" + nombre  + "</label>" ;        	
        	list+="<br><span > " +descripcionrecurso  + "</span></td>";	        	

	        for(var y in data.perfiles){


	        		idperfil = data.perfiles[y].idperfil;
	        		idrecurso = data.recursos[x].idrecurso; 
	        		perfilrecurso = idrecurso +"-"+ idperfil;
	        		/***********************************************************/	
	        				flag = 0; 
			        		for (var z in data.perfiles_recursos) {
			        			
			        			 idp = data.perfiles_recursos[z].idperfil;
			        			 idr = data.perfiles_recursos[z].idrecurso;

			        			if (idp == idperfil && idr == idrecurso) {

			        				flag ++;		
			        			} 	

			        		}/*Termina la el ciclo de perfiles data */

			        /***********************************************************/		
	        		/*Si el emento existe damos check*/
	        		if (flag > 0 ) {
	        			list += "<td align='center' ><input type='checkbox' class='perfilrecursoupdate icheckbox_flat-green' id='"+perfilrecurso+"' value='"+perfilrecurso+"'  checked></td>";	
	        		}else{
	        			list += "<td align='center'> <input type='checkbox' class='perfilrecursoupdate icheckbox_flat-green' id='"+perfilrecurso+"' value='"+perfilrecurso+"'></td>";
	        		}/*Termina condición*/


	       	}/*Termila el primer ciclo*/ 

	       	
	       	list+= "<td> <i class='avanzadoconfigperfilrecurso fa fa-cog' id='"+idrecurso+"' ></i></td>";
        	list+="</tr>" ;
        	

        }


 		list+="</table></div>";
        llenaelementoHTML("#display_permisos" , list);
        
        /*Controladores, eliminar y editar */
        //$(".editar_recurso").click(editrecursonow);
        $(".perfilrecursoupdate").click(editaaccesomodulo);
    	$(".icono_delete_recurso").click(eliminarecurosnow);
    	$(".avanzadoconfigperfilrecurso").click(nexttoavanzado);

	}).fail(function(){

		alert("algo falló ");
	});


	



	

}/*Termina */







/*Inicia crear nuevo permiso*/
function nuevopermiso(){
	alert("ok");
}
/*termina nuevo permiso*/






/**************************************************desplegar perfiles en permisos  *************/



function displayperfilespermisos(){
			
	url = now + "index.php/api/perfilrestcontroller/listperfilesinsystem/format/json";	
	$.get(url ,  $("#form_perfil").serialize() ).done(function(data){
	selectlist ="<select class='form-control'>";	
        /**/
        for(var x in data){

        	idperfil = data[x].idperfil; 
        	nombreperfil = data[x].nombreperfil;
        	descripcion = data[x].descripcion; 

  			selectlist +="<option value='"+idperfil+"'>"+nombreperfil+" </option>";		

        }
        selectlist += "</select>";
        llenaelementoHTML(".displaylist_perfiles" , selectlist);

	}).fail(function(){

		alert("algo falló --als");
	});

}/*Termina la función */



/***********************************************************************************************/
function displayrecursospermisos(){



	url = now + "index.php/api/recursosrestcontroller/listrecursos/format/json";
	list="";


	$.get(url ,  $("#form_recursos").serialize() ).done(function(data){

		selectlist ="<select class='form-control'>";	      
        for(var x in data){

        	idrecurso = data[x].idrecurso; 
        	nombre = data[x].nombre;
        	descripcionrecurso  = data[x].descripcionrecurso ; 
        	
        	selectlist +="<option value='"+idrecurso+"'>"+nombre+" </option>";		

        }

        selectlist += "</select>";
		llenaelementoHTML(".displaylist_recursos" , selectlist);
        
        
	}).fail(function(){

		alert("algo falló ----s");
	});


	


}/*Termina displayrecursospermisos*/

























/****************************************PERFILES**********************************************/



function displayperfiles(){

		
	url = now + "index.php/api/perfilrestcontroller/listperfilesinsystem/format/json";
	list="";
	$.get(url ,  $("#form_perfil").serialize() ).done(function(data){


		list="<div>";
        list+="<table class='table  table-hover general-table'>";              
        list+="<tr>";               
        list+="<td class='blue-col-enid'><label>#</label></td>";                                 
        list+="<td class='blue-col-enid'><label> Perfil </label></td>";                                 
        list+="<td> <label> Descripción</label></td>";                                                                                  
        list+="<td ><label>Eliminar </label></td>";              
        list+="</tr>";

        /**/
        for(var x in data){

        	idperfil = data[x].idperfil; 
        	nombreperfil = data[x].nombreperfil;
        	descripcion = data[x].descripcion; 

        	inputdescriptionperfil = "inputdescriptionperfil_"+ idperfil;
        	/*Añadimos a la tabla */
        	

        	list+="<tr><td class='blue-col-enid'><label>" + idperfil + "</label></td>" ;
        	list+="<td class='blue-col-enid'><label>" + nombreperfil  + "</label></td>" ;

        	if (descripcion.length > 0) {
        		list+="<td align='center'> <input type='text' class='inputdescriptionperfil' id='"+inputdescriptionperfil+"' value='"+descripcion+"' > <span class='editar_perfil' id='"+idperfil+"' >" + descripcion  + "</span></td>" ;

        	}else{
        		list+="<td align='center'> <input type='text' class='inputdescriptionperfil' id='"+inputdescriptionperfil+"' value='"+descripcion+"' > <span class='editar_perfil' id='"+idperfil+"' >-</span> <i class='fa fa-plus-circle'></i></td>" ;

        	}

        	

        	list+="<td> <i data-toggle='modal' data-target='#modaldeleteperfil'  class='fa fa-times icono_delete_perfil' id='"+idperfil+"' ></i>  </td></tr>" ;
        	

        }


 		list+="</table></div>";
        llenaelementoHTML("#display_perfiles" , list);
        $(".editar_perfil").click(editaperfilnow);   
        $(".icono_delete_perfil").click(eliminaperfilnow);       
                  


	}).fail(function(){

		alert("algo falló --");
	});


}







/*******************************************RECURSOS************************************************************/

function displayrecursos(){



	url = now + "index.php/api/recursosrestcontroller/listrecursos/format/json";
	list="";


	$.get(url ,  $("#form_recursos").serialize() ).done(function(data){


		list="<div>";
        list+="<table>";              
        list+="<tr>";               
        list+="<td>#</td>";                                 
        list+="<td>Recurso</td>";                                 
        list+="<td>Descripción </td>";                                                                                  
        list+="<td></td>";
        
        
                
        list+="</tr>";

        
        for(var x in data){

        	idrecurso = data[x].idrecurso; 
        	nombre = data[x].nombre;
        	descripcionrecurso  = data[x].descripcionrecurso ; 


        	inputdescription = "inputdescription_"+ idrecurso;

        	list+="<tr><td> <label>" + idrecurso + "</td>" ;
        	list+="<td> <label>" + nombre  + "</td>" ;


        	imagendelete =now + "application/img/general/rubbish7.png"; 
            imgavanzadorecurso = now + "application/img/general/three115.png";

        	if (descripcionrecurso.length > 0) {

        		list+="<td> <input type ='text' class='inputdescription col-xs-12 col-sm-12' name='"+inputdescription+"'  value='"+descripcionrecurso+"'  id='"+inputdescription+"'/> <span class='editar_recurso' id='"+idrecurso+"' >" + descripcionrecurso  + "</span></td>  <td><img  data-toggle='modal' data-target='#modaldeleterecurso' class='icono_delete_recurso' class='delete_recurso'  id='"+idrecurso+"'  src='"+imagendelete+"'></td>";	
        	}else{
        		
                list+="<td> <input type ='text' class='inputdescription col-xs-12 col-sm-12' name='"+inputdescription+"' value='"+descripcionrecurso+"'  id='"+inputdescription+"'/> <span class='editar_recurso' id='"+idrecurso+"' > + </span></td>  <td><img data-toggle='modal' data-target='#modaldeleterecurso'  class='icono_delete_recurso' class='delete_recurso' id='"+idrecurso+"' src='"+imagendelete+"'></td>" ;
                
   
        	}
        	
        	list+="</tr>" ;
        	

        }


 		list+="</table></div>";
        llenaelementoHTML("#display_recursos" , list);
        
        /*Controladores, eliminar y editar */
        $(".editar_recurso").click(editrecursonow);
    	$(".icono_delete_recurso").click(eliminarecurosnow);

	}).fail(function(){

		alert("algo falló ...");
	});


	


}/*Termina displayrecursos*/




/**************************Controlador secciones recursos ************************/
function showtextarearecurso(){

	$(".section_description_text_recurso").show();
}

function showtextareaperfil(){
	$(".section_description_text_perfil").show();
}





/*Controlador permisos */

function nexttoavanzado(e){

	idrecurso = e.target.id;
    next =  now + "index.php/recursocontroller/perfilesavanzado?moduloconfig=" + idrecurso;
    redirect(next);

}

/*Controlador avanzado recursos */
function nextimgavanzador(){
    
    idrecurso = e.target.id;
    //next =  now + "index.php/recursocontroller/";
    //redirect(next);    
}
