<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../../../../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">

<div class="nav-scroller bg-white box-shadow ">
    <div class="container">
      <nav class="nav nav-underline">
        <a class="nav-link active red-text" href="<?= base_url(); ?>app/home"><i class="fas fa-home navbar-text"></i></a>
        <a class="nav-link active red-text" onclick="history.back()"><i class="fas fa-arrow-left navbar-text"></i></a>
		<a class="nav-link active red-text" data-toggle="modal" data-target="#novo"><i class="far fa-file navbar-text"></i>&nbsp;&nbsp;Novo</a>
		<a class="nav-link active red-text" data-toggle="modal" data-target="#editar"><i class="far fa-edit navbar-text"></i>&nbsp;&nbsp;Editar dados</a>
		<a class="nav-link active red-text" data-toggle="modal" data-target="#imagem"><i class="fas fa-image navbar-text"></i>&nbsp;&nbsp;Adicionar/Editar Imagem</a>

       
      </nav>
      </div>
    </div>
    

    <main role="main" class="container">
		<div class="row">&nbsp;</div>
		 <?php if ($msg == 'novo'): ?>
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
    <ul class="nav nav-pills" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#dados" role="tab" aria-controls="dados" aria-selected="true">Dados do Produto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#mov" role="tab" aria-controls="mov" aria-selected="false">Movimentações</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#code" role="tab" aria-controls="code" aria-selected="false">Código de Barra/QR</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#anexo" role="tab" aria-controls="anexo" aria-selected="false">Anexos</a>
  </li>
</ul>
  	<hr class="my-4">
    
  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="home-tab">
	  
<div class="row">
    <div class="col col-lg-3">
       <?php if ($query[0]->foto == null): ?><img src="<?= base_url(); ?>public/images/image.jpg" class="rounded mx-auto d-block img-fluid" width="250" height="250">
		<?php else: ?><img src="<?= base_url(); ?>public/uploads/<?= $query[0]->foto; ?>" class="rounded mx-auto d-block img-fluid" width="250" height="250">
		<?php endif; ?> 
		<p>&nbsp;</p>
			<center><a class="btn btn-outline-primary" data-toggle="modal" data-target="#imagem"><i class="fas fa-image"></i>&nbsp;&nbsp;Adicionar/Editar Imagem</a></center>
    </div>
    <div class="col">
      <div class="form-group">
    <label for="inputAddress">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $query[0]->descricao; ?>" readonly>
  </div>
  
  <div class="form-row">
   <div class="form-group"><label for="formControlRange">Tipo de Movimento</label></div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" value="1" id="entrada" name="entrada" <?=($query[0]->entrada == 1)?'checked':''?> readonly>
  <label class="custom-control-label" for="entrada">Entrada</label>
</div>
</div>
  <div class="form-group col-md-6">
  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" value="1" id="saida" name="saida" <?=($query[0]->saida == 1)?'checked':''?> readonly>
  <label class="custom-control-label" for="saida">Saida</label>
  </div>
</div>
  </div>
  
 <div class="form-row">
  	<div class="form-group col-md-6">
    <div class="form-group">
  <label for="inputAddress2">Preço de Venda</label>
	 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">R$</span>
  </div>
  <input type="text" class="form-control" value="<?= $query[0]->preco_venda; ?>" id="preco_venda" readonly>
</div>	
	
  </div>
	</div>
 	 <div class="form-group col-md-6">
     <div class="form-group">
    <label for="inputAddress2">Preço de Compra</label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">R$</span>
  </div>
  <input type="text" class="form-control" value="<?= $query[0]->preco_compra; ?>" id="preco_compra" readonly>
</div>
  </div>
	 </div>
 </div>
 
   <div class="form-group">
      <label for="unidade">Unidade</label>
      <select id="unidade" name="unidade" class="form-control" readonly>
        <option value="Kg" <?= $query[0]->unidade=='Kg'?'selected':'' ?>>Kilograma</option>
        <option value="Lt" <?= $query[0]->unidade=='Lt'?'selected':'' ?>>Litro</option>
        <option value="Cx" <?= $query[0]->unidade=='Cx'?'selected':'' ?>>Caixa</option>
        <option value="Un" <?= $query[0]->unidade=='Un'?'selected':'' ?>>Unidade</option>
      </select>
    </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="estoque">Estoque</label>
	<div class="input-group mb-3">
      <input type="text" class="form-control" value="<?= $query[0]->estoque; ?>" id="estoque" name="estoque" readonly>
		<div class="input-group-append">
			<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#addEstoque"><i class="fas fa-plus"></i></button>
		</div>
		</div>
	 </div>
  
    <div class="form-group col-md-6">
      <label for="estoque_minimo">Estoque Mínimo</label>
      <input type="text" class="form-control" value="<?= $query[0]->estoque_minimo; ?>" id="estoque_minimo" name="estoque_minimo" readonly>
    </div>
  </div>
    </div>
</div>
	  
	  
  </div>
  <div class="tab-pane fade" id="mov" role="tabpanel" aria-labelledby="mov-tab">
	        <table class="table" id="mov">
  <thead>
    <tr>
    <th scope="col">Tipo</th>
      <th scope="col">Finalidade</th>
      <th scope="col">Valor</th>
      <th  scope="col">Data</th>
      <th scope="col">Observações</th>
    </tr>
  </thead>
<?php if(!$mov){?>
 <tbody>
                    <tr>
                        <td colspan="5"> <center>
                          <p class="texto_pequeno">Nenhuma ordem de serviço cadastrada</p></center></td>
                    </tr>
                </tbody>
                
 <?php }else{ ?>
 <tbody> <?php foreach($mov as $m) {?>
  

     <tr id="<?= $m->idmovimentacoes; ?>"> 
      
      <td><?= $m->tipo; ?></td>
      <td><?= $m->finalidade; ?></td>
      <td><?= $m->valor; ?></td>
      <td><?= $m->data; ?></td>
      <td><?= $m->observacoes; ?></td>
    </tr> <?php }?>
    <?php }?>
  </tbody>  
</table>  
	  
	  
	  
	  
	</div>
  <div class="tab-pane fade" id="code" role="tabpanel" aria-labelledby="code-tab">
  <div class="row">
    <div class="col">
		
<div class="card text-center">
  <div class="card-body">
	  <div class="card-title" id="qrcode"></div>
    <p class="card-text"><b>Código:</b> <?= $query[0]->codigo; ?></p>
    <a href="<?= base_url(); ?>produtos/imprimir_qrcode/<?= $query[0]->produtosid; ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</a>
  </div>
</div>
		
    </div>
	  <div class="col">
		  
		  <div class="card text-center">
  <div class="card-body">
	  <div class="card-title"> <svg class="barcode"  
                jsbarcode-format="CODE39" 
                jsbarcode-value="<?= $query[0]->codigo; ?>" 
                jsbarcode-textmargin="0" 
                jsbarcode-fontoptions="bold">
        </svg></div>
    <p class="card-text"><b>Código:</b> <?= $query[0]->codigo; ?></p>
    <a href="<?= base_url(); ?>produtos/imprimir_code39/<?= $query[0]->produtosid; ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</a>
  </div>
</div>
     
    </div>
	   <div class="col">
      
    </div>
    <div class="col">
      
    </div>
  </div></div>
  <div class="tab-pane fade" id="anexo" role="tabpanel" aria-labelledby="anexo-tab">...</div>
</div>
    
            
  
        
</main>
<!-- Modal -->
<div class="modal fade" id="imagem" tabindex="-1" role="dialog" aria-labelledby="imagem" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-image"></i>&nbsp;&nbsp;Adicionar/Editar Imagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <form method="post" enctype="multipart/form-data" class="p-t-15" role="form"  action="<?= base_url(); ?>produtos/update_foto" >
      <div class="modal-body">
       
		  <input type="hidden" class="form-control" name="produtosid" value="<?= $query[0]->produtosid; ?>">

        <div class="form-group">	   
			 <div class="custom-file">
			  <input type="file" class="custom-file-input" id="foto" name="foto" size="20">
			  <label class="custom-file-label" for="customFile" >Escolher foto do produto</label>
			 </div>
		</div>
        
      </div>
      <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button></form>
      </div>
    </div>
  </div>
</div>

 <!-- Modal -->
<div class="modal fade" id="novo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    <label for="inputAddress">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao">
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
    <input type="text" class="form-control" id="preco_venda" name="preco_venda">
  </div>
	</div>
 	 <div class="form-group col-md-6">
     <div class="form-group">
    <label for="inputAddress2">Preço de Compra</label>
    <input type="text" class="form-control" id="preco_compra" name="preco_compra">
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
      <input type="number" class="form-control" id="estoque" name="estoque" >
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputZip">Estoque Mínimo</label>
      <input type="number" class="form-control" id="estoque_minimo" name="estoque_minimo">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fas fa-plus"></i> Adicionar </button>
</form>
       
    </div>
  </div>
</div>
</div>
		
<!-- Modal -->
<div class="modal fade" id="addEstoque" tabindex="-1" role="dialog" aria-labelledby="add_estoque" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-plus"></i> Adicionar mais estoque.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="p-t-15" enctype="multipart/form-data" role="form" action="<?= base_url(); ?>produtos/add_estoque">
			<input type="hidden" class="form-control" name="produtosid" value="<?= $query[0]->produtosid; ?>">
		  <div class="row">
			<div class="col">
			<label for="estoque_atual">Estoque Atual</label>
			  <input type="text" class="form-control" name="estoque_atual" value="<?= $query[0]->estoque; ?>" readonly>
			</div>
			<div class="col">
			<label for="estoque_atual">Adicionar mais</label>
			  <input type="number" class="form-control" name="adicionar_mais">
			</div>
		  </div>
		
			<div class="row">&nbsp;</div>
			
			<div class="row"><div class="col text-right"><button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button></div></div>
			
			
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
      </div><form method="post" class="p-t-15" enctype="multipart/form-data" role="form" action="<?= base_url(); ?>produtos/update">
      <div class="modal-body">
          
         <input type="hidden" class="form-control" name="produtosid" value="<?= $query[0]->produtosid; ?>">
 <div class="form-group">
    <label for="inputAddress">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $query[0]->descricao; ?>">
  </div>
  
  <div class="form-row">
   <div class="form-group"><label for="formControlRange">Tipo de Movimento</label></div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" value="1" id="entrada" name="entrada" <?=($query[0]->entrada == 1)?'checked':''?>>
  <label class="custom-control-label" for="entrada">Entrada</label>
</div>
</div>
  <div class="form-group col-md-6">
  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" value="1" id="saida" name="saida" <?=($query[0]->saida == 1)?'checked':''?>>
  <label class="custom-control-label" for="saida">Saida</label>
  </div>
</div>
  </div>
  
 <div class="form-row">
  	<div class="form-group col-md-6">
    <div class="form-group">
  <label for="inputAddress2">Preço de Venda</label>
    <input type="text" class="form-control" value="<?= $query[0]->preco_venda; ?>" id="preco_venda" name="preco_venda">
  </div>
	</div>
 	 <div class="form-group col-md-6">
     <div class="form-group">
    <label for="inputAddress2">Preço de Compra</label>
    <input type="text" class="form-control" value="<?= $query[0]->preco_compra; ?>" id="preco_compra" name="preco_compra">
  </div>
	 </div>
 </div>
 
   <div class="form-group">
      <label for="unidade">Unidade</label>
      <select id="unidade" name="unidade" class="form-control">
        <option value="Kg" <?= $query[0]->unidade=='Kg'?'selected':'' ?>>Kilograma</option>
        <option value="Lt" <?= $query[0]->unidade=='Lt'?'selected':'' ?>>Litro</option>
        <option value="Cx" <?= $query[0]->unidade=='Cx'?'selected':'' ?>>Caixa</option>
        <option value="Un" <?= $query[0]->unidade=='Un'?'selected':'' ?>>Unidade</option>
      </select>
    </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Estoque</label>
      <input type="text" class="form-control" value="<?= $query[0]->estoque; ?>" id="estoque" name="estoque" readonly>
	<small id="emailHelp" class="form-text text-muted">Para adicionar mais estoque utilize o botão adicionar mais estoque na tela do produto.</small>
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputZip">Estoque Mínimo</label>
      <input type="number" class="form-control" value="<?= $query[0]->estoque_minimo; ?>" id="estoque_minimo" name="estoque_minimo">
    </div>
  </div>
 
  
    <div class="modal-footer">
 <button type="submit" class="btn btn-primary btn-lg btn-block"> <i class="fas fa-save"></i>&nbsp; Salvar</button>
      
      </div>
    </div></form>
  </div>
</div>
	

	
	<script type="text/javascript">
new QRCode(document.getElementById("qrcode"), "<?= $query[0]->codigo; ?>");
</script>
<script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
        <script>
            window.onload = function () {
                JsBarcode(".barcode").init();
            }
        </script>

   