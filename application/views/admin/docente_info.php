<div class="card">
	<div class="card-image">
		<img src="<?php echo base_url('layout/images/people.jpg'); ?>">
		<span class="card-title black-text">Dados de Cadastro</span>
	</div>
	<div class="card-content">
		<ul class="collection">
			<li class="collection-item"><p class="truncate"><strong>Nome</strong> <?php echo $docente['0']->doc_nome; ?></p></li>
			<li class="collection-item"><p class="truncate"><strong>Titulação</strong> <?php echo $docente['0']->doc_titulacao; ?></p></li>
			<li class="collection-item"><p class="truncate"><strong>RG</strong> <?php echo $docente['0']->doc_rg; ?></p></li>
			<li class="collection-item"><p class="truncate"><strong>CPF</strong> <?php echo $docente['0']->doc_cpf; ?></p></li>
			<li class="collection-item"><p class="truncate"><strong>Email</strong> <?php echo $docente['0']->doc_email; ?></p></li>
			<li class="collection-item"><p class="truncate"><strong>Telefone</strong> <?php echo $docente['0']->doc_telefone; ?></p></li>
			<li class="collection-item"><p class="truncate"><strong>Departamento</strong> <?php echo $docente['0']->dep_sigla; ?> - <?php echo $docente['0']->dep_nome; ?></p></li>
			<li class="collection-item"><p class="truncate"><strong>Cargo</strong> <?php echo $docente['0']->doc_cargo; ?></p></li>
			<li class="collection-item"><p class="truncate"><strong>Regime</strong> <?php echo $docente['0']->doc_regime; ?></p></li>
			<li class="collection-item"><p class="truncate"><strong>Lattes</strong> <a target="_blank" href="<?php echo prep_url($docente['0']->link_lattes); ?>"><?php echo prep_url($docente['0']->link_lattes); ?></a></p></li>
			<li class="collection-item"><p class="truncate"><strong>Grupo de Pesquisa</strong> <?php echo $docente['0']->doc_grupo_pesq; ?></p></li>
			<li class="collection-item"> <p class="truncate"><strong>Grupo Cnpq</strong> <?php echo $docente['0']->doc_cnpq; ?></p></li>
			<li class="collection-item"> <p class="truncate"><strong>Área Capes (1)</strong> <?php echo $capes1; ?></p></li>
			<li class="collection-item"> <p class="truncate"><strong>Área Capes (2)</strong> <?php echo $capes2; ?></p></li>
		</ul>
		<span class="right"><small>Data da inscrição: <?php echo $docente['0']->up; ?></small></span>
	</div>
</div>

