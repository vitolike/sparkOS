    <div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
         <a class="nav-link active red-text" onClick="history.back()"><i class="fas fa-arrow-left navbar-text"></i></a>

       
      </nav>
      </div>
    </div>
    

    <div role="main" class="container">
    
    

    <div class="my-3 p-3 bg-white rounded box-shadow">
    <h5 class="card-title">Cadastro de ordem de serviço</h5>
    <h6 class="card-subtitle mb-2 text-muted">Nova ordem de serviço.</h6>
		
<hr class="my-4">
    
 <div class="row">
  <div class="card-body">
   <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>os/adicionar"><form>
  <div class="form-row">
    <div class="form-group col-md-6"><label for="cliente">Cliente</label><div class="input-group mb-3">

  <input type="hidden" class="form-control" id="cliente" name="cliente">
		 <input type="text" class="form-control" id="nome_cliente" value="<?= $query[0]->nome_cliente; ?>" name="nome_cliente">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#procurarClientes"><i class="fas fa-search"></i> Procurar</button>
  </div>
</div>
    
    </div>
	
		    <div class="form-group col-md-6"><label for="cliente">Técnico / Responsável</label><div class="input-group mb-3">
  <input type="hidden" class="form-control" id="tecnico" name="tecnico"  required>
				 <input type="text" class="form-control" id="nome_tecnico" value="<?= $query[0]->nome_tecnico; ?>" name="nome_tecnico">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#procurarTecnico"><i class="fas fa-search"></i> Procurar</button>
  </div>
</div>
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputState">Status</label>
      <select id="inputState" class="form-control" name="status">
        <option value="ORÇAMENTO" <?= $query[0]->status=='ORÇAMENTO'?'selected':'' ?>>Orçamento</option>
        <option value="ABERTO" <?= $query[0]->status=='ABERTO'?'selected':'' ?>>Aberto</option>
        <option value="EM ANDAMENTO" <?= $query[0]->status=='EM ANDAMENTO'?'selected':'' ?>>Em Andamento</option>
		  <option value="FINALIZADO" <?= $query[0]->status=='FINALIZADO'?'selected':'' ?>>Finalizado</option>
		  <option value="CANCELADO" <?= $query[0]->status=='CANCELADO'?'selected':'' ?>>Cancelado</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Data Inicial</label>
      <input type="text" class="form-control" data-provide="datepicker" value="<?= $query[0]->data_inicial; ?>" data-date-format="DD-MM-YYYY" id="data_inicial" name="data_inicial" required>
    </div>
      <div class="form-group col-md-3">
      <label for="inputZip">Data Final</label>
      <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" value="<?= $query[0]->data_final; ?>" id="data_final" name="data_final" required>
    </div>
      <div class="form-group col-md-1">
      <label for="garantia">Garantia</label>
      <input type="number" class="form-control" id="garantia" name="garantia" max="999" maxlength="2" value="<?= $query[0]->garantia; ?>">
      </div>
       <div class="form-group col-md-2">
     <button type="button" class="btn btn-outline-primary" value="15" id="btn_garantia">15 Dias</button>   <button type="button" class="btn btn-outline-primary" value="30" id="btn_garantia1">30 Dias</button>
    </div>
  </div>
   <div class="form-row">
  <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Descrição Produto/Serviço</label>
   <textarea class="form-control" name="descricao" rows="5" required><?= $query[0]->descricao; ?></textarea>
  </div>
   <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Defeito</label>
   <textarea class="form-control" name="defeito" rows="5" required><?= $query[0]->defeito; ?></textarea>
  </div>
  </div>
  <div class="form-row">
   <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Observações</label>
   <textarea class="form-control" name="observacoes" rows="5" required><?= $query[0]->observacoes; ?></textarea>
  </div>
   <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Laudo Técnico</label>
   <textarea class="form-control" name="laudo_tecnico" rows="5" required><?= $query[0]->laudo_tecnico; ?></textarea>
  </div>
  
  </div>
  <div class="row">&nbsp;</div>
    
            
 <button type="submit" class="btn btn-primary btn-lg btn-block" >Salvar
</button></form>
        
       
    </div></div></div>
		
		
		
		<!-- Modal procurar clientes -->
<div class="modal fade" id="procurarClientes" tabindex="-1" role="dialog" aria-labelledby="procurarClientes" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-user-friends"></i> Clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table class="table table-sm" id="clientes">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Documento</th>
      <th  scope="col">Telefone</th>
      <th  scope="col">Cidade</th>
      <th scope="col"></th>
    </tr>
  </thead>
<?php if(!$clientes){?>
 <tbody>
                    <tr>
                        <td colspan="5"> <center><p class="texto_pequeno">Nenhum Cliente Cadastrado</p></center></td>
                    </tr>
                </tbody>
                
 <?php }else{ ?>
 <tbody> <?php foreach($clientes as $c) {?>
  

     <tr id="<?= $c->clientesid; ?>">  
      <td><?= $c->nome; ?>&nbsp;<?= $c->sobrenome; ?></td>
      <td><?= $c->tipo_documento; ?>&nbsp;<?= $c->documento; ?></td>
      <td><?= $c->telefone; ?></td>
      <td><?= $c->cidade; ?> - <?= $c->uf; ?></td>

      <td>  <button type="button" class="btn btn-outline-primary" value="<?= $c->clientesid; ?>" id="btn_clientes" data-dismiss="modal"><i class="fas fa-plus-square"></i> </td>
    </tr> <?php }?>
    <?php }?>
  </tbody>  
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
		
		
		
		<!-- Modal Tecnicos -->
<div class="modal fade" id="procurarTecnico" tabindex="-1" role="dialog" aria-labelledby="procurarTecnico" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Procurar Técnicos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                 <table class="table table-sm" id="tecnicos">
  <thead>
   <tr>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">E-mail</th>
      <th scope="col">Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
 <tbody> <?php foreach($admins as $a) {?>
  

    <tr id="<?= $a->adminid; ?>">   
      <td><?= $a->nome; ?></td>
      <td><?= $a->telefone; ?></td>
      <td><?= $a->email; ?></td>
      <td><?php if ($a->status == 1): ?><span class="badge badge-danger">Desativado</span>
      <?php elseif ($a->status == 3): ?><span class="badge badge-danger">Bloqueado</span>
      <?php elseif($a->status == 2): ?><span class="badge badge-success">Ativo</span><?php endif; ?>
      
      </td>
      <td>  <button type="button" class="btn btn-outline-primary" value="<?= $a->adminid; ?>" id="btn_admins" data-dismiss="modal"><i class="fas fa-plus-square"></i> </td>
    </tr> <?php }?>
  </tbody>  
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
		
		
		
		
		
		
		
		
	
<script>
		window.onload = function() {
    	document.getElementById('btn_garantia').addEventListener('click', function(){
		document.getElementById('garantia').value = '';
        document.getElementById('garantia').value = document.getElementById('garantia').value + document.getElementById('btn_garantia').value;
		});
		document.getElementById('btn_garantia1').addEventListener('click', function(){
		document.getElementById('garantia').value = '';
        document.getElementById('garantia').value = document.getElementById('garantia').value + document.getElementById('btn_garantia1').value;
		});
			
		document.getElementById('btn_clientes').addEventListener('click', function(){
		document.getElementById('cliente').value = '';
        document.getElementById('cliente').value = document.getElementById('cliente').value + document.getElementById('btn_clientes').value;
		$.ajax({

			url: '<?php echo site_url('clientes/buscar/')?>'+$(this).val(),

			dataType: 'json',

			success: function(resposta){

				$("#nome_cliente").val(resposta.nome+' '+resposta.sobrenome) ;
			}
		});
		});
		document.getElementById('btn_admins').addEventListener('click', function(){
		document.getElementById('tecnico').value = '';
        document.getElementById('tecnico').value = document.getElementById('tecnico').value + document.getElementById('btn_admins').value;
		$.ajax({

			url: '<?php echo site_url('admins/buscar/')?>'+$(this).val(),

			dataType: 'json',

			success: function(resposta){

				$("#nome_tecnico").val(resposta.nome) ;
			}
		});
		
		});
			
				
		
	 
}
</script>
<script>
$(function() {
    $( "#data_inicial" ).datepicker({
        dateFormat: 'yy/mm/dd',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
});
$(function() {
    $( "#data_final" ).datepicker({
        dateFormat: 'yy/mm/dd',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
});

</script>
		<script>
			if ( ! $.fn.DataTable.isDataTable( '#clientes' ) ) {
  $('#clientes').dataTable({
	   "dom": 'Bfrtip',
        "info":     false,
		  "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    } );
}
		</script>

		