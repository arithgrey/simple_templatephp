                            

<script type="text/javascript" src="<?=base_url('application/js/directorio/principal.js')?>"></script>

<style type="text/css">

</style>




<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">+<i class="fa fa-shopping-cart"></i>
</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      







                <div class="panel">
                        <div class="panel-body">
                            <div class="media usr-info">
                                <a href="#" class="pull-left">
                                    <img class="thumb" src="images/photos/user2.png" alt="">
                                </a>
                                <div class="media-body">


<form class='form-contacto' id='form-contacto' action='' method='post'>

                                    <div class='col-sm-12'>
                                        
                                        <h3>Contacto </h3>
                                        <div class="form-group has-success">
                                            <div class="col-lg-3">
                                                <h4 class="media-heading"><i class="fa fa-building"></i>

 Empresa</h4>    
                                            </div>
                                            <div class="col-lg-9">
                                                <input name='empresa_contacto' class="form-control" id="inputSuccess" type="text" placeholder='Diseños Enid' > 
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col-sm-12'>
                                        <div class="form-group has-success">
                                            <div class="col-lg-3">
                                                <h4><i class="fa fa-male"></i>
Persona contacto</h4>
                                            </div>
                                            <div class="col-lg-9">
                                                <input name='persona_contacto' class="form-control" id="inputSuccess" type="text" placeholder='Miguel Estrada' required> 
                                            </div>
                                        </div>
                                    </div>
                                         
                                    <div class='col-sm-12'>
                                        <div class="form-group has-success">
                                            <div class="col-lg-3">
                                                <h4><i class="fa fa-phone"></i>
Tel.</h4>
                                            </div>
                                            <div class="col-lg-9">
                                                <input name='tel_contacto' class="form-control" id="" type="tel" placeholder='511531740' required> 
                                            </div>
                                        </div>
                                    </div>

                                  

                                    <div class='col-sm-12'>
                                        <div class="form-group has-success">
                                            <div class="col-lg-3">
                                                <h4><i class="fa fa-mobile"></i>
Móvil</h4>
                                            </div>
                                            <div class="col-lg-9">
                                                <input name='movil_contact' class="form-control" id="inputSuccess" type="tel" placeholder='5551154834' > 
                                            </div>
                                        </div>
                                    </div>
                                         
                                    <div class='col-sm-12'>
                                        <div class="form-group has-success">
                                            <div class="col-lg-3">
                                                <h4><i class="fa fa-envelope-o"></i>
 Email</h4>

                                            </div>
                                            
                                            <div class="col-lg-9">
                                                <input name='email_contact' class="form-control" id="inputSuccess" type="email" placeholder='miguele@ddigitals.com'> 
                                            </div>
                                                              
                                            
                                        </div>
                                    </div>
                                         





                                    <div class='col-sm-12'>
                                        <div class="form-group has-success">
                                            <div class="col-lg-3">
                                                <h4><i class="fa fa-cogs"></i>

Proveedor de</h4>

                                            </div>
                                            
                                            <div class="col-lg-9">

                                                <select class="form-control m-bot15" name='tipo_proveedor'>
                                                    <option value="Productos" >Productos</option>
                                                    <option value="Servicios">Servicios</option>
                                                    <option value="Productos y Servicios">Productos y Servicios</option>
                                                    
                                                </select>

                                            </div>
                                                              
                                            
                                        </div>
                                    </div>
                                         






                                    <div class='col-sm-12'>
                                        <label><i class="fa fa-comment"></i> Nota </label>
                                        <textarea name='nota_contact' rows="6" class="form-control"></textarea>
                                    </div>    

                                </div>

                            </div>

                        </div>

                        <div class="panel-footer custom-trq-footer">
                            <ul class="user-states">
                                
                                    <button type="submit" class="btn btn-primary" >
                                        <i class="fa fa-check"></i>
                                     Registrar</button>
                                
                            </ul>
                        </div>
</form>
                </div>









    </div>
  </div>
</div>







<div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Contactos
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>

             </span>
        </header>
        <table aria-describedby="dynamic-table_info" class="display table table-bordered table-striped dataTable" id="dynamic-table">
        <thead>
        <tr role="row">
            <th aria-label="Rendering engine: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="dynamic-table" tabindex="0" role="columnheader" class="sorting">#</th>
            <th aria-label="Browser: activate to sort column ascending" style="width: 270px;" colspan="1" rowspan="1" aria-controls="dynamic-table" tabindex="0" role="columnheader" class="sorting">Proveedor</th>
            <th aria-label="Platform(s): activate to sort column ascending" style="width: 248px;" colspan="1" rowspan="1" aria-controls="dynamic-table" tabindex="0" role="columnheader" class="sorting">Servicios(s)</th>
            <th aria-label="Engine version: activate to sort column ascending" style="width: 154px;" colspan="1" rowspan="1" aria-controls="dynamic-table" tabindex="0" role="columnheader" class="hidden-phone sorting">Contacto(s)</th>
            
             <th aria-label="CSS grade: activate to sort column ascending" aria-sort="descending" style="width: 107px;" colspan="1" rowspan="1" aria-controls="dynamic-table" tabindex="0" role="columnheader" >Avanzado</th>
        </tr>
        </thead>
        
        <tfoot>
        <tr><th colspan="1" rowspan="1">#</th>
            <th colspan="1" rowspan="1">Proveedor</th>
            <th colspan="1" rowspan="1">Servicio(s)</th>
            <th colspan="1" rowspan="1" class="hidden-phone">Contacto(s)</th>            
            <th colspan="1" rowspan="1" class="hidden-phone">Avanzado</th></tr>
        </tfoot>
        <tbody aria-relevant="all" aria-live="polite" role="alert">
            <tr class="gradeX odd">
                <td class=" ">Trident</td>
                <td class=" ">Internet
                    Explorer 4.0</td>
                <td class=" ">Win 95+</td>
                <td class="center hidden-phone ">4</td>
                
                <td class="center hidden-phone  sorting_1">X</td>
            </tr>
            <tr class="gradeX odd">
                <td class=" ">Trident</td>
                <td class=" ">Internet
                    Explorer 4.0</td>
                <td class=" ">Win 95+</td>
                <td class="center hidden-phone ">4</td>
                
                <td class="center hidden-phone  sorting_1">X</td>
            </tr>
        </tbody></table>
        </section>
        </div>








