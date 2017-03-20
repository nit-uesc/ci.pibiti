<div class="row">
	
		<div class="card">
	<form  method="post" action="<?php echo base_url('doc/plano_trabalho2');?>"   enctype="multipart/form-data">
				<div class="card-image">
					<img src="<?php echo base_url('layout/images/designers_copywriters_01.jpg'); ?>">
					<span class="card-title">Plano de trabalho</span>
				</div>
				<div class="card-content">
				
					<?php 
						$data = $this->session->flashdata('data');
						if(isset($data) && $data!=NULL){ echo "<div class=\"card-panel green\">{$data}</div>"; } 
						else {
							echo '	<div class="card-panel red white-text">Será aceita apenas a última versão enviada de cada plano de trabalho.</div>';
						}
					?>
					<br>
					<div class="input-field col s12">
						<input placeholder="escreva aqui" id="titulo" name="titulo" type="text" class="validate">
						<label for="first_name">Título do Projeto</label>
						<?php echo form_error('titulo');?>
					</div>
					<br><br>
	

	 <p>
      <input name="ordem" type="radio" id="test1"  value="1"/>
      <label for="test1">Plano 1</label>
    </p>
       <p>
      <input name="ordem" type="radio" id="test2"  value="2"/>
      <label for="test2">Plano 2</label>
    </p>
				     <?php echo form_error('ordem');?>

					<br>
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
