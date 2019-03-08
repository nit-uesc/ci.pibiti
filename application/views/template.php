<html xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url('');?>layout/public/css/main.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/jquery-2.2.0.min.js"></script>
	<style type="text/css"></style>

	<title>PIBITI 2019</title>
</head>
<body id="generalTemplate"style="background-color: #FCFDFF;">
	<div class="all">
	<style>
		body{
			width: 100%;
			background-color: #FCFCFC;
			margin-bottom: 50px;

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
		.footer-copyright{    overflow: hidden;
		    width: 100%;
		    height: 50px;
		    line-height: 50px;
		    color: white;
		    background-color: #039BE5;
		    position: absolute;
		    bottom: 0;
		}
	</style>
	<a href="#" id="topo"></a>
	<div class="navbar-fixed z-depth-0">
		<nav class="z-depth-0" id="stickyNav">
			<div class="nav-wrapper z-depth-0">
				<a href="<?php echo base_url('');?>home/index" class="brand-logo" id="brand-logo">PIBITI<small> UESC</small></a>
				<a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="<?php echo base_url('');?>home/index">Home</a></li>
					<li><a href="<?php echo base_url('');?>home/cadastro">Cadastro</a></li>
					<!-- <li><a href="<?php echo base_url('');?>home/cronograma">Cronograma</a></li> -->
					<li><a href="<?php echo base_url('');?>home/edital">Edital</a></li>
					<li><a href="<?php echo base_url('');?>home/resultados2019">Resultados</a></li>
					<!-- <li><a href="<?php echo base_url('');?>home/relatorios">Relatórios</a></li> -->
					<li><a href="<?php echo base_url('');?>login">Login</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<ul class="side-nav" id="mobile-demo">
		<li><a href="<?php echo base_url('');?>home/index">Home</a></li>
		<li><a href="<?php echo base_url('');?>home/cadastro">Cadastro</a></li>
		<!-- <li><a href="<?php echo base_url('');?>home/cronograma">Cronograma</a></li> -->
		<li><a href="<?php echo base_url('');?>home/edital">Edital</a></li>
		<li><a href="<?php echo base_url('');?>home/resultados2019">Resultados</a></li>
		<!-- <li><a href="<?php echo base_url('');?>home/relatorios">Relatórios</a></li> -->
		<li><a href="<?php echo base_url('');?>login">Login</a></li>
	</ul>
	<?php if (isset($titulo)): ?>
		<header class="headerTitulo" id="headerTitulo">
			<span class="truncate" id="titulo"><?php echo $titulo;?></span>
		</header>
	<?php endif ?>

	<div class="container">
		<?php $this->load->view($tela);?>
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
	<script type="text/javascript" src="<?php echo base_url('');?>layout/public/js/materialize.min.js"></script>
	<script>
		$(".button-collapse").sideNav({edge: 'right'});

		var brandlogo = document.querySelector("#brand-logo");
		var headerTitulo = document.querySelector("#headerTitulo");
		var titulo = document.querySelector("#titulo");
		window.onload = function() {
		  var tp = document.querySelector("#headerTitulo");
		  var tamanhoScroll = document.body.scrollHeight;
		  window.addEventListener("scroll", function() {
		    var scrollAtual = document.body.scrollTop;
		   	if (scrollAtual>70) {
		   		brandlogo.innerHTML = titulo.innerHTML;
		   		// $('#headerTitulo').fadeOut();
		   	}
		   	else{
		   		brandlogo.innerHTML='PIBITI<small> UESC</small>';
		   		// $('#headerTitulo').fadeIn();
		   	};
		   	var porcentagemScroll = scrollAtual / tamanhoScroll;

		   	if ($(this).scrollTop() > 70) {
	            $('#scrollup').fadeIn();
	        } else {
	            $('#scrollup').fadeOut();
	        }
		  });

	    $('#scrollup').click(function () {
	        $("html, body").animate({
	            scrollTop: 0
	        }, 600);
	        return false;
	    	});
		}

	</script>
</body>
</html>
