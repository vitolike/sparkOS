
    <div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
         <a class="nav-link active red-text" onclick="history.back()"><i class="fas fa-arrow-left navbar-text"></i></a>
       
      </nav>
      </div>
    </div>
    

<main role="main" class="container">

<div class="my-3 p-3 bg-white rounded box-shadow">
	<div class="row">
    <div class="col">
  	<h5 class="card-title">Detalhes da OS</h5>
    <h6 class="card-subtitle mb-2 text-muted">Aqui você pode consultar os detalhes da ordem de serviço!</h6>
		
    </div>
    <div class="col-md-auto">
      &nbsp;
    </div>
    <div class="col text-right">
		<div class="btn-group" role="group">
  <button type="button" class="btn btn-primary"><i class="fas fa-print"></i>&nbsp;&nbsp;Imprimir</button>
<button type="button" class="btn btn-primary"><i class="fas fa-cash-register"></i>&nbsp;&nbsp;Faturar</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alterarstatus"><i class="fas fa-info"></i>&nbsp;&nbsp;Alterar Status</button>
  <a href="<?= base_url(); ?>os/editar/<?= $query[0]->idos; ?>" class="btn btn-primary"><i class="fas fa-pen"></i>&nbsp;&nbsp;Editar OS</a>
</div>
    </div>
  </div>
	
	<hr class="my-4">
	
	<!-- Modal -->
<div class="modal fade" id="alterarstatus" tabindex="-1" role="dialog" aria-labelledby="alterarstatus" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-info"></i>&nbsp;&nbsp;Alterar Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>os/atualizar_status">
		
		 <input type="hidden" value="<?= $query[0]->idos; ?>" name="idos" />
      <div class="modal-body">
		  <div class="form-group col">
      <label for="inputState">Novo status</label>
      <select id="inputState" class="form-control" name="status">
        <option value="ORÇAMENTO" <?= $query[0]->status=='ORÇAMENTO'?'selected':'' ?>>Orçamento</option>
        <option value="ABERTO" <?= $query[0]->status=='ABERTO'?'selected':'' ?>>Aberto</option>
        <option value="EM ANDAMENTO" <?= $query[0]->status=='EM ANDAMENTO'?'selected':'' ?>>Em Andamento</option>
		  <option value="FINALIZADO" <?= $query[0]->status=='FINALIZADO'?'selected':'' ?>>Finalizado</option>
		  <option value="CANCELADO" <?= $query[0]->status=='CANCELADO'?'selected':'' ?>>Cancelado</option>
		  
      </select>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div></form>
    </div>
  </div>
</div>
	
    
	<div class"row">
  <div class="card-body">
	  <h5 class="card-title texto">Protocolo: #<?= $query[0]->protocolo; ?></h5>
	  <div class="row">&nbsp;</div>
   <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>os/atualizar">
	   <input type="hidden" value="<?= $query[0]->idos; ?>" name="idos" />
  <div class="form-row">
    <div class="form-group col-md-6"><label for="cliente">Cliente</label>
    <div class="input-group">
      
      <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="<?= $query[0]->nome_cliente; ?>" readonly>
     
    </div>
    
    </div>
    <div class="form-group col-md-6">
      <label for="tecnico">Técnico / Responsável</label>
      
       <div class="input-group">
      
      <input type="text" class="form-control" id="nome_tecnico" name="nome_tecnico" value="<?= $query[0]->nome_tecnico; ?>"  readonly>
      
    </div>
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputState">Status</label>
	<input type="text" class="form-control"  value="<?= $query[0]->status; ?>" name="status" readonly>

    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Data Inicial</label>
      <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" value="<?= $query[0]->data_inicial; ?>" id="data_inicial" name="data_inicial" readonly>
    </div>
      <div class="form-group col-md-3">
      <label for="inputZip">Data Final</label>
      <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" value="<?= $query[0]->data_final; ?>" id="data_final" name="data_final" readonly>
    </div>
      <div class="form-group col-md-1">
      <label for="garantia">Garantia</label>
      <input type="number" class="form-control" id="garantia" name="garantia" max="999" maxlength="2" value="<?= $query[0]->garantia; ?>" readonly>
      </div>
       <div class="form-group col-md-2">
     <button type="button" class="btn btn-outline-primary" value="15" id="btn_garantia">15 Dias</button>   <button type="button" class="btn btn-outline-primary" value="30" id="btn_garantia1">30 Dias</button>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Descrição Produto/Serviço</label>
   <textarea class="form-control" name="descricao" rows="5" readonly><?= $query[0]->descricao; ?></textarea>
  </div>
   <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Defeito</label>
   <textarea class="form-control" name="defeito" rows="5" readonly><?= $query[0]->defeito; ?></textarea>
  </div>
  </div>
  <div class="form-row">
   <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Observações</label>
   <textarea class="form-control" name="observacoes" rows="5" readonly><?= $query[0]->observacoes; ?></textarea>
  </div>
   <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Laudo Técnico</label>
   <textarea class="form-control" name="laudo_tecnico" rows="5" readonly><?= $query[0]->laudo_tecnico; ?></textarea>
  </div>
  
  </div>
  <div class="row">&nbsp;</div>
    
            
 </form>
	  <div class="row">&nbsp;</div>

	    <div class="row">&nbsp;</div>

  <div class="row">
    <div class="col">
       <h5 class="card-title">Serviços realizados e produtos utilizados.</h5>
	  <h6 class="card-subtitle mb-2 text-muted">No botão adicionar, você pode adicionar produtos e serviço a está ordem de serviço!</h6>
    </div>
    <div class="col-md-auto">
      &nbsp;
    </div>
    <div class="col col-lg-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproduto">
Adicionar <i class="fas fa-plus"></i>
</button>
    </div>
  </div>
	  
	  <div class="row">&nbsp;</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Descrição</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Valor</th>
	  <th scope="col">Ação</th>
    </tr>
  </thead><?php if(!$linhas){?>
  <tbody>
     <tr>
                        <td colspan="5"> <center><p class="texto_pequeno">Nenhuma linha adicionada</p></center></td>
    </tr>
  </tbody>
<?php }else{ ?>
 <tbody> <?php foreach($linhas as $l) {?>
  

     <tr id="<?= $l->idos_linhas; ?>">  
      <td><?= $l->descricao; ?></td>
      <td><?= $l->quantidade; ?></td>
      <td><?= $l->preco; ?></td>
      <td class="text-right"><a href="#" class="btn btn-danger remove"><i class="far fa-trash-alt"></i></a></td>

    </tr> <?php }?>
    <?php }?>
  </tbody>  
</table>
        
       
    </div></div>
  
        
</div>


<!-- Modal -->
<div class="modal fade" id="addproduto" tabindex="-1" role="dialog" aria-labelledby="addproduto" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Adicionar <i class="fas fa-plus"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Descrição</th>
	  <th scope="col">Em estoque</th>
      <th scope="col">Valor</th>
	  <th scope="col col-lg-2">Quantidade</th>
	  <th scope="col"></th>
    </tr>
  </thead><?php if(!$produtos){?>
  <tbody>
     <tr>
                        <td colspan="5"> <center><p class="texto_pequeno">Nenhuma linha adicionada</p></center></td>
    </tr>
  </tbody> <?php }else{ ?>
 <tbody> <?php foreach($produtos as $prod) {?>
  
 <form method="post" role="form" action="<?= base_url(); ?>os/add_produto">
     <tr> 
     <input type="hidden" readonly class="form-control-plaintext" name="idos" value="<?= $query[0]->idos; ?>">
	  <input type="hidden" readonly class="form-control-plaintext" name="pid" value="<?= $prod->id; ?>">
      <td><input type="text" readonly class="form-control-plaintext" name="descricao" value="<?= $prod->descricao; ?>"> </td>
	<td><input type="text" readonly class="form-control-plaintext" value="<?= $prod->estoque; ?>"> </td>
      <td><input type="text" readonly class="form-control-plaintext" name="preco" value="<?= $prod->preco; ?>"></td>
		 <td>  <input type="number" class="form-control" name="quantidade" placeholder="Quantidade" required></td>
	 <td class="text-right"> <button type="submit" class="btn btn-outline-primary" id="btn_produtos"><i class="fas fa-plus"></i> Adicionar </td>

    </tr></form> <?php }?>
    <?php }?>
  </tbody>  
</table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



</main>
	
	
<script type="text/javascript">
    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");

    swal({

        title: "Apagar",
        text: "Você tem certeza?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Sim, apagar!",
        cancelButtonText: "Não, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: false

      },

      function(isConfirm) {

        if (isConfirm) {

          $.ajax({

             url: "<?php echo site_url('os/delete_linha/')?>"+id,
             type: 'DELETE',
             error: function() {
                swal("Error", "Ocorreu um erro, contate o administrador", "error");
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Apagado!", "Linha apagada com sucesso.", "success");
				 
				 
             }
			  
          });

        } else {
          swal("Cancelado", "Seu produto não foi apagado.", "error");
        }

      });
		
   });

    

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