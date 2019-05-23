    <div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
        <a class="nav-link red-text" href="<?= base_url(); ?>clientes/lista"><i class="fas fa-users navbar-text"></i>
          Clientes
        </a>
        <a class="nav-link red-text" href="<?= base_url(); ?>os/lista"><i class="fas fa-sticky-note navbar-text"></i> Ordens de Serviço 
			
			<?php if ($OS != null): ?><span class="badge badge-pill bg-danger text-white align-text-bottom "><?= $OS; ?></span><?php else: ?><?php endif; ?>
</a>
		<a class="nav-link red-text"  href="<?= base_url(); ?>produtos/lista"><i class="fas fa-store navbar-text"></i> Produtos</a>
        <a class="nav-link red-text" href="<?= base_url(); ?>servicos/lista"><i class="fas fa-screwdriver navbar-text"></i> Serviços</a>
        
       
      </nav>
      </div>
    </div>

    <main role="main" class="container">
          <div class="my-3 p-3 bg-white rounded box-shadow">
       <h6 class="card-title"><b>Produtos com estoque mínimo</b></h6>
           <div class="row">&nbsp;</div>
        <table class="table" id="produtos">
   <thead>
    <tr>
		<th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Em estoque</th>
      <th  scope="col">Estoque mínimo</th>
      <th scope="col"></th>
    </tr>
  </thead>
<?php if(!$prod){?>
 <tbody>
                    <tr>
                        <td colspan="5"> <center><p class="texto_pequeno">Nenhum produto cadastrado</p></center></td>
                    </tr>
                </tbody>
                
 <?php }else{ ?>
 <tbody> <?php foreach($prod as $p) {?>
  

     <tr id="<?= $p->produtosid; ?>">  
	<td>
		 
		 <?php if ($p->foto == null): ?><img src="<?= base_url(); ?>public/images/image.jpg" class="rounded mx-auto d-block img-fluid" width="64" >
		<?php else: ?><img src="<?= base_url(); ?>public/uploads/<?= $p->foto; ?>" class="rounded mx-auto d-block img-fluid" width="64">
		<?php endif; ?></td>
      <td><?= $p->descricao; ?></td>
      <td><?= $p->estoque; ?></td>
      <td><?= $p->estoque_minimo; ?></td>
     

      <td>
<a href="<?= base_url(); ?>produtos/editar/<?= $p->produtosid; ?>"><button type="button" class="btn btn-success btn-sm">Detalhes  <i class="fas fa-search"></i></button></a>
     </td>
    </tr> <?php }?>
    <?php }?>
  </tbody>  
</table>
        
        <div class="media text-muted pt-3">
          
        </div>
      </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
       <h6 class="card-title"><b>Ordens de Serviço em aberto</b></h6>
           <div class="row">&nbsp;</div>
       <table  class="table table-hover" id="OS_abertas">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Cliente</th>
      <th scope="col">Responsável</th>
      <th  scope="col">Data Inicial</th>
      <th  scope="col">Data Final</th>
      <th  scope="col">Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
<?php if(!$query){?>
 <tbody>
                    <tr>
                        <td colspan="5"> <center>
                          <p class="texto_pequeno">Não há Ordem de serviço em aberto</p></center></td>
                    </tr>
                </tbody>
                
 <?php }else{ ?>
 <tbody> <?php foreach($query as $prop) {?>
  

     <tr id="<?= $prop->idos; ?>"> 
      
      <td><?= $prop->protocolo; ?></td>
      <td><?= $prop->cliente; ?></td>
      <td><?= $prop->tecnico; ?></td>
      <td><?= $prop->data_inicial; ?></td>
      <td><?= $prop->data_final; ?></td>
       <td><?php if ($prop->status == 'FINALIZADO'): ?><span class="badge badge-warning">FINALIZADO</span>
      <?php elseif ($prop->status == 'CANCELADO'): ?><span class="badge badge-danger">CANCELADO</span>
      <?php else: ?><span class="badge badge-success"><?= $prop->status; ?></span><?php endif; ?></td>
     

      <td>
<a href="<?= base_url(); ?>os/detalhes/<?= $prop->idos; ?>"><button type="button" class="btn btn-success btn-sm">Detalhes  <i class="fas fa-search"></i></button></a>
  
      </td>
    </tr> <?php }?>
    <?php }?>
  </tbody>  
</table>
        
        <div class="media text-muted pt-3">
          
        </div>
        
      </div>
    </main>

<script>
$(document).ready(function() {
	
	  $('#OS_abertas').DataTable( {
	   "dom": 'Bfrtip',
        "info":     false,
	    "searching": false,
		  "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    } );
} );</script>
<script>
$(document).ready(function() {
	
	  $('#produtos').DataTable( {
	   "dom": 'Bfrtip',
        "info":     false,
	    "searching": false,
		  "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    } );
} );</script>

