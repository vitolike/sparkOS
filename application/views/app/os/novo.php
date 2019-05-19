    <div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
         <a class="nav-link active red-text" onClick="history.back()"><i class="fas fa-arrow-left navbar-text"></i></a>

       
      </nav>
      </div>
    </div>
    

    <main role="main" class="container">
    
    

    <div class="my-3 p-3 bg-white rounded box-shadow">
    <h5 class="card-title">Cadastro de OS</h5>
    
    <div class="row">&nbsp;</div>
    
 <div class="card">
  <div class="card-header">
    Detalhes da OS
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
   <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Cliente</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Técnico / Responsável</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputState">Status</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Data Inicial</label>
      <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" id="datepicker">
    </div>
      <div class="form-group col-md-3">
      <label for="inputZip">Data Final</label>
      <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" id="datepicker">
    </div>
      <div class="form-group col-md-3">
      <label for="inputZip">Garantia</label>
      <input type="text" class="form-control" id="inputZip">
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
 

  </div>
</div>
    <div class="row">&nbsp;</div>
    
            
  <div class="btn-group btn-group btn-block" role="group" aria-label="..."><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editar"><i class="far fa-edit"></i> Continuar
</button>
<button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#novo"><i class="fas fa-user-plus"></i> Voltar
</button></div></form>
        
       
    </div></main>

<script>
	$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});
    </script>