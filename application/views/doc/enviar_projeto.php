<div class="row">
	
		<div class="card">
			<form  method="post" action="<?php echo base_url('doc/enviar_projeto');?>"  enctype="multipart/form-data">
				<div class="card-image">
					<img src="<?php echo base_url('layout/images/designers_copywriters_01.jpg'); ?>">
					<span class="card-title">Projeto</span>
				</div>
				<div class="card-content">
				
					<?php 
						$data = $this->session->flashdata('data');
						if(isset($data) && $data!=NULL){ echo "<div class=\"card-panel green\">{$data}</div>"; } 
						else {
							echo '	<div class="card-panel red white-text">Será aceita apenas a última versão enviada.</div>';
						} 
					?>
					<br>
					<div class="input-field col s12">
						<input placeholder="escreva aqui" id="titulo" name="titulo" type="text" class="validate">
						<label for="first_name">Título do Projeto</label>
						<?php echo form_error('titulo');?>
					</div>
					<br><br>
					<br><br>
					<div class="file-field input-field">
						<div class="btn">
							<span>Arquivo</span>
							<input type="file" name="userfile">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text"/>
							<?php #if(isset($error)) echo $error;?>
							<?php echo form_error('userfile');?>
						</div>
					</div>
					<span>Formato do arquivo : PDF <br> Tamanho máximo do arquivo : 10MB.</span>
				</div>	
				<br>
				
				<div class="card-action right-align">
					<button type="submit" class="btn-flat">Enviar<i class="material-icons right">send</i></button>
				</div>
				
			</form>
		</div>
	
</div>				
