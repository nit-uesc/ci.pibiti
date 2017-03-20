
	<div class="page-header">
		<div class="page-header-content">
			<h1>Planos de Trabalho<small> PIBITI UESC</small></h1>
		</div>
		<hr>
	</div>
	<?php $this->load->view('sidebar_admin'); ?>
	<div class="page-region">
		<div class="page-region-content">
		  <div class="grid" style="text-align: center;">
		
				
				<?php if($docentes->num_rows() > 0):?>
				<table border="0" cellspacing="5" cellpadding="5">
					<thead>
						<tr><th>Nome</th><th>CPF</th><th>RG</th><th>Email</th></tr>
					</thead>
					<tbody>
						<?php foreach ($docentes->result() as $docente): ?>
							<tr>
								<td><a href="<?php echo base_url('admin/docente_info/'.$docente->doc_id);?>"> <?php echo $docente->doc_nome;?></a></td>
								<td><?php echo $docente->doc_cpf;?></td>
								<td><?php echo $docente->doc_rg;?></td>
								<td><?php echo $docente->doc_email;?></td>												
							</tr>		
						<?php endforeach;?>
					</tbody>
				</table>
				<?php else:
						echo '<h3 style="text-align:center;">Não há cadastros.</h3>';
					endif;?>
		  </div>
		</div>
	</div>
