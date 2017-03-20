<form id="form1" method="post" action="<?php echo base_url('login/remember') ?>">
	<div class="row">
		<div class="s12 m6 offset-m3 l6 offset-l3 col">
				<?php if (isset($retorno)): ?>
					<div class="row">
						<div class="col s12">
							<div class="card-panel red white-text">
								<?php echo $retorno;?>
							</div>
						</div>
					</div>
				<?php endif ?>
				<?php if (isset($ok)): ?>
					<div class="row">
						<div class="col s12">
							<div class="card-panel green white-text">
								<?php echo $ok;?>
							</div>
						</div>
					</div>
				<?php endif ?>
				<div class="input-field col s12">
					<input placeholder="email@email.com" id="email" name="email" type="text" class="validate">
					<label for="username">Email</label>
				</div>			
				<button type="submit" class="btn-flat green-text right" value="Enviar"><i class="material-icons right">send</i>Enviar</button>
		</div>
	</div>
</form>

<style>
	#form1{margin-top: 10%;}
</style>