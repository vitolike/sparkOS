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
    <h5 class="card-title">Dados do serviço</h5>
    
    <div class="row">&nbsp;</div>
    
    <div class="card">
  		<div class="card-header"></div>
          <div class="card-body">
            <p class="card-text"><b>Nome:</b> <?= $query[0]->nome; ?>&nbsp; <br />
              <b>Descrição:</b> <?= $query[0]->descricao; ?>
              <br />
              <b>Preço:</b> R$<?= $query[0]->preco; ?>
              <br />
            </p>
          </div>
	</div>
    <div class="row">&nbsp;</div>
    
            
  <div class="btn-group btn-group btn-block" role="group" aria-label="..."><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editar"><i class="far fa-edit"></i> Editar dados
</button>
<button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#novo"><i class="fas fa-user-plus"></i> Criar novo produto
</button></div>
        
       
    </div></main>

 <!-- Modal -->
<div class="modal fade" id="novo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-edit"></i>&nbsp;&nbsp;Cadastro de serviços
</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>servicos/adicionar">
       
 
   <div class="form-group">
    <label for="inputAddress">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required="required">
  </div>
  
   <div class="form-group">
    <label for="inputAddress">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao">
  </div>
  
  <div class="form-group">
    <label for="inputAddress">Preço</label>
    <input type="text" class="form-control" id="preco" name="preco" required="required">
  </div>
  
  
  <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fas fa-plus"></i> Adicionar </button>
</form>
       
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="far fa-edit"></i> Editar dados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>servicos/update">
       
 <input type="hidden" class="form-control" id="iddefinicoes" name="clientesid" value="<?= $query[0]->servicosid; ?>">
   <div class="form-group">
    <label for="inputAddress">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?= $query[0]->nome; ?>" required="required">
  </div>
  
   <div class="form-group">
    <label for="inputAddress">Descrição</label>
    <input type="text" class="form-control" value="<?= $query[0]->descricao; ?>" id="descricao" name="descricao">
  </div>
  
  <div class="form-group">
    <label for="inputAddress">Preço</label>
    <input type="text" class="form-control" value="<?= $query[0]->preco; ?>" id="preco"  name="preco" required="required">
  </div>
  
  
  <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fas fa-plus"></i> Adicionar </button>
</form>
      </div>
    </div>
  </div>
</div>
   

   