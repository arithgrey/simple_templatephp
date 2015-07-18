<!DOCTYPE html>
<html>
    <head>
        
        <script type="text/javascript" src="<?=base_url('application/js/soundcloud.player.api.js')?>"></script>


        <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/jquery-ui-1.9.2.custom.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/jquery-migrate-1.2.1.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>
        <script src="<?=base_url('application/js/js/modernizr.min.js')?>"></script>
        <script src="<?=base_url('application/js/main.js')?>"></script>

        
       
       
          
       


    </head>
    <body>
        
            <ul>
                <li class="genre"><a href="#">dupstep</a></li>
                <li class="genre"><a href="#" class="genre">rap</a></li>
                <li class="genre"><a href="#" class="genre">punk</a></li>
                <li class="genre"><a href="#" class="genre">pop</a></li>
                <li class="genre"><a href="#" class="genre">electronic</a></li>
            </ul>
        
            <div id="target"></div>






    </body>
</html>


<script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>
<input type="text" list="dinamic-artistas" id='artistainput'>
<datalist id="dinamic-artistas">              
</datalist>




<script type="text/javascript">     
    
    $('#artistainput').keyup(function (e){ 

        Stringentrante = $(this).val(); 
        
            buscarartista(Stringentrante);
    });

    function buscarartista(Stringentrante){        
        SC.initialize({
            lient_id: '1ce2bf4dcd83ee01f111219905b4f943'
        });
         
        SC.get('/tracks', { q: Stringentrante   }, function(tracks) {
          
                //document.write( "<pre><xmp>" + JSON.stringify(tracks) + "</xmp></pre>");

                newcontenidodatalist ="";                
                   for(var x in tracks ) {


                    /*Genero del artista*/
                    genre =  tracks[x]["genre"];
                    username = tracks[x]["user"].username;
                    avatar_url =  tracks[x]["user"].avatar_url;
                    uri =   tracks[x]["user"].uri;
                    id = tracks[x]["id"].id;

                        newcontenidodatalist += "<option value='"+ username  +"'>" ;
                   }
                   
                   document.getElementById('dinamic-artistas').innerHTML= newcontenidodatalist;                
        });

        
    }

</script>




<div id="redactando"></div>
<input type='hidden' name='now' id="now" class="now" value="<?=base_url();?>" > 



