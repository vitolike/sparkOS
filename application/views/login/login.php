
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title><?php echo $sysname ?> - Entrar</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>public/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url(); ?>public/css/app-login.css" rel="stylesheet">
    <link href="<?= base_url(); ?>public/css/all.css" rel="stylesheet">
    
     <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>

  <body>

    <form action="<?= base_url(); ?>auth/logar" method="post" class="form-signin">
      <div class="text-center mb-4"> 
	  
	  
	  
	  <?php if ($msg == 'login_erro'): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;Erro!</strong> Usuário ou senha não encontrado. </br> Não é possível efetuar login neste momento. Entre em contato com o administrador do sistema.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

	
	<?php elseif ($msg == 'desconectado'): ?>	
	<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> Você foi desconectado.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><?php endif; ?>


		<i class="fab fa-codepen fa-9x"></i>
        <p>&nbsp;</p>
		<p>Usuário de demonstração: admin@admin.com e senha: 123456</p>
     <h1 class="h3 mb-3 font-weight-normal">ENTRAR NO <b><?php echo $sysname ?></b> </h1>
        <p>Entre com seus dados de acesso.</p>
      </div>

      <div class="form-label-group input-group-lg">
        <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required autofocus>
        <label for="email">E-mail</label>
      </div>

      <div class="form-label-group input-group-lg">
        <input type="password" id="senha"  name="senha" class="form-control" placeholder="Senha" required>
        <label for="senha">Senha</label>
      </div>

      <button class="btn btn-lg btn-danger btn-block" type="submit"><i class="fas fa-check"></i> Entrar</button>
      <p class="mt-5 mb-3 text-muted text-center"><?php echo $sysname ?> Copyright &copy; <?php echo date('Y');?></p>
    </form>
	
	
	
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>