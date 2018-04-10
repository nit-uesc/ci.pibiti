<?php  header('Content-Type: text/html; charset=utf-8');?>
<html xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab" rel="stylesheet">

    <link href="<?php echo base_url('');?>layout/public/css/main.css" rel="stylesheet">
    <style type="text/css"></style>
    <title>PIBITI 2018</title>
  </head>
  <body id="templateDocRes">
    <div class="all">
      <a href="#" id="topo"></a>
      <div class="navbar-fixed">
        <nav style="background-color:#039BE5;">
          <div class="nav-wrapper">
            <a href="<?php echo base_url('');?>home/index" class="brand-logo" id="brand-logo">PIBITI<small> UESC</small></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="#">Olá, <?php echo $this->session->userdata('login'); ?></a></li>
            </ul>
          </div>
        </nav>
      </div>
      <?php if (isset($titulo)): ?>
      <header class="headerTitulo" id="headerTitulo">
        <span class="truncate" id="titulo"><?php echo $titulo;?></span>
      </header>
      <?php endif ?>

      <div class="container content-mini-material">
        <div class="row">
          <div class="col s12 m9 l9">
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
  </body>
</html>
