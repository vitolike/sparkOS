<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SparkOS - Sistema de Ordem de Serviço">
    <meta name="author" content="Victor Oliveira">
    <title><?php echo $sysname ?> - Entrar</title>

    <!-- Bootstrap core CSS & FontAwesome -->
    <link href="<?= base_url(); ?>public/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url(); ?>public/css/all.css" rel="stylesheet">
    <link href="<?= base_url(); ?>public/css/app-login.css" rel="stylesheet">
</head>

<body>
    <!-- Background glows -->
    <div class="bg-glow-1"></div>
    <div class="bg-glow-2"></div>

    <div class="login-container">
        <div class="login-card">
            
            <!-- Logo Icon -->
            <div class="brand-icon">
                <i class="fab fa-codepen"></i>
            </div>

            <h1>ENTRAR NO <b><?php echo $sysname ?></b></h1>
            <p class="subtitle">Entre com seus dados de acesso para gerenciar suas Ordens de Serviço.</p>

            <!-- Alerts -->
            <?php if ($msg == 'login_erro'): ?>
                <div class="alert alert-modern alert-danger-modern alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;Erro!</strong> E-mail ou senha incorretos. Por favor, verifique seus dados.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif ($msg == 'desconectado'): ?>	
                <div class="alert alert-modern alert-success-modern alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> Você foi desconectado com sucesso.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form action="<?= base_url(); ?>auth/logar" method="post">
                

                <!-- Email Input -->
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control-modern" placeholder="E-mail" required autofocus>
                    <i class="fas fa-envelope input-icon"></i>
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <input type="password" id="senha" name="senha" class="form-control-modern" placeholder="Senha" required>
                    <i class="fas fa-lock input-icon"></i>
                </div>

                <!-- Submit Button -->
                <button class="btn-modern" type="submit">
                    Entrar <i class="fas fa-arrow-right"></i>
                </button>
            </form>

            <p class="copyright"><?php echo $sysname ?> &copy; <?php echo date('Y');?></p>
        </div>
    </div>

    <!-- Bootstrap & Popper JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>