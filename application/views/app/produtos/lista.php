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
  <strong><i class="fas fa-user-circle"></i>&nbsp; Novo Produto!</strong> foi adicionado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php elseif ($msg == 'update'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;</strong> Produto atualizado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php elseif ($msg == 'deletar'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;</strong> Produto apagado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
		
<?php elseif ($msg == 'erro'): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;</strong> O arquivo da foto não é suportado.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><?php endif; ?>
    
    
      <div class="my-3 p-3 bg-white rounded box-shadow">
    <h5 class="card-title">Produtos</h5>
    <h6 class="card-subtitle mb-2 text-muted">Lista de produtos cadastrados.
</h6>
        
        
        <table class="table" id='produtos'>
  <thead>
    <tr>
		<th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Estoque</th>
      <th  scope="col">Preço</th>
      <th scope="col"></th>
    </tr>
  </thead>
<?php if(!$query){?>
 <tbody>
                    <tr>
                        <td colspan="5"> <center><p class="texto_pequeno">Nenhum produto cadastrado</p></center></td>
                    </tr>
                </tbody>
                
 <?php }else{ ?>
 <tbody> <?php foreach($query as $prop) {?>
  

     <tr id="<?= $prop->produtosid; ?>">  
	<td>
		 
		 <?php if ($prop->foto == null): ?><img src="<?= base_url(); ?>public/images/image.jpg" class="rounded mx-auto d-block img-fluid" width="64" >
		<?php else: ?><img src="<?= base_url(); ?>public/uploads/<?= $prop->foto; ?>" class="rounded mx-auto d-block img-fluid" width="64">
		<?php endif; ?></td>
      <td><?= $prop->descricao; ?></td>
      <td><?= $prop->estoque; ?></td>
      <td><?= $prop->preco_venda; ?></td>
     

      <td>
<a href="<?= base_url(); ?>produtos/editar/<?= $prop->produtosid; ?>"><button type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></button></a>
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
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-barcode"></i>&nbsp;&nbsp;Cadastro de produtos
</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <form method="post" enctype="multipart/form-data" class="p-t-15" role="form" action="<?= base_url(); ?>produtos/adicionar">
  
	<div class="form-group">	   
<div class="custom-file">
  <input type="file" class="custom-file-input" id="foto" name="foto" size="20">
  <label class="custom-file-label" for="customFile" >Escolher foto do produto</label>
</div></div>
		   
  <div class="form-group">
    <label for="inputAddress">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" required="required">
  </div>
    <div class="form-row">
   <div class="form-group"><label for="formControlRange">Tipo de Movimento</label></div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" value="1" id="entrada" name="entrada" checked>
  <label class="custom-control-label" for="entrada">Entrada</label>
</div>
</div>
  <div class="form-group col-md-6">
  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" value="1" id="saida" name="saida" checked>
  <label class="custom-control-label" for="saida">Saida</label>
  </div>
</div>
  </div>
  
 <div class="form-row">
  	<div class="form-group col-md-6">
    <div class="form-group">
  <label for="inputAddress2">Preço de Venda</label>
    <input type="text" class="form-control" id="preco_venda" name="preco_venda" required="required">
  </div>
	</div>
 	 <div class="form-group col-md-6">
     <div class="form-group">
    <label for="inputAddress2">Preço de Compra</label>
    <input type="text" class="form-control" id="preco_compra" name="preco_compra" required="required">
  </div>
	 </div>
 </div>
 
   <div class="form-group">
      <label for="unidade">Unidade</label>
      <select id="unidade" name="unidade" class="form-control">
        <option selected>Escolha...</option>
        <option value="Kg">Kilograma</option>
        <option value="Lt">Litro</option>
        <option value="Cx">Caixa</option>
        <option value="Un">Unidade</option>
      </select>
    </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Estoque</label>
      <input type="number" class="form-control" id="estoque" name="estoque" required="required">
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputZip">Estoque Mínimo</label>
      <input type="number" class="form-control" id="estoque_minimo" name="estoque_minimo" required="required">
    </div>
  </div>
		   

  <div class="row">&nbsp;</div>
  <div class="row">&nbsp;</div>
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

             url: "<?php echo site_url('produtos/delete/')?>"+id,
             type: 'DELETE',
             error: function() {
                swal("Error", "Ocorreu um erro, contate o administrador", "error");
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Apagado!", "Produto apagado com sucesso.", "success");
             }

          });

        } else {
          swal("Cancelado", "Seu produto não foi apagado.", "error");
        }

      });

   });

    

</script>
	
	
	<script>
$(document).ready(function() {
    $('#produtos').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		 "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    } );
} );</script>