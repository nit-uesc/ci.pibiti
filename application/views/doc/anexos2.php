<div class="page-header">
	<div class="page-header-content">
		<h1>Anexos<small> PIBITI UESC</small></h1>
	</div>
	<hr>
</div>
<?php $this -> load -> view('sidebar'); ?>
<div class="page-region">
	<div class="page-region-content">
		<div class="grid" style="text-align: center;">

			<h1 class="icon-upload"></h1>
			<h1>Upload</h1>
			<p style="text-align: center;">
				Serão aceitos arquivos em PDF de no máximo 10MB.
			</p>
			<br>
			<br>
			<?php
				if (isset($data))
					echo "<pre>{$data}</pre>";
			?>
			<form  method="post" action="<?php echo base_url('doc/anexos2'); ?>"  enctype="multipart/form-data">

				<h3 >Descrição do anexo </h3>
				<div class="offset1 input-control text" style="width:80%;">
					<input type="text" name="titulo"/>
					<?php echo form_error('titulo'); ?>
				</div>
				<br>

				<h3>Arquivo</h3>
				<div class="input-control text">
					<input class="offset2 span6" type="file" name="userfile"/>
				</div>
				<?php
					if (isset($error))
						echo $error;
				?>
				<?php echo form_error('userfile'); ?>
				<br>

				<hr>
				<input type="submit" value="Enviar" />

			</form>

		</div>
	</div>
</div>
