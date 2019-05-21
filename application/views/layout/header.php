<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $sysname.' - '. $appname ?></title>
<link href="<?= base_url(); ?>public/css/app.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/all.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />

<link href="<?= base_url(); ?>public/css/fontawesome-all.css" rel="stylesheet">
<script type="text/javascript" src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-1.8.2.js"></script>
<script src="https://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
	

 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

</head>


		  
		  
<body class="bg-app">
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
 <div class="container">
    <ul class="nav navbar-nav pull-sm-left">
    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus navbar-text"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item"  href="<?= base_url(); ?>definicoes"><i class="fas fa-cogs"></i> Definições</a></li>

								<li><a class="dropdown-item"  href="<?= base_url(); ?>admins/lista"><i class="fas fa-user-cog"></i> Usuários/Tecnicos</a></li>
                                
                                <li><a class="dropdown-item"  href="<?= base_url(); ?>clientes/lista"><i class="fas fa-users"></i> Clientes</a></li>
                                
                                <li><a class="dropdown-item"  href="<?= base_url(); ?>produtos/lista"><i class="fas fa-store"></i> Produtos</a></li>
                                
                                 <li><a class="dropdown-item"  href="<?= base_url(); ?>servicos/lista"><i class="fas fa-screwdriver"></i> Serviços</a></li>
                                 
                                 <li><a class="dropdown-item"  href="<?= base_url(); ?>os/lista"><i class="fas fa-sticky-note"></i> Ordens de Serviço</a></li>
                                
                              
                            </ul>
                        </li>
    </ul>
    <ul class="nav navbar-nav navbar-logo mx-auto logo-fonte">
      <li class="nav-item">
        <a class="navbar-brand logo" href="#"><i class="fab fa-codepen fa-2x "></i></a>
      </li>
    </ul>
    <ul class="nav navbar-nav pull-sm-right">
       <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#system-info" href="#"><i class="fas fa-info-circle navbar-text"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>auth/sair"><i class="fas fa-sign-out-alt navbar-text"></i> Sair</a>
          </li>

    </ul>
  </div>
</nav>



        
      
    
    <!-- Modal -->
<div class="modal fade" id="system-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-info-circle navbar-text"></i>&nbsp;Sobre o sistema</h5>
      </div>
      <div class="modal-body">
      
      <p> <?php echo  (ENVIRONMENT === 'development') ?  '<strong>Versão do Framework: </strong>' . CI_VERSION . '' : '' ?></p>
      
      <p><strong>Chave do Produto:</strong> <?php echo $this->config->item('key_id'); ?></p>
      
      <p><strong>Versão:</strong> <?php echo $this->config->item('sys_ver'); ?></p>
    
        Criado por Victor Oliveira. Codigo Aberto (link <a href="https://github.com/vitolike/sparkOS">github</a>)
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
</html>