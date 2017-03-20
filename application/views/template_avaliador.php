<?php  header('Content-Type: text/html; charset=utf-8');?>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link href="<?php echo base_url('');?>layout/public/css/materialize.min.css" rel="stylesheet">
	<link href="<?php echo base_url('');?>layout/public/css/style.css" rel="stylesheet">

	<script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/materialize.min.js"></script>

	<style type="text/css"></style>

	<title>PIBITI 2016</title>
</head>
<body>
	<div class="all">
		<style>
			body{
				margin:0;
				padding: 0;
				width: 100%;
			}
			.container{min-height: 500px;}
			.nav-wrapper{background-color: #039BE5;}
			.brand-logo{
				left: 5% !important; 
				-webkit-transform: none !important; 
				transform:none !important;
				position: relative;;
			}
			.button-collapse{right:2%;}
			.headerTitulo{background-color: #039BE5;}
			.headerTitulo>span{font-size: 5em; color: white;padding: 0.5em;}
			@media (max-width: 430px){
				.headerTitulo>span{font-size: 3.5em; color: white;padding: 0.5em;}
				{
					display: none;
				}
			}
			blockquote{
				padding: 10px;
				border-left: 5px solid #676767;
				background-color: #eee;
			}
			#sidenav-overlay{z-index: 998;}
			.justify{text-align:justify;text-indent: 7px; }
			.footer-copyright{
				overflow: hidden;
				height: 50px;
				line-height: 50px;
				color: white;
				background-color: #039BE5;
			}
			.j{min-height: 300px;width: 100%; position: fixed;}

		</style>
		<a href="#" id="topo"></a>
		<div class="navbar">
			<nav style="background-color:#039BE5;">
				<div class="nav-wrapper">
					<a href="<?php echo base_url('');?>home/index" class="brand-logo" id="brand-logo">PIBITI<small> UESC</small></a>
					<a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="#">Olá, <?php echo $this->session->userdata('login'); ?></a></li>
						<li><a href="<?php echo base_url('login/logout'); ?>">Sair</a></li>
					</ul>
				</div>
			</nav>
		</div>

    <!-- START Modal desconectado -->
    <div id="desconectado" class="modal">
      <div class="modal-content center">
        <i class="medium material-icons red-text">error_outline</i>
        <h4 class="red-text">Houve algum problema na conexão</h4>
      </div>
      <div class="modal-footer center-align">
        <a href="#!" class="waves-effect blue btn" onClick="window.location.reload()"><i class="material-icons left">history</i>Recarregar página</a>
      </div>
    </div>
    <!-- END Modal desconectado -->

		<div class="container content-mini-material">
			<div class="row">
				<div class="col s12 m12 l12">
					<?php $this->load->view($tela);?> 
				</div>
			</div>
		</div>
</div>
<a id="scrollup" class="btn-floating btn-large waves-effect waves-light teal tooltipped" data-position="left" data-delay="50" data-tooltip="voltar ao topo"><i class="material-icons" style="vertical-align: middle;">keyboard_arrow_up</i></a>
<style>
	#scrollup{
		position: fixed;
		right: 23px;
		bottom: 23px;
		margin-bottom: 0;
		z-index: 998;
		display: none;
	}
</style>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
  $.ajaxSetup({timeout: 2000});
  $(document).ajaxError(
      function(e, xhr, settings){
        alerta_usuario_desconectado();
      }
  );
});
function alerta_usuario_desconectado() {
  $('#desconectado').openModal({
      dismissible: false, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
  });
}
</script>
</body>
</html>


