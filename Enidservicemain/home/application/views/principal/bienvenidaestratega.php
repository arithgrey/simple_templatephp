<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/estratega/evento/principal.js')?>"></script>


<style type="text/css">
#dinamic-field , #success-alert{
    display: none;
}
</style>


            <div class="row">
                <div class="col-md-8" style="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel" >
                                <header class="panel-heading" style='background:#CD1E3B; color: white'> 
                                    Últimos eventos anunciados
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="fa fa-times" href="javascript:;"></a>
                                     </span>
                                </header>
                                <div class="panel-body" style="background:  none repeat scroll 0% 0% #124048">                    
                                    
                                

                                    


                                    <!--last 5 -->

                                    <?=getLastEventsEstratega($ultimos_eventos);?>



                                    <!--Termina-->
                                </div>






                            </div>
                            <!---->
                            <div class="row">
                                <div class="col-md-12">
                                    <form role="form" class="form-inline" method="POST" id="nuevo-evento-form"  action=""> 
                                        <div class="form-group todo-entry">
                                            <input name='nuevo_evento' placeholder="Nombre, ejemplo 'Galactic Mus' " class="form-control" style="width: 100%" type="text">


                                            <!--Campos ocultos-->
                                            <div id='dinamic-field'>
                                                        <input name='nueva_edicion' placeholder="Edición del evento, ejemplo 'Revolution in the space' " class="form-control" style="width: 100%" type="text">


                                                        <div class="input-group  custom-date-range" data-date="13/01/2015" data-date-format="mm/dd/yyyy">
                                                            <input class="form-control dpd1" name="nuevo_inicio" type="text">
                                                            <span class="input-group-addon">hasta</span>
                                                            <input class="form-control dpd2" name="nuevo_termino" type="text">
                                                        </div>
                                                        <span class="help-block">Periodo del evento</span>
                                            </div>
                                            <!--Termina campos ocultos-->

                                        </div>



                                        <button class="btn btn-primary pull-right" type="submit">
                                            <i class="fa fa-check"></i>


                                        </button>
   



                                        
                                        




                                        
                                    </form>
                                </div>





                                        
                                    





                                <div class='alert alert-warning' id='response-event'></div>

                                <div class="alert alert-info" id='success-alert'>
                                    <h2>Registro correcto</h2>
                                </div>    
                                
                            </div>

                            

                            <!--Crear evento -->

                        
                        </div>


                    </div>
                </div>
                
                 <div class="col-md-4" style="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel" style="background: black">
                                <header class="panel-heading" style='color: white'>
                                    Tendencias
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="fa fa-times" href="javascript:;"></a>
                                     </span>
                                </header>
                                <div class="panel-body" style="background: #F3F8FB">
                                    <ul class="activity-list">
                                       
                                       

                                        <li>
                                            <div class="avatar">
                                                <img src="images/photos/user3.png" alt="">
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="#">Jonathan Smith</a> <span>attended a meeting with</span>
                                                    <a href="#">John Doe.</a></h5>
                                                <p class="text-muted">2 days ago near Alaska, USA</p>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="avatar">
                                                <img src="images/photos/user4.png" alt="">
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="#">Jonathan Smith</a> <span>completed the task “wireframe design” within the dead line</span></h5>
                                                <p class="text-muted">4 days ago near Alaska, USA</p>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="avatar">
                                                <img src="images/photos/user5.png" alt="">
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="#">Jonathan Smith</a> <span>was absent office due to sickness</span></h5>
                                                <p class="text-muted">4 days ago near Alaska, USA</p>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                
               
            </div>

        