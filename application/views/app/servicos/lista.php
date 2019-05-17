    <div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
         <a class="nav-link active red-text" onclick="history.back()"><i class="fas fa-arrow-left navbar-text"></i></a>
        <a class="nav-link red-text" href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus navbar-text"></i>
          &nbsp; Adicionar novo produto
        </a>
       
      </nav>
      </div>
    </div>
    
    

    <main role="main" class="container">
    
    <div class="row">&nbsp;</div>
    <?php if ($msg == 'novo'): ?><div class="row">&nbsp;</div>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-user-circle"></i>&nbsp; Novo Serviço!</strong> foi adicionado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php elseif ($msg == 'update'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;</strong> Serviço atualizado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php elseif ($msg == 'deletar'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;</strong> Serviço apagado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><?php endif; ?>
    
    
      <div class="my-3 p-3 bg-white rounded box-shadow">
    <h5 class="card-title">Serviços</h5>
    <h6 class="card-subtitle mb-2 text-muted">Lista de serviços cadastrados.
</h6>
        
        
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th  scope="col">Preço</th>
      <th scope="col"></th>
    </tr>
  </thead>
<?php if(!$query){?>
 <tbody>
                    <tr>
                        <td colspan="5"> <center><p class="texto_pequeno">Nenhum serviço cadastrado</p></center></td>
                    </tr>
                </tbody>
                
 <?php }else{ ?>
 <tbody> <?php foreach($query as $prop) {?>
  

     <tr id="<?= $prop->servicosid; ?>">  
      <td><?= $prop->nome; ?></td>
      <td><?= $prop->descricao; ?></td>
      <td><?= $prop->preco; ?></td>
     

      <td>
<a href="<?= base_url(); ?>servicos/editar/<?= $prop->servicosid; ?>"><button type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></button></a>
<button type="submit" class="btn btn-danger remove"><i class="fas fa-trash-alt"></i></button>  
      </td>
    </tr> <?php }?>
    <?php }?>
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

             url: "<?php echo site_url('servicos/delete/')?>"+id,
             type: 'DELETE',
             error: function() {
                alert('Ocorreu um erro');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Apagado!", "Serviço apagado com sucesso.", "success");
             }

          });

        } else {
          swal("Cancelado", "Seu serviço não foi apagado.", "error");
        }

      });

   });

    

</script>