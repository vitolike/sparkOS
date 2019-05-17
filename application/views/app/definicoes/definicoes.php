    <div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
         <a class="nav-link active red-text" onclick="history.back()"><i class="fas fa-arrow-left navbar-text"></i></a>

       
      </nav>
      </div>
    </div>
    
    

    <main role="main" class="container">
    
    <div class="row">&nbsp; </div>
    
     <?php if ($msg == 'atualizado'): ?><div class="row">&nbsp;</div>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> Definições foram atualizadas com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><?php endif; ?>
    

      <div class="my-3 p-3 bg-white rounded box-shadow">
    <h5 class="card-title">Definições do sistema</h5>
    <h6 class="card-subtitle mb-2 text-muted">Todas as definições do sistema.</h6>
    
        <div class="row">&nbsp; </div>
        
          <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>definicoes/salvar">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="sysname">Nome do Sistema</label>
      <input type="text" class="form-control" id="sysname" name="sysname" value="<?= $query[0]->sysname; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">E-mail</label>
      <input type="text" class="form-control" id="email" name="email" value="<?= $query[0]->email; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Nome Fantasia</label>
    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" value="<?= $query[0]->nome_fantasia; ?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">CNPJ</label>
    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?= $query[0]->cnpj; ?>">
  </div>
  <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>
</form>
     
 
      </div>
    </main>
    
    
