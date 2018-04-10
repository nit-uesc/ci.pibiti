<?php  header('Content-Type: text/html; charset=utf-8');?>
<html xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="<?php echo base_url('');?>layout/public/css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">
    <style type="text/css"></style>
    <title>PIBITI 2018</title>
  </head>
  <body id="templateDoc">
    <div class="all">
      <a href="#" id="topo"></a>
      <div class="navbar-fixed z-depth-0">
    		<nav class="z-depth-0" id="stickyNav">
    			<div class="nav-wrapper z-depth-0">
    				<a href="<?php echo base_url('');?>home/index" class="brand-logo" id="brand-logo">PIBITI<small> UESC</small></a>
    				<a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
    				<ul class="right hide-on-med-and-down">
              <li class=""><a href="<?php echo base_url('doc/index'); ?>">Home</a></li>
              <li class=""><a href="<?php echo base_url('doc/dados_cadastro'); ?>"></i>Dados de Cadastro</a></li>
              <li><a href="<?php echo base_url('doc/projeto'); ?>">Projeto</a></li>
              <li><a href="<?php echo base_url('login/logout'); ?>">Sair</a></li>
    				</ul>
    			</div>
    		</nav>
    	</div>
      <ul class="side-nav" id="mobile-demo">
        <li class=""><a href="<?php echo base_url('doc/index'); ?>">Home</a></li>
        <li class=""><a href="<?php echo base_url('doc/dados_cadastro'); ?>"></i>Dados de Cadastro</a></li>
        <li><a href="<?php echo base_url('doc/projeto'); ?>">Projeto</a></li>
        <li><a href="<?php echo base_url('login/logout'); ?>">Sair</a></li>
    	</ul>
      <?php if (isset($titulo)): ?>
      <header class="headerTitulo" id="headerTitulo">
        <span class="truncate" id="titulo"><?php echo $titulo;?></span>
      </header>
      <?php endif ?>

      <div class="container content-mini-material">
        <div class="row">
          <div class="col s12 m12 l12">
            <?php $this->load->view($tela);?>
          </div>
        </div>
      </div>

      <div class="footer-copyright">
        <div class="row">
          <div class="col s12 m5 l5 center">
            <a class="grey-text text-lighten-4 left" href="http://nit.uesc.br">NIT-UESC <span class="hide-on-small-only">| Núcleo de Inovação Tecnológica</span></a>
            <a class="grey-text text-lighten-4 right" href=""></a>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/materialize.min.js"></script>
    <script type="text/javascript">
      $(".button-collapse").sideNav({edge: 'right'});
    </script>
  </body>
</html>
