    <div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
         <a class="nav-link active red-text" onclick="history.back()"><i class="fas fa-arrow-left navbar-text"></i></a>
        <a class="nav-link red-text" href="<?= base_url(); ?>os/novo"><i class="fas fa-plus navbar-text"></i>
          &nbsp; Adicionar nova OS
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
    <h5 class="card-title">Ordens de Serviço</h5>
    <h6 class="card-subtitle mb-2 text-muted">Lista de ordens de serviço.
</h6>
        
        
        <table class="table" id="OS">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Cliente</th>
      <th scope="col">Responsável</th>
      <th  scope="col">Data Inicial</th>
      <th  scope="col">Data Final</th>
      <th  scope="col">Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
<?php if(!$query){?>
 <tbody>
                    <tr>
                        <td colspan="5"> <center>
                          <p class="texto_pequeno">Nenhuma ordem de serviço cadastrada</p></center></td>
                    </tr>
                </tbody>
                
 <?php }else{ ?>
 <tbody> <?php foreach($query as $prop) {?>
  

     <tr id="<?= $prop->idos; ?>"> 
      
      <td><?= $prop->protocolo; ?></td>
      <td><?= $prop->nome_cliente; ?></td>
      <td><?= $prop->nome_tecnico; ?></td>
      <td><?= $prop->data_inicial; ?></td>
      <td><?= $prop->data_final; ?></td>
      <td><?php if ($prop->status == 'FINALIZADO'): ?><span class="badge badge-warning">FINALIZADO</span>
      <?php elseif ($prop->status == 'CANCELADO'): ?><span class="badge badge-danger">CANCELADO</span>
      <?php else: ?><span class="badge badge-success"><?= $prop->status; ?></span><?php endif; ?></td>
     

      <td>
<a href="<?= base_url(); ?>os/detalhes/<?= $prop->idos; ?>"><button type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></button></a>
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

             url: "<?php echo site_url('os/delete/')?>"+id,
             type: 'DELETE',
             error: function() {
                swal("Error", "Ocorreu um erro, contate o administrador", "error");
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Apagado!", "Os apagada com sucesso.", "success");
             }

          });

        } else {
          swal("Cancelado", "Sua OS não foi apagado.", "error");
        }

      });

   });

    

</script>
<script>
$(document).ready(function() {
    $('#OS').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		 "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    } );
} );</script>