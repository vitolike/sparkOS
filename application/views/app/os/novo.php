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
    <h5 class="card-title">Cadastro de OS</h5>
    
    <div class="row">&nbsp;</div>
    
 <div class="card">
  <div class="card-header">
    Detalhes da OS
  </div>
  <div class="card-body">
   <form>
  <div class="form-row">
    <div class="form-group col-md-6"><label for="cliente">Cliente</label>
    <div class="input-group">
      
      <input type="text" class="form-control" id="cliente" name="cliente">
      
    <div class="input-group-btn">
        <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i> Procurar</button>
    </div>
    </div>
    
    </div>
    <div class="form-group col-md-6">
      <label for="tecnico">Técnico / Responsável</label>
      
       <div class="input-group">
      
      <input type="text" class="form-control" id="tecnico" name="tecnico">
      
    <div class="input-group-btn">
        <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i> Procurar</button>
    </div>
    </div>
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputState">Status</label>
      <select id="inputState" class="form-control">
        <option selected>Escolha...</option>
        <option value="ORÇAMENTO">Orçamento</option>
        <option value="ABERTO">Aberto</option>
        <option value="EM ANDAMENTO">Em Andamento</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Data Inicial</label>
      <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" id="data_inicial" name="data_inicial">
    </div>
      <div class="form-group col-md-3">
      <label for="inputZip">Data Final</label>
      <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" id="data_final" name="data_final">
    </div>
      <div class="form-group col-md-1">
      <label for="garantia">Garantia</label>
      <input type="number" class="form-control" id="garantia" max="999" maxlength="2">
      </div>
       <div class="form-group col-md-2">
     <button type="button" class="btn btn-outline-primary" value="15" id="btn_garantia">15 Dias</button>   <button type="button" class="btn btn-outline-primary" value="30" id="btn_garantia1">30 Dias</button>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Descrição Produto/Serviço</label>
   <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>
   <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Defeito</label>
   <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>
  </div>
  <div class="form-row">
   <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Observações</label>
   <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>
   <div class="form-group col-md-6">
   <label for="exampleFormControlTextarea1">Laudo Técnico</label>
   <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>
  
  </div>
  <div class="row">&nbsp;</div>
    
            
  <div class="btn-group btn-group btn-block" role="group" aria-label="..."><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editar"><i class="fas fa-plus"></i> Continuar
</button>
<button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#novo"><i class="fas fa-angle-double-left"></i> Voltar
</button></div></form>
        
       
    </div></div></div>

<script>
		window.onload = function() {
    	document.getElementById('btn_garantia').addEventListener('click', function(){
        document.getElementById('garantia').value = document.getElementById('garantia').value + 		document.getElementById('btn_garantia').value;
		});
		document.getElementById('btn_garantia1').addEventListener('click', function(){
        document.getElementById('garantia').value = document.getElementById('garantia').value + 		document.getElementById('btn_garantia1').value;
		});
		
	 
}
</script>
<script>
$(function() {
    $( "#data_inicial" ).datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
});
$(function() {
    $( "#data_final" ).datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
});

</script>