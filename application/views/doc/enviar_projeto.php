<div id="projects">
	<h4>Projeto</h4>
	<div class="historyContainer">
		<?php if (isset($projetos) && $projetos !== false) { ?>
		<div class="historyItem" id="lastItem">
			<h5>Ultimo lançamento</h5>
			<?php $projetosArr = $projetos->result();?>
			<i class="material-icons">&#xE415;</i>
			<a target="_blank" href="<?php echo base_url('./uploads/'.$projetosArr[0]->proj_arquivo);?>">
				<?php echo $projetosArr[0]->proj_titulo; ?>
			</a>
			<hr>
			<p><?php echo $projetosArr[0]->orig_name;?></p>
		</div>
		<?php } ?>
	</div>
	<form  method="post" action="<?php echo base_url('doc/enviar_projeto');?>"  enctype="multipart/form-data">
		<?php
			$pData = $this->session->flashdata('resProj');
			if(isset($pData) && $pData!=NULL){
				echo $pData;
			}
		?>
		<div class="">
			<label for="first_name">Título do Projeto</label>
			<input placeholder="Projeto" id="titulo" name="titulo" type="text" class="validate">
		</div>

		<div class="myFileInputContainer">
			<label class="btn" for="userWork1">Arquivo</label>
			<input class="__invisible" type="file" name="userfile" id="userWork1">
		</div>
		<div class="file-field input-field">
			<div class="file-path-wrapper">
				<!-- <input class="file-path validate" type="text"/> -->
				<?php #if(isset($error)) echo $error;?>
			</div>
		</div>
		<button type="submit" class="btn proj">Enviar<i class="material-icons right">send</i></button>
	</form>
</div>
