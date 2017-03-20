<div class="page-header">
	<div class="page-header-content">
		<h1>Anexos<small> PIBITI UESC</small></h1>
	</div>
	<hr>
</div>
	<style type="text/css" media="screen">
		ul.listview li .part {
			border: 1px solid #eee !important;
			padding: 15px !important;
			pointer: hand;
		}
		.metrouicss .listview li div.badge {
			bottom: 0;
			position: absolute;
			top: auto;
			left: 5px;
		}
		.metrouicss .listview li > a:link, a:visited {
			color: black;
		}
	</style>
	<?php $this -> load -> view('sidebar'); ?>
	<div class="page-region">
		<div class="page-region-content">
				<div style="text-align: center;">
				  <a class="button default" href="<?php echo base_url('doc/anexos2'); ?>">Enviar Anexo</a>
				</div>
				<?php 
					if(isset($anexos) and $anexos!=false):
				echo '<ul class="listview">';			
				foreach ( $anexos->result() as $anexo ):
				?>
						<li class="full">
							<a href="<?php echo base_url('./anexos/' . $anexo -> anexo_arquivo); ?>">
							<div class="icon icon-file-pdf"></div>
								<div class="data">
									<h4><?php echo $anexo -> anexo_titulo; ?> </h4>
									<p><?php echo $anexo -> orig_name; ?> </p>
									<p></p>
								</div>
							<div class="badge right bg-color-gray"><strong><?php echo $anexo -> anexo_data; ?></strong></div>
							</a>
						</li>
						<?php

						endforeach;
						echo '</ul>';
						else:
						echo '<h3>Lançamentos</h3>
						<hr><br><h3 style="text-align:center;">Ainda não há anexos cadastrados.</h3>';
						endif;
				?>
		 		</div>
		 	</div>
		</div>

