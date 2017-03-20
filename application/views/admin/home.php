<style type="text/css">
	.collection .collection-item.avatar .secondary-content{top:10px;}
	.collection .collection-item.avatar {cursor:pointer;}
</style>
	<?php if($docentes):?>
		<?php foreach ($docentes as $docente): ?>
				<div class="card">
					<div class="card-content" style="heigth:100%;">
					<ul class="collection " style="border:none;margin:0;">
						
						<li class="collection-item avatar"> 
							<a href="<?php echo base_url('admin/docente_info/'.$docente->doc_id);?>">
							<i class="material-icons circle">person</i>
							<span class="title"><?php echo $docente->doc_nome;?></span>
							<p>
								<?php echo $docente->doc_email;?>
							</p>
							<span class="secondary-content badge hide-on-small-only"><?php echo $docente->up;?></span>
							</a>
						</li>	
						
					</ul>
					</div>	
				</div>
		<?php endforeach;?>
	<?php else:
	echo '<h3 style="text-align:center;">Não há cadastros.</h3>';
endif;?>
