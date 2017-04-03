<?php // header('Content-Type: text/html; charset=utf-8');?>
<html xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="<?php echo base_url('');?>layout/public/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>layout/public/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>layout/public/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab" rel="stylesheet">
    <style type="text/css"></style>

    <title>PIBITI 2017</title>
  </head>
  <body id="templateAdmin">
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

      <div class="container content-mini-material">
        <div class="row">
          <div class="col s12 m9 l9">
            <?php $this->load->view($tela);?>
          </div>
          <?php $this->load->view('sidebar_admin'); ?>
        </div>
      </div>

    </div>

  </body>
  <!--jQuery-->
  <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/jquery-2.2.0.min.js"></script>
  <!--Materialize-->
  <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/materialize.min.js"></script>

  <!--jQuery plugins-->
  <!--Sticky-->
  <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/jquery.sticky.js"></script>
  <!--Data table-->
  <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/vfs_fonts.js"></script>
  <script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/pdfmake.min.js"></script>

  <script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("#sidebar").sticky({topSpacing:60});
    var url = window.location.href;
    var link = $('a[href$="' + url + '"]');
    link.addClass('active');
  });
  </script>
</html>
