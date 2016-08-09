<div>          
  <ul class="nav nav-pills" role="tablist">
    <li class="active">
      <a aria-expanded="true" href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals">
        <i class='fa fa-users'>
        </i>        
      </a>
      </li>
    
    <li>
      <a aria-expanded="false" href="#pill-2" role="tab" data-toggle="tab" title="Top Sellers">
        <i class=" icon-up-1">
        </i> 
        Privacidad
      </a>
    </li>    
  </ul>

  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
      <?=$this->load->view("micuenta/general")?>
    </div>
    <div class="tab-pane" id="pill-2">
      <?=$this->load->view("micuenta/privacidad")?>
    </div>    
  </div>            
</div>


            
        

<script src="<?=base_url('application/js/sha1.js');?>"></script>    
<script type="text/javascript" src="<?= base_url('application/js/MiCuenta/perfil_user.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/perfil_user/principal.css')?>">
