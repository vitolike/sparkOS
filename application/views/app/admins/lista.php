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
    
    <div class="row">&nbsp;</div>
    <?php if ($msg == 'adicionado'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-user-circle"></i>&nbsp; Novo usuário!</strong> adicionado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php elseif ($msg == 'erro_email'): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-exclamation-triangle"></i>&nbsp; Erro!</strong> e-mail já existe cadastrado no sistema.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<?php elseif ($msg == 'atualizado'): ?>
     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-user-circle"></i>&nbsp; Usuário!</strong> atualizado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><?php endif; ?>
    

      <div class="my-3 p-3 bg-white rounded box-shadow">
    <h5 class="card-title">Usuários do sistema</h5>
    <h6 class="card-subtitle mb-2 text-muted">Usuários e tecnicos do sistema.</h6>
        
        
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">E-mail</th>
      <th scope="col">Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody> <?php foreach($query as $prop) {?>
  

    <tr id="<?= $prop->adminid; ?>">   
      <td><?= $prop->nome; ?></td>
      <td><?= $prop->telefone; ?></td>
      <td><?= $prop->email; ?></td>
      <td><?php if ($prop->status == 1): ?><span class="badge badge-danger">Desativado</span>
      <?php elseif ($prop->status == 3): ?><span class="badge badge-danger">Bloqueado</span>
      <?php elseif($prop->status == 2): ?><span class="badge badge-success">Ativo</span><?php endif; ?>
      
      </td>
      <td>
<?php if ($prop->adminid == 1): ?><a href="<?= base_url(); ?>admins/editar/<?= $prop->adminid; ?>" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
<?php else: ?>
<a href="<?= base_url(); ?>admins/editar/<?= $prop->adminid; ?>" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
      <button type="submit" class="btn btn-danger remove"><i class="fas fa-trash-alt"></i></button>


<?php endif; ?></td>

    </tr> <?php }?>
  </tbody>
</table>
        
        <div class="media text-muted pt-3">
          
        </div>
      </div>
    </main>
    
    
    
    <!-- Modal -->
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
        <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>admins/adicionar">
  
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
        <option value="1">Funcionario</option>
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

             url: "<?php echo site_url('admins/delete/')?>"+id,
             type: 'DELETE',
             error: function() {
                alert('Ocorreu um erro');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Apagado!", "O Administrador foi apagado com sucesso.", "success");
             }

          });

        } else {
          swal("Cancelado", "Seu Administrador não foi apagado.", "error");
        }

      });

   });

    

</script>