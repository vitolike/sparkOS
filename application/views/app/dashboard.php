    <div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
        <a class="nav-link red-text" href="<?= base_url(); ?>clientes/lista"><i class="fas fa-users navbar-text"></i>
          Clientes
        </a>
        <a class="nav-link red-text" href="#"><i class="fas fa-sticky-note navbar-text"></i> Ordens de Serviço         <span class="badge badge-pill bg-danger text-white align-text-bottom ">27</span>
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
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Em estoque</th>
      <th scope="col">Estoque mínimo</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
       <tr>
                        <td colspan="5"> <center><p class="texto_pequeno">Nenhum produto com estoque mínimo</p></center></td>
                    </tr>
  </tbody>
</table>
        
        <div class="media text-muted pt-3">
          
        </div>
        <small class="d-block text-right mt-3">
        <a href="#">Ver tudo</a></small>
      </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
       <h6 class="card-title"><b>Ordens de Serviço em aberto</b></h6>
           <div class="row">&nbsp;</div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data Inicial</th>
      <th scope="col">Data Final</th>
      <th scope="col">Cliente</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
       <tr>
                        <td colspan="5"> <center><p class="texto_pequeno">Não há Ordem de serviço em aberto</p></center></td>
                    </tr>
  </tbody>
</table>
        
        <div class="media text-muted pt-3">
          
        </div>
        <small class="d-block text-right mt-3">
        <a href="#">Ver tudo</a></small>
      </div>
    </main>
