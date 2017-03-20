<script src='https://www.google.com/recaptcha/api.js'></script>
<form id="form1" method="post" action="<?php echo base_url('login');?>">
	<div class="row">
		<div class="s12 m6 offset-m3 l6 offset-l3 col">
			<?php if(isset($return)){echo $return;}?>

			<div class="input-field col s12">
				<?php echo form_error('username'); ?>
				<input placeholder="username" id="username" name="username" type="text" class="validate"  value="<?php echo set_value('username'); ?>">
				<label for="username">Usuário</label>
			</div>
			<div class="input-field col s12">
				<?php echo form_error('password'); ?>
				<input  placeholder="password"  id="password" name="password" type="password" class="validate" />
				<label for="password">Senha</label>
			</div>

			<?php if (isset ($recaptcha)):?>
				<div class="g-recaptcha" data-sitekey="6Lfb2AUTAAAAAFajVHKxXNMOL1G-ekycH3MfH8x5"></div>

			<?php endif;?>

			<a class="btn-flat left blue-text" href="<?php echo base_url('login/remember'); ?>">Esqueceu a senha?</a>
			<button class="btn-flat green-text lighten-1 right waves-effect waves-light"  type="submit" value="Entrar"><i class="material-icons right">send</i> Entrar</button>
			
		</div>
	</div>
</form>

<style>
	#form1{margin-top: 10%;}
</style>