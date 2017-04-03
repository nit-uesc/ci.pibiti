<style> .collection-item{min-height: 0 !important;} </style>
<div class="row">
	<div class="card">
		<div class="card-image">
			<img src="<?php echo base_url('layout/images/designers_copywriters_01.jpg'); ?>">
			<span class="card-title">Projeto</span>
		</div>
		<div id="cardWrapper">
			<span class="__small">Formato dos arquivos : PDF</span>
			<span class="__small">Tamanho máximo dos arquivos : 10MB.</span>
			<?php $this->load->view('/doc/enviar_projeto'); ?>
			<hr>
			<?php $this->load->view('/doc/plano_trabalho2'); ?>
		</div>
	</div>
</div>
