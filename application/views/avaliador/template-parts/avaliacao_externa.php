<?php $count = 0 ?>
<?php $last_id = $planos[$i]->proj_id ?>

<ul class="collapsible" data-collapsible="accordion">
  <li>

    <!--Header do plano-->
    <div class="collapsible-header item-avaliacao grey-text" onclick="itemOpen(this)">
      <i class="material-icons" id="status<?= $planos[$i]->proj_id ?>">hourglass_empty</i>
      <span class="titulo"><?= $planos[$i]->proj_titulo != '' ? $planos[$i]->proj_titulo : 'Título não informado' ?></span>
      <br>
      <i class="material-icons grey-text arrow">keyboard_arrow_down</i>
      <span class="grey-text">Pontuação: </span>
      <span class="grey-text" id="pontuacao<?php echo $planos[$i]->proj_id ?>">0</span>
    </div>

    <!--Body do plano-->
    <div class="collapsible-body">

      <!--Informações do plano-->
      <p>
      Orientador: <?php echo $planos[$i]->doc_nome;?> </br>
      Projeto: <a href="<?php echo base_url('uploads/'.$planos[$i]->proj_arquivo);?>"><?= $planos[$i]->proj_titulo != '' ? $planos[$i]->proj_titulo : 'Título não informado' ?></a>
      <br>
      <br>
      <?php if ($count == 0) : ?>
        <a href="<?php echo base_url('planos/'.$planos[$i]->plano_arquivo); ?>">Plano de trabalho 1</a>
        <?php $count++ ?>
        <?php $i++ ?>
      <?php endif; ?>

      <?php if ($last_id == $planos[$i]->proj_id) : ?>
        <br>
        <a href="<?php echo base_url('planos/'.$planos[$i]->plano_arquivo); ?>">Plano de trabalho 2</a> </br>
      <?php else: ?>
        <?php $i-- ?>
      <?php endif; ?>
      </p>

      <!--START Formulário de avaliação-->
      <form class="avaliacao collapsible-table" id="<?php echo $planos[$i]->proj_id ?>" method="post" action="<?php echo base_url('');?>" onchange="salvarAvaliacao(<?php echo $planos[$i]->proj_id ?>)">
        <table>
          <thead>
            <tr>
              <th>Critério do projeto</th>
              <th>Pontuação</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <span>
                  Caráter inovador, de acordo com Manual de Oslo (ver página do NIT) 
                </span>
              </td>
              <td>
                <input class="criterio_externo" name="criterio<?php echo $planos[$i]->proj_id ?>" type="number" step="0.1" min="0" max="2" id="criterio1<?php echo $planos[$i]->proj_id ?>"/>
                <label for="criterio1<?php echo $planos[$i]->proj_id ?>"></label>
              </td>
            </tr>
            <tr>
              <td>
                <span>
                  Potencial de geração de patente, ou cultivar, ou registro de software
                </span>
              </td>
              <td>
                <input class="criterio_externo" name="criterio<?php echo $planos[$i]->proj_id ?>" type="number" step="0.1" min="0" max="2" id="criterio2<?php echo $planos[$i]->proj_id ?>"/>
                <label for="criterio2<?php echo $planos[$i]->proj_id ?>"></label>
              </td>
            </tr>
            <tr>
              <td>
                <span>
                  Potencial de transferência de tecnologia para o setor produtivo privado ou geração de negócios a partir de “spin-off” da academia
                </span>
              </td>
              <td>
                <input class="criterio_externo" name="criterio<?php echo $planos[$i]->proj_id ?>" type="number" step="0.1" min="0" max="2" id="criterio3<?php echo $planos[$i]->proj_id ?>"/>
                <label for="criterio3<?php echo $planos[$i]->proj_id ?>"></label>
              </td>
            </tr>
            <tr>
              <td>
                <span>
                  Revisão Patentária / Busca de Anterioridade
                </span>
              </td>
              <td>
                <input class="criterio_externo" name="criterio<?php echo $planos[$i]->proj_id ?>" type="number" step="0.1" min="0" max="2" id="criterio4<?php echo $planos[$i]->proj_id ?>"/>
                <label for="criterio4<?php echo $planos[$i]->proj_id ?>"></label>
              </td>
            </tr>
            <tr>
              <td>
                <span>
                  Plano de Trabalho do Bolsista
                </span>
              </td>
              <td>
                <input class="criterio_externo" name="criterio<?php echo $planos[$i]->proj_id ?>" type="number" step="0.1" min="0" max="2" id="criterio5<?php echo $planos[$i]->proj_id ?>"/>
                <label for="criterio5<?php echo $planos[$i]->proj_id ?>"></label>
              </td>
            </tr>
          </tbody>
        </table>
        <label for="observacoes<?php echo $planos[$i]->proj_id ?>">Observações (Opcional)</label>
        <textarea id="observacoes<?php echo $planos[$i]->proj_id ?>" class="materialize-textarea"></textarea>
      </form>
      <!--END Formulário de avaliação-->

    </div>

  </li>
</ul>
