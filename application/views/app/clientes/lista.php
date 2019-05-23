    <div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
         <a class="nav-link active red-text" onclick="history.back()"><i class="fas fa-arrow-left navbar-text"></i></a>
        <a class="nav-link red-text" href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus navbar-text"></i>
          &nbsp; Criar novo cliente
        </a>
       
      </nav>
      </div>
    </div>
    
    

    <main role="main" class="container">
    
    <div class="row">&nbsp;</div>
    
    
<?php if ($msg == 'novo_sucesso'): ?><div class="row">&nbsp;</div>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-user-circle"></i>&nbsp; Novo Cliente!</strong> foi adicionado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php elseif ($msg == 'sucesso_update'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;</strong> Cliente atualizado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php elseif ($msg == 'sucesso_del'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;</strong> Cliente apagado com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><?php endif; ?>
    
    
      <div class="my-3 p-3 bg-white rounded box-shadow">
    <h5 class="card-title">Clientes</h5>
    <h6 class="card-subtitle mb-2 text-muted">Lista de clientes.</h6>
        
        
        <table class="table" id="tabela">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Documento</th>
      <th  scope="col">Telefone</th>
      <th  scope="col">Cidade</th>
      <th  scope="col">Estado</th>
      <th scope="col"></th>
    </tr>
  </thead>
<?php if(!$query){?>
 <tbody>
                    <tr>
                        <td colspan="5"> <center><p class="texto_pequeno">Nenhum Cliente Cadastrado </p></center></td>
                    </tr>
                </tbody>
                
 <?php }else{ ?>
 <tbody> <?php foreach($query as $prop) {?>
  

     <tr id="<?= $prop->clientesid; ?>">  
      <td><?= $prop->nome; ?>&nbsp;<?= $prop->sobrenome; ?></td>
      <td><?= $prop->tipo_documento; ?>&nbsp;<?= $prop->documento; ?></td>
      <td><?= $prop->telefone; ?></td>
      <td><?= $prop->cidade; ?></td>
      <td><?= $prop->uf; ?></td>

      <td>
<a href="<?= base_url(); ?>clientes/editar_cliente/<?= $prop->clientesid; ?>"><button type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></button></a>
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
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-portrait"></i>&nbsp;Cadastro de Cliente
</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>clientes/add_clientes">
  
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="required">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Sobrenome</label>
      <input type="text" class="form-control" id="sobrenome"  name="sobrenome" placeholder="Sobrenome" required="required">
    </div>
  </div>
      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Telefone</label>
      <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
    </div>
  </div><div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCity">CEP</label>
      <input type="text" class="form-control" id="cep" name="cep">
    </div> 
  
  <div class="form-group col-md-6">
    <label for="inputAddress">Endereço</label>
    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="R. Rua, Bairro, 123">
  </div>
   <div class="form-group col-md-3">
    <label for="inputAddress">Numero</label>
    <input type="text" class="form-control" id="numero" name="numero" placeholder="123">
  </div>
  
  </div>
  <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputCity">Bairro</label>
      <input type="text" class="form-control" name="bairro" id="bairro" required="required">
    </div> 
    <div class="form-group col-md-4">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" name="cidade" id="cidade" required="required">
    </div> 
    <div class="form-group col-md-4">
      <label for="inputZip">Estado</label>
      <select type="text" class="form-control" id="uf" name="uf" required="required">
       <option selected>Escolher...</option>
       <option value="AC">Acre</option>
        <option value="AL">Alagoas</option>
        <option value="AP">Amapá</option>
        <option value="AM">Amazonas</option>
        <option value="BA">Bahia</option>
        <option value="CE">Ceará</option>
        <option value="DF">Distrito Federal</option>
        <option value="ES">Espírito Santo</option>
        <option value="GO">Goiás</option>
        <option value="MA">Maranhão</option>
        <option value="MT">Mato Grosso</option>
        <option value="MS">Mato Grosso do Sul</option>
        <option value="MG">Minas Gerais</option>
        <option value="PA">Pará</option>
        <option value="PB">Paraíba</option>
        <option value="PR">Paraná</option>
        <option value="PE">Pernambuco</option>
        <option value="PI">Piauí</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="RN">Rio Grande do Norte</option>
        <option value="RS">Rio Grande do Sul</option>
        <option value="RO">Rondônia</option>
        <option value="RR">Roraima</option>
        <option value="SC">Santa Catarina</option>
        <option value="SP">São Paulo</option>
        <option value="SE">Sergipe</option>
    	<option value="TO">Tocantins</option>
      </select>
    </div>
  </div>
    <div class="form-row">
     <div class="form-group col-md-4">
      <label for="tipo_documento">Documento</label>
      <select id="tipo_documento" name="tipo_documento" class="form-control" required="required">
        <option selected>Escolher...</option>
        <option value="CNPJ" >CNPJ</option>
        <option value="CPF">CPF</option>
        <option value="PASSAPORTE" >PASSAPORTE</option>
      </select>
    </div>
      <div class="form-group col-md-8">
      <label for="documento">Numero do Documento</label>
      <input type="text" class="form-control" id="documento" name="documento" required="required">
    </div>
    
    
    </div>
  


      <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-lg btn-block" >Salvar</button>
      </div></form>
    </div>
  </div>
</div>

<script type="text/javascript">
	$("#cep").focusout(function(){

		$.ajax({

			url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',

			dataType: 'json',

			success: function(resposta){

				$("#endereco").val(resposta.logradouro);
				$("#bairro").val(resposta.bairro);
				$("#cidade").val(resposta.localidade);
				$("#uf").val(resposta.uf);

			}
		});
	});

    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");

    swal({

        title: "Apagar cliente",
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

             url: "<?php echo site_url('clientes/delete/')?>"+id,
             type: 'DELETE',
             error: function() {
                swal("Error", "Ocorreu um erro, contate o administrador", "error");
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Apagado!", "O cliente foi apagado com sucesso.", "success");
             }

          });

        } else {
          swal("Cancelado", "Seu cliente não foi apagado.", "error");
        }

      });

   });

    

</script>
	
	<script>
$(document).ready(function() {
    $('#tabela').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		 "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    } );
} );</script>