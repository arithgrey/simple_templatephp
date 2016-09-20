        <div class="menu-right">            
            <ul class="notification-menu">
                

            <!--
                <li title='Tareas pendientes'>
                    <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-tasks">
                        </i>
                        <span class="badge">
                        1
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">You have 1 pending task
                        </h5>
                        <ul class="dropdown-list user-list">
                            <li class="new">
                                <a href="#">
                                    <div class="task-info">
                                        <div>
                                            Database update
                                        </div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
                                            <span class="">
                                                40%
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>                                         
                        </ul>
                    </div>
                </li>            
                -->
                <li>
                    <a style="background:#166781;" title='Más opciones' href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">                        
                        <?=$nombre;?>
                        <i class="fa fa-sort-desc">
                        </i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">                        
                        <li>
                            <a class='config-my-data'  href="<?=base_url('index.php/recursocontroller/informacioncuenta')?>">
                                <i class="fa fa-cog">
                                </i>  
                                Configuración de la cuenta
                            </a>
                        </li>
                        <li>
                            <a href="" data-toggle="modal"  data-target="#modal-version-sistema">
                                <i class="fa fa-code">
                                </i>
                                Versión del sistema 
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url('index.php/home/usos_privacidad_enid_service')?>" >                                
                                Condiciones de uso y privacidad 
                            </a>
                        </li>
                        <li title='Terminar sessión del sistema'>
                            <a href="<?=base_url('index.php/startsession/logout')?>">
                                <i class="fa fa-sign-out">
                                </i> 
                                Salir 
                            </a>
                        </li>
                    </ul>                                        
                </li>
            </ul>
        </div>