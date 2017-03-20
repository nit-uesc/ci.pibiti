<br>
<br>
<style>
	.label-form{color:#5a5a5a;font-weight: bold;}
</style>

<form id="cadastro" name="cadastro" action="<?php echo base_url('home/cadastro'); ?>" method="POST" validate>
	<div class="row">
		
		<?php if(isset($resposta))echo $resposta;?>		

		<div class="col s12">
			<h4>Dados do Orientador</h4>
			<span class="label-form">Nome Completo</span>
			<div class="input-control text">
				<input id="doc_nome" name="doc_nome" type="text" value="<?php echo set_value('doc_nome');?>" autofocus/>
				<?php echo form_error('doc_nome');?>
			</div><br>


			<div class="row">
				<div class="s12 m4 l4 col">
					<span class="label-form">CPF</span>
					<div class="input-control text">
						<input  class="with-helper" id="doc_cpf" name="doc_cpf" type="text" value="<?php echo set_value('doc_cpf');?>"/>
						<?php echo form_error('doc_cpf');?>
					</div>

				</div>

				<div class="s12 m4 l4 col">
					<span class="label-form">RG</span>
					<div class="input-control text">
						<input  class="with-helper" id="doc_rg" name="doc_rg" type="text" value="<?php echo set_value('doc_rg');?>"/>
						<?php echo form_error('doc_rg');?>
					</div>
				</div>
				<div class="s12 m4 l4 col">
					<span class="label-form">Telefone</span>
					<div class="input-control text">
						<input  class="with-helper" id="doc_telefone" name="doc_telefone" type="text" value="<?php echo set_value('doc_telefone');?>"/>
						<?php echo form_error('doc_telefone');?>
					</div>
				</div>
			</div>
			
			<span class="label-form">Email</span>
			<div class="input-control text">
				<input class="with-helper" id="doc_email" name="doc_email" type="email" value="<?php echo set_value('doc_email');?>"/>
				<?php echo form_error('doc_email');?>
			</div><br>
			
			<span class="label-form">Confirmar email</span>
			<div class="input-control text">
				<input class="with-helper" id="doc_confirmar_email" name="doc_confirmar_email" type="email" value="<?php echo set_value('doc_confirmar_email');?>"/>
				<?php echo form_error('doc_confirmar_email');?>
			</div><br>


			<div class="input-field">
				<span class="label-form">Departamento</span>
				<select id="fk_dep_id" name="fk_dep_id">
					<option value="" <?php echo set_select('fk_dep_id', '', TRUE); ?>>Selecione um departamento</option>
					<option value="3" <?php echo set_select('fk_dep_id', '3'); ?>>DCAA - Departamento de Ciências Agrárias e Ambientais</option>
					<option value="4" <?php echo set_select('fk_dep_id', '4'); ?>>DCAC - Departamento de Administração e Ciências Contábeis</option>
					<option value="5" <?php echo set_select('fk_dep_id', '5'); ?>>DCB - Departamento de Ciências Biológicas</option>
					<option value="6" <?php echo set_select('fk_dep_id', '6'); ?>>DCEC - Departamento de Ciências Econômicas</option>
					<option value="7" <?php echo set_select('fk_dep_id', '7'); ?>>DCET - Departamento de Ciências Exatas e Tecnológicas</option>
					<option value="8" <?php echo set_select('fk_dep_id', '8'); ?>>DCIE - Departamento de Ciências da Educação</option>
					<option value="9" <?php echo set_select('fk_dep_id', '9'); ?>>DCS - Departamento de Ciências da Saúde</option>
					<option value="10" <?php echo set_select('fk_dep_id', '10'); ?>>DCIJUR - Departamento de Ciências Jurídicas</option>
					<option value="11" <?php echo set_select('fk_dep_id', '11'); ?>>DFCH - Departamento de Filosofia e Ciências Humanas</option>
					<option value="12" <?php echo set_select('fk_dep_id', '12'); ?>>DLA - Departamento de Letras e Artes</option>	
				</select><?php echo form_error('fk_dep_id');?>
			</div>
			<br>
			<span class="label-form">Cargo/Função </span><span>(Se bolsista, indicar modalidade do programa e vigência)</span>
			<div class="input-control text">	
				<input class="with-helper" id="doc_cargo" name="doc_cargo" type="text" value="<?php echo set_value('doc_cargo');?>"/>	
				<?php echo form_error('doc_cargo');?>
			</div>
			<br>
			<span class="label-form">Currículo Lattes</span>
			<div class="input-control text">	
				<input placeholder="http://" class="with-helper" id="link_lattes" name="link_lattes" type="text" value="<?php echo set_value('link_lattes');?>"/>	
				<?php echo form_error('link_lattes');?>
			</div>
			<br>
			<br>
			<div class="row">

				<div class="input-control text s12 m6 l6 col">
					<span class="label-form">Regime de trabalho</span>
					<?php echo form_error('doc_regime');?>

					<p>
						<input name="doc_regime" type="radio" id="test3" value="40h"  <?php echo set_radio('doc_regime', '40h'); ?> />
						<label for="test3">40hrs</label>
					</p>
					<p>
						<input name="doc_regime" type="radio" id="test4" value="DE"  <?php echo set_radio('doc_regime', 'DE'); ?> />
						<label for="test4">Dedicação Exclusiva</label>
					</p>
				</div>



				<div class="input-control text  s12 m6 l6 col">
					<span class="label-form">Titulação</span>
					<?php echo form_error('doc_titulacao');?>

					<p>
						<input name="doc_titulacao" type="radio" id="test1" value="Doutorado"  <?php echo set_radio('doc_titulacao', 'Doutorado'); ?> />
						<label for="test1">Doutorado</label>
					</p>
					<p>
						<input name="doc_titulacao" type="radio" id="test2" value="Mestrado" <?php echo set_radio('doc_titulacao', 'Mestrado'); ?>/>
						<label for="test2">Mestrado</label>
					</p>
				</div>


				

			</div>
			<br>
			<br>

			<span class="label-form">Grupo de pesquisa cadastrado no Diretório do CNPq</span>
			<div class="input-control text">							
				<input id="doc_grupo_pesq" name="doc_grupo_pesq" type="text" value="<?php echo set_value('doc_grupo_pesq');?>"/>
				<?php echo form_error('doc_grupo_pesq');?>
			</div>

			<br>
			<span class="label-form">Grande Área de conhecimento</span><?php echo form_error('fk_garea_id');?>
			<div class="input-control text">
				<p>		
					<input name="fk_garea_id" type="radio" id="test5" value="1" <?php echo set_radio('fk_garea_id', '1'); ?>/>
					<label for="test5">Ci&ecirc;ncias da Vida (Ci&ecirc;ncias Biol&oacute;gicas, Ci&ecirc;ncias da Sa&uacute;de e Ci&ecirc;ncias Agr&aacute;rias)</label>
				</p>

				<p>		
					<input name="fk_garea_id" type="radio" id="test6" value="2" <?php echo set_radio('fk_garea_id', '2'); ?>/>
					<label for="test6">Ci&ecirc;ncias Exatas, da Terra e Engenharia</label>
				</p>


				<p>		
					<input name="fk_garea_id" type="radio" id="test7" value="3" <?php echo set_radio('fk_garea_id', '3'); ?>/>
					<label for="test7">Ciências Humanas, Sociais Aplicadas e Linguística, Letras e Artes</label>
				</p>

				<br>
				<br>
				<br>
				<br>
				<h4>Áreas de avaliação do periódico segundo WebQualis</h4>
				<blockquote>
					<h4>Importante</h4>
					<span>O orientador pode informar duas áreas de avaliação, de acordo com os critérios do WebQualis para a 
						pontuação dos seus artigos. Os artigos pontuarão na primeira área informada. Somente pontuarão na
						segunda áea se a revista não estiver contemplada na primeira opção.
					</span>
				</blockquote>

				<div class="input-field">
					<select id="doc_capes1" name="doc_capes1" >	
						<option value="" <?php echo set_select('doc_capes1', '', TRUE); ?>>Área 1</option>
						<option value="1" <?php echo set_select('doc_capes1', '1'); ?>>ADMINISTRAÇÃO, CIÊNCIAS CONTÁBEIS E TURISMO       </option>
						<option value="2" <?php echo set_select('doc_capes1', '2'); ?>>ANTROPOLOGIA / ARQUEOLOGIA                        </option>
						<option value="3" <?php echo set_select('doc_capes1', '3'); ?>>ARQUITETURA E URBANISMO                           </option>
						<option value="4" <?php echo set_select('doc_capes1', '4'); ?>>ARTES / MÚSICA                                    </option>
						<option value="5" <?php echo set_select('doc_capes1', '5'); ?>>ASTRONOMIA / FÍSICA                               </option>
						<option value="6" <?php echo set_select('doc_capes1', '6'); ?>>BIODIVERSIDADE</option>
						<option value="7" <?php echo set_select('doc_capes1', '7'); ?>>BIOTECNOLOGIA                                     </option>
						<option value="8" <?php echo set_select('doc_capes1', '8'); ?>>CIÊNCIA DA COMPUTAÇÃO                             </option>
						<option value="9" <?php echo set_select('doc_capes1', '9'); ?>>CIÊNCIA DE ALIMENTOS                              </option>
						<option value="10" <?php echo set_select('doc_capes1', '10'); ?>>CIÊNCIA POLÍTICA E RELAÇÕES INTERNACIONAIS        </option>
						<option value="11" <?php echo set_select('doc_capes1', '11'); ?>>CIÊNCIAS AGRÁRIAS I                               </option>
						<option value="12" <?php echo set_select('doc_capes1', '12'); ?>>CIÊNCIAS AMBIENTAIS</option>
						<option value="13" <?php echo set_select('doc_capes1', '13'); ?>>CIÊNCIAS BIOLÓGICAS I                             </option>
						<option value="14" <?php echo set_select('doc_capes1', '14'); ?>>CIÊNCIAS BIOLÓGICAS II                            </option>
						<option value="15" <?php echo set_select('doc_capes1', '15'); ?>>CIÊNCIAS BIOLÓGICAS III                           </option>
						<option value="16" <?php echo set_select('doc_capes1', '16'); ?>>CIÊNCIAS SOCIAIS APLICADAS I                      </option>
						<option value="17" <?php echo set_select('doc_capes1', '17'); ?>>DIREITO                                           </option>
						<option value="18" <?php echo set_select('doc_capes1', '18'); ?>>ECONOMIA                                          </option>
						<option value="19" <?php echo set_select('doc_capes1', '19'); ?>>EDUCAÇÃO                                          </option>
						<option value="20" <?php echo set_select('doc_capes1', '20'); ?>>EDUCAÇÃO FÍSICA                                   </option>
						<option value="21" <?php echo set_select('doc_capes1', '21'); ?>>ENFERMAGEM                                        </option>
						<option value="22" <?php echo set_select('doc_capes1', '22'); ?>>ENGENHARIAS I                                     </option>
						<option value="23" <?php echo set_select('doc_capes1', '23'); ?>>ENGENHARIAS II                                    </option>
						<option value="24" <?php echo set_select('doc_capes1', '24'); ?>>ENGENHARIAS III                                   </option>
						<option value="25" <?php echo set_select('doc_capes1', '25'); ?>>ENGENHARIAS IV                                    </option>
						<option value="26" <?php echo set_select('doc_capes1', '26'); ?>>ENSINO</option>
						<option value="27" <?php echo set_select('doc_capes1', '27'); ?>>FARMÁCIA                                          </option>
						<option value="28" <?php echo set_select('doc_capes1', '28'); ?>>FILOSOFIA/TEOLOGIA:subcomissão FILOSOFIA</option>
						<option value="29" <?php echo set_select('doc_capes1', '29'); ?>>FILOSOFIA/TEOLOGIA:subcomissão TEOLOGIA           </option>
						<option value="30" <?php echo set_select('doc_capes1', '30'); ?>>GEOCIÊNCIAS                                       </option>
						<option value="31" <?php echo set_select('doc_capes1', '31'); ?>>GEOGRAFIA                                         </option>
						<option value="32" <?php echo set_select('doc_capes1', '32'); ?>>HISTÓRIA                                          </option>
						<option value="33" <?php echo set_select('doc_capes1', '33'); ?>>INTERDISCIPLINAR                                  </option>
						<option value="34" <?php echo set_select('doc_capes1', '34'); ?>>LETRAS / LINGUÍSTICA                              </option>
						<option value="35" <?php echo set_select('doc_capes1', '35'); ?>>MATEMÁTICA / PROBABILIDADE E ESTATÍSTICA          </option>
						<option value="36" <?php echo set_select('doc_capes1', '36'); ?>>MATERIAIS                                         </option>
						<option value="37" <?php echo set_select('doc_capes1', '37'); ?>>MEDICINA I                                        </option>
						<option value="38" <?php echo set_select('doc_capes1', '38'); ?>>MEDICINA II                                       </option>
						<option value="39" <?php echo set_select('doc_capes1', '39'); ?>>MEDICINA III                                      </option>
						<option value="40" <?php echo set_select('doc_capes1', '40'); ?>>MEDICINA VETERINÁRIA                              </option>
						<option value="41" <?php echo set_select('doc_capes1', '41'); ?>>NUTRIÇÃO</option>
						<option value="42" <?php echo set_select('doc_capes1', '42'); ?>>ODONTOLOGIA                                       </option>
						<option value="43" <?php echo set_select('doc_capes1', '43'); ?>>PLANEJAMENTO URBANO E REGIONAL / DEMOGRAFIA       </option>
						<option value="44" <?php echo set_select('doc_capes1', '44'); ?>>PSICOLOGIA                                        </option>
						<option value="45" <?php echo set_select('doc_capes1', '45'); ?>>QUÍMICA                                           </option>
						<option value="46" <?php echo set_select('doc_capes1', '46'); ?>>SAÚDE COLETIVA                                    </option>
						<option value="47" <?php echo set_select('doc_capes1', '47'); ?>>SERVIÇO SOCIAL                                    </option>
						<option value="48" <?php echo set_select('doc_capes1', '48'); ?>>SOCIOLOGIA                                        </option>
						<option value="49" <?php echo set_select('doc_capes1', '49'); ?>>ZOOTECNIA / RECURSOS PESQUEIROS                   </option>
					</select><?php echo form_error('doc_capes1');?>
				</div>

				<div class="input-field">
					<select id="doc_capes2" name="doc_capes2" >	
						<option value="" <?php echo set_select('doc_capes2', '', TRUE); ?>>Área 2</option>
						<option value="1" <?php echo set_select('doc_capes2', '1'); ?>>ADMINISTRAÇÃO, CIÊNCIAS CONTÁBEIS E TURISMO       </option>
						<option value="2" <?php echo set_select('doc_capes2', '2'); ?>>ANTROPOLOGIA / ARQUEOLOGIA                        </option>
						<option value="3" <?php echo set_select('doc_capes2', '3'); ?>>ARQUITETURA E URBANISMO                           </option>
						<option value="4" <?php echo set_select('doc_capes2', '4'); ?>>ARTES / MÚSICA                                    </option>
						<option value="5" <?php echo set_select('doc_capes2', '5'); ?>>ASTRONOMIA / FÍSICA                               </option>
						<option value="6" <?php echo set_select('doc_capes2', '6'); ?>>BIODIVERSIDADE</option>
						<option value="7" <?php echo set_select('doc_capes2', '7'); ?>>BIOTECNOLOGIA                                     </option>
						<option value="8" <?php echo set_select('doc_capes2', '8'); ?>>CIÊNCIA DA COMPUTAÇÃO                             </option>
						<option value="9" <?php echo set_select('doc_capes2', '9'); ?>>CIÊNCIA DE ALIMENTOS                              </option>
						<option value="10" <?php echo set_select('doc_capes2', '10'); ?>>CIÊNCIA POLÍTICA E RELAÇÕES INTERNACIONAIS        </option>
						<option value="11" <?php echo set_select('doc_capes2', '11'); ?>>CIÊNCIAS AGRÁRIAS I                               </option>
						<option value="12" <?php echo set_select('doc_capes2', '12'); ?>>CIÊNCIAS AMBIENTAIS</option>
						<option value="13" <?php echo set_select('doc_capes2', '13'); ?>>CIÊNCIAS BIOLÓGICAS I                             </option>
						<option value="14" <?php echo set_select('doc_capes2', '14'); ?>>CIÊNCIAS BIOLÓGICAS II                            </option>
						<option value="15" <?php echo set_select('doc_capes2', '15'); ?>>CIÊNCIAS BIOLÓGICAS III                           </option>
						<option value="16" <?php echo set_select('doc_capes2', '16'); ?>>CIÊNCIAS SOCIAIS APLICADAS I                      </option>
						<option value="17" <?php echo set_select('doc_capes2', '17'); ?>>DIREITO                                           </option>
						<option value="18" <?php echo set_select('doc_capes2', '18'); ?>>ECONOMIA                                          </option>
						<option value="19" <?php echo set_select('doc_capes2', '19'); ?>>EDUCAÇÃO                                          </option>
						<option value="20" <?php echo set_select('doc_capes2', '20'); ?>>EDUCAÇÃO FÍSICA                                   </option>
						<option value="21" <?php echo set_select('doc_capes2', '21'); ?>>ENFERMAGEM                                        </option>
						<option value="22" <?php echo set_select('doc_capes2', '22'); ?>>ENGENHARIAS I                                     </option>
						<option value="23" <?php echo set_select('doc_capes2', '23'); ?>>ENGENHARIAS II                                    </option>
						<option value="24" <?php echo set_select('doc_capes2', '24'); ?>>ENGENHARIAS III                                   </option>
						<option value="25" <?php echo set_select('doc_capes2', '25'); ?>>ENGENHARIAS IV                                    </option>
						<option value="26" <?php echo set_select('doc_capes2', '26'); ?>>ENSINO</option>
						<option value="27" <?php echo set_select('doc_capes2', '27'); ?>>FARMÁCIA                                          </option>
						<option value="28" <?php echo set_select('doc_capes2', '28'); ?>>FILOSOFIA/TEOLOGIA:subcomissão FILOSOFIA</option>
						<option value="29" <?php echo set_select('doc_capes2', '29'); ?>>FILOSOFIA/TEOLOGIA:subcomissão TEOLOGIA           </option>
						<option value="30" <?php echo set_select('doc_capes2', '30'); ?>>GEOCIÊNCIAS                                       </option>
						<option value="31" <?php echo set_select('doc_capes2', '31'); ?>>GEOGRAFIA                                         </option>
						<option value="32" <?php echo set_select('doc_capes2', '32'); ?>>HISTÓRIA                                          </option>
						<option value="33" <?php echo set_select('doc_capes2', '33'); ?>>INTERDISCIPLINAR                                  </option>
						<option value="34" <?php echo set_select('doc_capes2', '34'); ?>>LETRAS / LINGUÍSTICA                              </option>
						<option value="35" <?php echo set_select('doc_capes2', '35'); ?>>MATEMÁTICA / PROBABILIDADE E ESTATÍSTICA          </option>
						<option value="36" <?php echo set_select('doc_capes2', '36'); ?>>MATERIAIS                                         </option>
						<option value="37" <?php echo set_select('doc_capes2', '37'); ?>>MEDICINA I                                        </option>
						<option value="38" <?php echo set_select('doc_capes2', '38'); ?>>MEDICINA II                                       </option>
						<option value="39" <?php echo set_select('doc_capes2', '39'); ?>>MEDICINA III                                      </option>
						<option value="40" <?php echo set_select('doc_capes2', '40'); ?>>MEDICINA VETERINÁRIA                              </option>
						<option value="41" <?php echo set_select('doc_capes2', '41'); ?>>NUTRIÇÃO</option>
						<option value="42" <?php echo set_select('doc_capes2', '42'); ?>>ODONTOLOGIA                                       </option>
						<option value="43" <?php echo set_select('doc_capes2', '43'); ?>>PLANEJAMENTO URBANO E REGIONAL / DEMOGRAFIA       </option>
						<option value="44" <?php echo set_select('doc_capes2', '44'); ?>>PSICOLOGIA                                        </option>
						<option value="45" <?php echo set_select('doc_capes2', '45'); ?>>QUÍMICA                                           </option>
						<option value="46" <?php echo set_select('doc_capes2', '46'); ?>>SAÚDE COLETIVA                                    </option>
						<option value="47" <?php echo set_select('doc_capes2', '47'); ?>>SERVIÇO SOCIAL                                    </option>
						<option value="48" <?php echo set_select('doc_capes2', '48'); ?>>SOCIOLOGIA                                        </option>
						<option value="49" <?php echo set_select('doc_capes2', '49'); ?>>ZOOTECNIA / RECURSOS PESQUEIROS     </option>
					</select><?php echo form_error('doc_capes2');?>
				</div>

				<br>
				<br>

				<span class="label-form">Área de atuação segundo o CNPq</span>
				<div class="input-control text">
					<input id="doc_cnpq" name="doc_cnpq" type="text" value="<?php echo set_value('doc_cnpq');?>"/>
					<?php echo form_error('doc_cnpq');?>
				</div>

				<br>
				<br>
				<br>
				<br>

				<h4>Dados de Acesso</h4>
				<span class="label-form">Login</span>		
				<div class="input-control text">
					<input class="with-helper" id="usu_login" name="usu_login" type="text" value="<?php echo set_value('usu_login');?>"/>	
					<?php echo form_error('usu_login');?>
				</div>

				<span class="label-form">Senha</span>
				<div class="input-control password">
					<input id="usu_senha" name="usu_senha" type="password" value="<?php echo set_value('usu_senha');?>"/>
					<!-- <button class="btn-reveal"></button> -->
					<?php echo form_error('usu_senha');?>
				</div>

				<span class="label-form">Confirmar senha</span>
				<div class="input-control password">
					<input id="confirmar_senha" name="confirmar_senha" type="password" value="<?php echo set_value('confirma_senha');?>"/>
					<!-- <button class="btn-reveal"></button> -->
					<?php echo form_error('confirmar_senha');?>
				</div>

				<button type="submit" class="waves-effect waves-light btn-large green right"><i class="material-icons right">send</i>Enviar</button>

			</div>
		</div>
	</div>

</form>

 <?php /*
<div class="valign-wrapper" style="width:100%; height:400px;">
	<div class="image center-align " style="width:100%;"><img src="<?php echo base_url('layout/images/clock.jpg'); ?>" alt="">
			<h3 class="center-align" style="width:100%;color:#5a5a5a;">EM BREVE<br><small><h6 class="grey-text">O cadastro será liberado de acordo com as datas contidas no calendário.</h6></small></h3>
	</div>
</div>
   */
 ?>    
<br>
<br>
<script>
	$().ready(function() {
		$('select').material_select();
	});
</script>



<!-- <br>
<br>



<div class="center-align" style="width:100%;">
	<h1 class="grey-text"><i class="material-icons" style="font-size:5em;">alarm</i></h1>
	<h1 class="grey-text" style="font-size:5em;">Em breve</h1>
</div>

<br>
<br>
<br>
<br> -->

