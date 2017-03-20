<div class="page">
        <div class="page-header">
            <div class="page-header-content">
				<h1>Email<small> PIBITI UESC</small></h1>
            </div>
			<hr>
        </div>
 
        <div class="page-region">
            <div class="page-region-content">
              <div class="grid">
				
				<!--<div class="span12">
					<div class="notices">
						<div class="bg-color-red">
							<div class="notice-image"><img src="../layout/images/armor.png"></div>
							<div class="notice-icon"><img src="../layout/images/shield-user.png"></div>
							<div class="notice-header"> <h1 style="color:white;">Em Manuten��o</h1></div>
							<div class="notice-text"> <p style="color:white;">Acesso a plataforma fechado para manuten��o.</p></div>
						</div>
					</div>
				</div>-->
				
				<div class="span12">
					<br>
					<?php if(isset($resposta))echo $resposta;?>
					<form id="form1" method="post" action="">
					<div class="offset3">
						<div class="span6">
							<h2>Asunto</h2>
							<div class="input-control text">
								<input type="text" name="asunto">
								<button class="btn-clear" tabindex="-1" type="button"></button>
							</div><?php echo form_error('asunto');?>
							<h2>Destinatario</h2>
							<div class="input-control password">
								<input type="text" name="email">
								<button class="btn-reveal" tabindex="-1" type="button"></button>
							</div><?php echo form_error('email');?>
							<h2>Mensagem</h2>
							<div class="input-control text">
								<textarea name="mensagem" rows="8" cols="40"></textarea>
							</div>
							<div class="row">
								<input type="submit" class="bg-color-blue" value="Enviar" style="float:right; margin-right:0;">
							</div><?php echo form_error('mensagem');?>
						</div>
					</div>
					</form>
					
				</div>
			  </div>
            </div>
        </div>
    </div>