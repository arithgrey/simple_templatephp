<br>

<div class='row'>
	<h1 class="title pull-right">
		Bienvenido		
	</h1>		
</div>

<div class='row'>
	<h3 class='pull-right'>
		<small>
		<?=$nombre_user;?>
		</small>
	</h3>
</div>



<div class='row'>
	<div class='pull-right'>
		    <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Primeros pasos
	          	<i class="fa fa-angle-double-right" aria-hidden="true"></i>
	          </a>
	          <ul class="dropdown-menu">
	            <li>
	            	<a href="<?=base_url('index.php/emp/lahistoria/')?>/<?=$id_empresa?>">
	            		Configurar empresa
	            		<span class="badge pull-right"> 1 </span>
	            	</a>
	            </li>
	            <li>
	            	<a href="<?=base_url('index.php/recursocontroller/usuarios')?>">
	            		Registrar usuarios
	            		<span class="badge pull-right"> 2
	            		</span>
	            	</a>
	            </li>
	            <li>
	            	<a href="<?=base_url('index.php/inicio/eventos')?>"> 
	            		Cargar eventos
	            		<span class="badge pull-right"> 
	            			3
	            		</span>
	            	</a>
	            </li>
	            <li>
	            	<a href="#">Dar seguimiento
	            		<span class="badge pull-right"> 4 
	            		</span>
	            	</a>
	            </li>
	            
	          </ul>
	        </li>
	      </ul>
	</div>
</div>

<style type="text/css">
.title {
		font-size: 3em;
		font-weight: 700;		
		text-align: center;
	}	
</style>














