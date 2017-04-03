<div id="planes">
	<h4>Planos de trabalho</h4>
	<div class="">
		<div class="">
			<h5>Plano de trabalho 1</h5>
			<div class="historyContainer">
				<h6>Ultimo lançamento</h6>
				<?php if (isset($planos_1) && $planos_1 !== false) { ?>
					<div class="historyItem">
						<?php $planosArr = $planos_1->result();?>
						<i class="material-icons">&#xE415;</i>
						<a target="_blank" href="<?php echo base_url('./planos/'.$planosArr[0]->plano_arquivo);?>">
							<?php echo $planosArr[0]->plano_titulo; ?>
						</a>
						<hr>
						<p><?php echo $planosArr[0]->orig_name;?></p>
					</div>
				<?php } ?>
			</div>
			<form  method="post" action="<?php echo base_url('doc/plano_trabalho2');?>"   enctype="multipart/form-data">
				<?php
					$pData = $this->session->flashdata('resPlan1');
					if(isset($pData) && $pData!=NULL){
						echo $pData;
					}
				?>

				<div class="">
					<label for="first_name">Título do plano de trabalho 1</label>
					<input placeholder="Plano de trabalho 1" id="titulo" name="titulo" type="text" class="validate">
					<?php echo form_error('titulo');?>
				</div>


				<input name="ordem" type="radio" id="test1"  value="1" checked/>
				<?php echo form_error('ordem');?>

				<div class="myFileInputContainer">
					<label class="btn" for="userPlane1">Arquivo</label>
					<input class="__invisible" type="file" name="userfile" id="userPlane1">
				</div>
				<div class="file-field input-field">
					<div class="file-path-wrapper">
						<?php if(isset($error)) echo $error;?>
						<?php echo form_error('userfile');?>
					</div>
				</div>
				<button type="submit" class="btn proj">Enviar<i class="material-icons right">send</i></button>
			</form>
		</div>
		<div class="">
			<h5>Plano de trabalho 2</h5>
			<div class="historyContainer">
				<h6>Ultimo lançamento</h6>
				<?php if (isset($planos_2) && $planos_2 !== false) { ?>
					<div class="historyItem" id="lastItem">
						<?php $planosArr = $planos_2->result();?>
						<i class="material-icons">&#xE415;</i>
						<a target="_blank" href="<?php echo base_url('./planos/'.$planosArr[0]->plano_arquivo);?>">
							<?php echo $planosArr[0]->plano_titulo; ?>
						</a>
						<hr>
						<p><?php echo $planosArr[0]->orig_name;?></p>
					</div>
					<?php } ?>
				</div>
				<form  method="post" action="<?php echo base_url('doc/plano_trabalho2');?>"   enctype="multipart/form-data">
					<?php
						$pData = $this->session->flashdata('resPlan2');
						if(isset($pData) && $pData!=NULL){
							echo $pData;
						}
					?>

					<div class="">
						<label for="first_name">Título do plano de trabalho 2</label>
						<input placeholder="Plano de trabalho 2" id="titulo" name="titulo" type="text" class="validate">
						<?php echo form_error('titulo');?>
					</div>


					<input name="ordem" type="radio" id="test2"  value="2"checked/>
					<?php echo form_error('ordem');?>

					<div class="myFileInputContainer">
						<label class="btn" for="userPlane2">Arquivo</label>
						<input class="__invisible" type="file" name="userfile" id="userPlane2">
					</div>
					<div class="file-field input-field">
						<div class="file-path-wrapper">
							<?php if(isset($error)) echo $error;?>
							<?php echo form_error('userfile');?>
						</div>
					</div>
					<button type="submit" class="btn proj">Enviar<i class="material-icons right">send</i></button>
				</form>
			</div>
	</div>
</div>
