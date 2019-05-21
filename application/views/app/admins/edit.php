    <div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
                <a class="nav-link active red-text" onclick="history.back()"><i class="fas fa-arrow-left navbar-text"></i></a>
        <a class="nav-link red-text" href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus navbar-text"></i>
          &nbsp; Adicionar novo
        </a>
       
      </nav>
      </div>
    </div>
    
    

    <main role="main" class="container">
    
    

      <div class="my-3 p-3 bg-white rounded box-shadow">
    <h5 class="card-title">Editar</h5>
    <h6 class="card-subtitle mb-2 text-muted">Edite as informações do usuário.</h6>
  
        
        <div class="media text-muted pt-3">
          
        </div>
        
         <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>admins/atualizar">
         <input type="hidden" class="form-control" id="adminid" name="adminid" value="<?= $query[0]->adminid; ?>">
  
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?= $query[0]->nome; ?>" placeholder="Carlos Roberto Jr.">
  </div>
  
  
  
  
  <div class="form-group">
    <label for="telefone">Telefone/WhatsApp</label>
   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fab fa-whatsapp"></i></span>
  </div>
  <input type="number" class="form-control" placeholder="(00) 0000-00000" id="telefone" name="telefone" value="<?= $query[0]->telefone; ?>">
</div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required" value="<?= $query[0]->email; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="senha">Senha</label>
      <button type="button" class="form-control" data-toggle="modal" data-target="#senhaModal"><i class="fas fa-key"></i>&nbsp; Alterar senha</button>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="obs">Observação</label>
      <input type="text" class="form-control" id="obs" name="obs" value="<?= $query[0]->obs; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="status">Status</label>
      <select id="status" class="form-control" name="status">
        <option value="2" <?= $query[0]->status==2?'selected':'' ?>>Ativo</option>
        <option value="1" <?= $query[0]->status==1?'selected':'' ?>>Desativado</option>
        <option value="3" <?= $query[0]->status==3?'selected':'' ?>>Bloqueado</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="tipo">Tipo de acesso</label>
      <select id="tipo" class="form-control" name="tipo">
        <option value="1" <?= $query[0]->tipo==1?'selected':'' ?>>Funcionario</option>
        <option value="2" <?= $query[0]->tipo==2?'selected':'' ?>>Administrador</option>
        <option value="3" <?= $query[0]->tipo==3?'selected':'' ?>>Super Administrador</option>
      </select>
    </div>
  </div>
 


      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-lg btn-block"> <i class="fas fa-save"></i>&nbsp; Salvar</button>
      </div></form>
      </div>
    </main>
    
    
    
    <!-- Modal senha -->
<div class="modal fade" id="senhaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Definir nova senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>admins/atualizar_senha"><input type="hidden" class="form-control" id="adminid" name="adminid" value="<?= $query[0]->adminid; ?>">
  <div class="form-group">
    <label for="formGroupExampleInput">Senha antiga</label>
    <input type="password" class="form-control" id="senha_antiga" placeholder="Senha antiga">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Senha nova</label>
    <input type="password" class="form-control" id="senha_nova" name="senha_nova"  placeholder="Senha nova">
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar</button></form>
      </div>
    </div>
  </div>
<!-- Modal novo -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-plus"></i> Novo Usuário do sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>admins/add_admins">
  
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Carlos Roberto Jr.">
  </div>
  <div class="form-group">
    <label for="telefone">Telefone/WhatsApp</label>
   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fab fa-whatsapp"></i></span>
  </div>
  <input type="number" class="form-control" placeholder="(00) 0000-00000" id="telefone" name="telefone">
</div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
    </div>
    <div class="form-group col-md-6">
      <label for="senha">Senha</label>
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
    </div>
  </div>
  <div class="form-row">
   
    <div class="form-group col-md-6">
      <label for="status">Status</label>
      <select id="status" class="form-control" name="status">
        <option selected value="2">Selecione...</option>
        <option value="2">Ativo</option>
        <option value="1">Desativado</option>
        <option value="3">Bloqueado</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="tipo">Tipo</label>
      <select id="tipo" class="form-control" name="tipo">
        <option selected value="1">Selecione...</option>
        <option value="1">Moderador</option>
        <option value="2">Administrador</option>
        <option value="3">Super Administrador</option>
      </select>
    </div>
  </div>
    <div class="form-row">
     <div class="form-group col-md-12">
      <label for="obs">Observação</label>
      <input type="text" class="form-control" id="obs" name="obs">
    </div>
    </div>
 


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div></form>
    </div>
  </div>
</div>

    
    
    
  