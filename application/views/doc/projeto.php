<style>
	.collection-item{min-height: 0 !important;}
</style>
<div class="row">
	
		<div class="card">
			<div class="card-image">
				<img src="<?php echo base_url('layout/images/designers_copywriters_01.jpg'); ?>">
				<span class="card-title">Projeto</span>
			</div>
			<div class="card-content">
				<?php
				$data = $this->session->flashdata('data');
				if($data!=NULL){ echo "<div class=\"card-panel blue\">{$data}</div>"; }?>
				<div class="row">
						<a class="btn-flat blue white-text right" href="<?php echo base_url('doc/enviar_projeto');?>"><i class="material-icons right">add</i>Enviar Projeto</a>
				</div>
				<div class="row">
				<?php 
					if(isset($projetos) and $projetos!=false):
				    $isFirst = true;
				    
							
				    foreach ( $projetos->result() as $projeto ):

				    if($isFirst == true)
				    {
				    	?>
			

				    	<ul class="collection with-header">	
				    		<li class="collection-header">Último Lançamento</li>	
							<li class="collection-item avatar">
								<i class="material-icons circle">insert_drive_file</i>
								<a href="<?php echo base_url('./uploads/'.$projeto->proj_arquivo);?>">
									<?php echo $projeto->proj_titulo;?>
									</br> 
									<?php echo $projeto->orig_name;?> 
									<a href="#!" class="secondary-content">
										<span class="right grey-text"><small><?php echo $projeto->proj_data;?></small></span>
									</a>
								</a>
							</li>
						</ul>

					
				    	<ul class="collection with-header">
						<li class="collection-header">Histórico</li>
						<?php
						$isFirst = false;
						
				    }
				    else
				    {
				    	?>
							<li class="collection-item avatar">
								<i class="material-icons circle">insert_drive_file</i>
								<a href="<?php echo base_url('./uploads/'.$projeto->proj_arquivo);?>">
									<?php echo $projeto->proj_titulo;?>
									</br> 
									<?php echo $projeto->orig_name;?> 
									<a href="#!" class="secondary-content">
										<span class="right grey-text"><small><?php echo $projeto->proj_data;?></small></span>
									</a>
								</a>
							</li>
						<?php }
						endforeach;
					echo '</ul>';
				else:
						echo '
						<ul class="collection with-header">
						<li class="collection-header"><h3>Histórico</h3></li>
				    	<li><h5 class="center-align grey-text"><small>Ainda não há projetos de trabalho cadastrados.</small></h5></li>
				    	</ul>';
				endif;
				?>
				</div>
				</div>
			</div>
		
	</div>
	   
	
