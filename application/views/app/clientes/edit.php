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
    <h5 class="card-title">Dados do cliente</h5>
    <h6 class="card-subtitle mb-2 text-muted">Dados de contato, documentos e etc.</h6>
    
    <div class="row">&nbsp;</div>
    
    <div class="card">
  		<div class="card-header"> <b>Dados pessoais</b>
          </div>
          <div class="card-body">
            <p class="card-text"><b>Nome completo:</b> <?= $query[0]->nome; ?>&nbsp;<?= $query[0]->sobrenome; ?> </p>
            <p class="card-text"><b>Documento:</b> <?= $query[0]->tipo_documento; ?>:&nbsp;<?= $query[0]->documento; ?> </p>
            <p class="card-text"><b>Data de Cadastro:</b> <?= $query[0]->criado; ?></p>
          </div>
     </div>
     <div class="row">&nbsp;</div>
     <div class="card">
          <div class="card-header">
            <b>Contato</b>
          </div>
          <div class="card-body">
            <p class="card-text"><b>Telefone:</b> <?= $query[0]->telefone; ?></p>
            <p class="card-text"><b>E-mail:</b> <?= $query[0]->email; ?> </p>
            <p class="card-text"><b>Endereço:</b> <?= $query[0]->endereco; ?>&nbsp; <?= $query[0]->numero; ?></p>
            <p class="card-text"><b>Bairro:</b> <?= $query[0]->bairro; ?></p>
            <p class="card-text"><b>Cidade:</b> <?= $query[0]->cidade; ?> - <?= $query[0]->uf; ?></p>
          </div>
	</div>
    <div class="row">&nbsp;</div>
    
            <div class="btn-group btn-group btn-block" role="group" aria-label="...">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar"><i class="fas fa-user-edit"></i> Editar dados
</button>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#novo"><i class="fas fa-user-plus"></i> Criar novo cliente
</button> </div>
        
       
   </div> </main>



<!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-user-edit"></i> Editar dados do cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>clientes/upd_cliente">
         <input type="hidden" class="form-control" id="iddefinicoes" name="clientesid" value="<?= $query[0]->clientesid; ?>">

 
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" value="<?= $query[0]->nome; ?>" required="required">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Sobrenome</label>
      <input type="text" class="form-control" value="<?= $query[0]->sobrenome; ?>" id="sobrenome"  name="sobrenome" required="required">
    </div>
  </div>
      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" value="<?= $query[0]->email; ?>" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Telefone</label>
      <input type="text" class="form-control" value="<?= $query[0]->telefone; ?>" id="telefone" name="telefone" placeholder="Telefone">
    </div>
  </div><div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCity">CEP</label>
      <input type="text" class="form-control" value="<?= $query[0]->cep; ?>" id="cep" name="cep">
    </div> 
  
  <div class="form-group col-md-6">
    <label for="endereco">Endereço</label>
    <input type="text" class="form-control"  value="<?= $query[0]->endereco; ?>"  id="endereco" name="endereco" placeholder="R. Rua, Bairro, 123">
  </div>
  
    <div class="form-group col-md-3">
    <label for="endereco">Numero</label>
    <input type="text" class="form-control"  value="<?= $query[0]->numero; ?>"  id="numero" name="numero" >
  </div>
  
  
  </div>
  <div class="form-row">
   <div class="form-group col-md-4">
      <label for="cidade">Bairro</label>
      <input type="text" class="form-control" value="<?= $query[0]->bairro; ?>"  id="bairro" name="bairro" required="required">
    </div> 
    <div class="form-group col-md-4">
      <label for="cidade">Cidade</label>
      <input type="text" class="form-control" value="<?= $query[0]->cidade; ?>"  id="cidade" name="cidade" required="required">
    </div> 
    <div class="form-group col-md-4">
      <label for="uf">Estado</label>
      <select type="text" class="form-control" id="uf" name="uf" required="required">
       <option value="AC" <?= $query[0]->uf=='AC'?'selected':'' ?>>Acre</option>
        <option value="AL" <?= $query[0]->uf=='AL'?'selected':'' ?>>Alagoas</option>
        <option value="AP" <?= $query[0]->uf=='AP'?'selected':'' ?>>Amapá</option>
        <option value="AM" <?= $query[0]->uf=='AM'?'selected':'' ?>>Amazonas</option>
        <option value="BA" <?= $query[0]->uf=='BA'?'selected':'' ?>>Bahia</option>
        <option value="CE" <?= $query[0]->uf=='CE'?'selected':'' ?>>Ceará</option>
        <option value="DF" <?= $query[0]->uf=='DF'?'selected':'' ?>>Distrito Federal</option>
        <option value="ES" <?= $query[0]->uf=='ES'?'selected':'' ?>>Espírito Santo</option>
        <option value="GO" <?= $query[0]->uf=='GO'?'selected':'' ?>>Goiás</option>
        <option value="MA" <?= $query[0]->uf=='MA'?'selected':'' ?>>Maranhão</option>
        <option value="MT" <?= $query[0]->uf=='MT'?'selected':'' ?>>Mato Grosso</option>
        <option value="MS" <?= $query[0]->uf=='MS'?'selected':'' ?>>Mato Grosso do Sul</option>
        <option value="MG" <?= $query[0]->uf=='MG'?'selected':'' ?>>Minas Gerais</option>
        <option value="PA" <?= $query[0]->uf=='PA'?'selected':'' ?>>Pará</option>
        <option value="PB" <?= $query[0]->uf=='PB'?'selected':'' ?>>Paraíba</option>
        <option value="PR" <?= $query[0]->uf=='PR'?'selected':'' ?>>Paraná</option>
        <option value="PE" <?= $query[0]->uf=='PE'?'selected':'' ?>>Pernambuco</option>
        <option value="PI" <?= $query[0]->uf=='PI'?'selected':'' ?>>Piauí</option>
        <option value="RJ" <?= $query[0]->uf=='RJ'?'selected':'' ?>>Rio de Janeiro</option>
        <option value="RN" <?= $query[0]->uf=='RN'?'selected':'' ?>>Rio Grande do Norte</option>
        <option value="RS" <?= $query[0]->uf=='RS'?'selected':'' ?>>Rio Grande do Sul</option>
        <option value="RO" <?= $query[0]->uf=='RO'?'selected':'' ?>>Rondônia</option>
        <option value="RR" <?= $query[0]->uf=='RR'?'selected':'' ?>>Roraima</option>
        <option value="SC" <?= $query[0]->uf=='SC'?'selected':'' ?>>Santa Catarina</option>
        <option value="SP" <?= $query[0]->uf=='SP'?'selected':'' ?>>São Paulo</option>
        <option value="SE" <?= $query[0]->uf=='SE'?'selected':'' ?>>Sergipe</option>
    	<option value="TO" <?= $query[0]->uf=='TO'?'selected':'' ?>>Tocantins</option>
      </select>
    </div>
  </div>
    <div class="form-row">
     <div class="form-group col-md-4">
      <label for="tipo_documento">Documento</label>
      <select id="tipo_documento" name="tipo_documento" class="form-control" required="required">
        <option value="CNPJ"  <?= $query[0]->tipo_documento=='CNPJ'?'selected':'' ?> >CNPJ</option>
        <option value="CPF" <?= $query[0]->tipo_documento=='CPF'?'selected':'' ?>>CPF</option>
        <option value="PASSAPORTE" <?= $query[0]->tipo_documento=='PASSAPORTE'?'selected':'' ?>>PASSAPORTE</option>
      </select>
    </div>
      <div class="form-group col-md-8">
      <label for="documento">Numero do Documento</label>
      <input type="text" class="form-control" id="documento"  value="<?= $query[0]->documento; ?>"  name="documento" required="required">
    </div>
</div>
    <div class="modal-footer">
 <button type="submit" class="btn btn-primary btn-lg btn-block"> <i class="fas fa-save"></i>&nbsp; Salvar</button>
      </form>
      </div>
    </div>
  </div>
</div></div>
    <!-- Modal -->
<div class="modal fade" id="novo" tabindex="-1" role="dialog" aria-labelledby="novo" aria-hidden="true">
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
		//Início do Comando AJAX
		$.ajax({
			//O campo URL diz o caminho de onde virá os dados
			//É importante concatenar o valor digitado no CEP
			url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
			//Aqui você deve preencher o tipo de dados que será lido,
			//no caso, estamos lendo JSON.
			dataType: 'json',
			//SUCESS é referente a função que será executada caso
			//ele consiga ler a fonte de dados com sucesso.
			//O parâmetro dentro da função se refere ao nome da variável
			//que você vai dar para ler esse objeto.
			success: function(resposta){
				//Agora basta definir os valores que você deseja preencher
				//automaticamente nos campos acima.
				$("#logradouro").val(resposta.logradouro);
				$("#complemento").val(resposta.complemento);
				$("#bairro").val(resposta.bairro);
				$("#cidade").val(resposta.localidade);
				$("#uf").val(resposta.uf);
				//Vamos incluir para que o Número seja focado automaticamente
				//melhorando a experiência do usuário
				$("#numero").focus();
			}
		});
	});
</script>