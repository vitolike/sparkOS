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
    <h5 class="card-title">Dados do produto</h5>
    
    <div class="row">&nbsp;</div>
	
    
    <div class="card">
  		<div class="card-header"></div>
          <div class="card-body">
			  
				<?php if ($query[0]->foto == null): ?><img src="https://www.buritama.sp.leg.br/imagens/parlamentares-2013-2016/sem-foto.jpg/image" class="rounded mx-auto d-block" >
		<?php else: ?><img src="<?= base_url(); ?>public/uploads/<?= $query[0]->foto; ?>" class="img-fluid" width="250" >
		<?php endif; ?>  
			  <div class="row">&nbsp;</div>
            <p class="card-text"><b><strong>Descrição</strong>:</b> <?= $query[0]->descricao; ?>&nbsp; <br />
              <b>Unidade:</b> 
              <?= $query[0]->unidade; ?> - <?php if ($query[0]->unidade == 'Un'): ?>Unidade
              <?php elseif ($query[0]->unidade == 'Lt'): ?>Litro
              <?php elseif ($query[0]->unidade == 'Cx'): ?>Caixa
              <?php elseif ($query[0]->unidade == 'Kg'): ?>Kilograma
              <?php elseif ($query[0]->unidade == 'Oz'): ?>Onça<?php endif; ?>
              <br />
              <b>Preço de Compra:</b> R$<?= $query[0]->preco_compra; ?>
              <br />
              <b>Preço de Venda:</b> 
              R$<?= $query[0]->preco_venda; ?>
              <br />
              <b>Estoque:</b> 
              <?= $query[0]->estoque; ?>
              <br />
              <b>Estoque Mínimo:</b> 
              <?= $query[0]->estoque_minimo; ?>
              <br />
              <b>Data de Cadastro:</b>
              <?= $query[0]->criado; ?>
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
      <input type="number" class="form-control" id="estoque" name="estoque">
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
          <form method="post" class="p-t-15" enctype="multipart/form-data" role="form" action="<?= base_url(); ?>produtos/update">
         <input type="hidden" class="form-control" id="iddefinicoes" name="produtosid" value="<?= $query[0]->produtosid; ?>">
			  
<div class="form-group">	   
 <div class="custom-file">
  <input type="file" class="custom-file-input" id="foto" name="foto" size="20">
  <label class="custom-file-label" for="customFile" >Escolher foto do produto</label>
 </div>
</div>
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
      <input type="number" class="form-control" value="<?= $query[0]->estoque; ?>" id="estoque" name="estoque">
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputZip">Estoque Mínimo</label>
      <input type="number" class="form-control" value="<?= $query[0]->estoque_minimo; ?>" id="estoque_minimo" name="estoque_minimo">
    </div>
  </div>
 
  
    <div class="modal-footer">
 <button type="submit" class="btn btn-primary btn-lg btn-block"> <i class="fas fa-save"></i>&nbsp; Salvar</button>
      </form>
      </div>
    </div>
  </div>
</div>
   

   