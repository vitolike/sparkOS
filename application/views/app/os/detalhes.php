
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
    <h5 class="card-title">Detalhes da OS</h5>
    <h6 class="card-subtitle mb-2 text-muted">Aqui você pode consultar os detalhes da ordem de serviço!</h6>
    
    <div class="row">&nbsp;</div>
    
	<div class="card">
  <div class="card-body">
	  <h5 class="card-title texto">Protocolo: #<?= $query[0]->protocolo; ?></h5>
	  <div class="row">&nbsp;</div>
   <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>os/adicionar"><form>
  <div class="form-row">
    <div class="form-group col-md-6"><label for="cliente">Cliente</label>
    <div class="input-group">
      
      <input type="text" class="form-control" id="cliente" name="cliente" value="<?= $query[0]->cliente; ?>" readonly>
     
    </div>
    
    </div>
    <div class="form-group col-md-6">
      <label for="tecnico">Técnico / Responsável</label>
      
       <div class="input-group">
      
      <input type="text" class="form-control" id="tecnico" name="tecnico" value="<?= $query[0]->tecnico; ?>"  readonly>
      
    </div>
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputState">Status</label>
      <select id="inputState" class="form-control" name="status" required>
        <option value="ORÇAMENTO" <?= $query[0]->status=='ORÇAMENTO'?'selected':'' ?>>Orçamento</option>
        <option value="ABERTO" <?= $query[0]->status=='ABERTO'?'selected':'' ?>>Aberto</option>
        <option value="EM ANDAMENTO" <?= $query[0]->status=='EM ANDAMENTO'?'selected':'' ?>>Em Andamento</option>
		  <option value="FINALIZADO">Finalizado</option>
		  <option value="CANCELADO">Cancelado</option>
		  
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Data Inicial</label>
      <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" value="<?= $query[0]->data_inicial; ?>" id="data_inicial" name="data_inicial" required>
    </div>
      <div class="form-group col-md-3">
      <label for="inputZip">Data Final</label>
      <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" value="<?= $query[0]->data_final; ?>" id="data_final" name="data_final" required>
    </div>
      <div class="form-group col-md-1">
      <label for="garantia">Garantia</label>
      <input type="number" class="form-control" id="garantia" name="garantia" max="999" maxlength="2" value="<?= $query[0]->garantia; ?>" >
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
    
            
 <button type="submit" class="btn btn-primary btn-lg btn-block texto" >Continuar <i class="fas fa-angle-double-right"></i>
</button></form>
        
       
    </div></div>
  
        
</div>






</main>
	
	
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
		});
		document.getElementById('btn_admins').addEventListener('click', function(){
		document.getElementById('tecnico').value = '';
        document.getElementById('tecnico').value = document.getElementById('tecnico').value + document.getElementById('btn_admins').value;
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