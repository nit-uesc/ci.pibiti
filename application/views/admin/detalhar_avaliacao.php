<pre>
</pre>

<h1>Detalhes da avaliação</h1>
<div class="portlet z-depth-1">
  <div class="portlet-title blue-grey darken-3 white-text">
    Dados do projeto
  </div>
  <div class="portlet-body">
    <span class="t2">Projeto</span>
    <a href="<?php echo base_url('uploads/'.$projeto['proj_arquivo']);?>"><?= $projeto['proj_titulo'] != '' ? $projeto['proj_titulo'] : 'Título não informado' ?></a>
    <span class="t2">Orientador</span>
    <a href="<?= $projeto['link_lattes'] ?>" target="_blank"><?php echo $projeto['doc_nome'];?></a>
    <?php if (isset($projeto['planos'])) : ?>
    <span class="t2">Planos de trabalho</span>
    <?php foreach ($projeto['planos'] as $plano) : ?>
    <a href="<?php echo base_url('planos/'.$plano['plano_arquivo']); ?>">Plano de trabalho</a>
    <br>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<div class="portlet z-depth-1">
  <div class="portlet-title blue-grey darken-3 white-text">Avaliações</div>
  <div class="portlet-body">

    <span class="t2">Nota Final</span>
    <p><?= $nota_final ?></p>
    <span class="t2">Media interna</span>
    <p><?= $interna['media'] ?></p>
    <span class="t2">Media externa</span>
    <p><?= $externa['media'] ?></p>

    <!--BEGIN tabs-->
    <div class="row">
      <div class="col s12">
        <ul class="tabs z-depth-1">
          <li class="tab col s12"><a class="active blue-grey-text text-darken-3" href="#avaliacoes_internas">Avaliações Internas</a></li>
          <li class="tab col s12"><a class="blue-grey-text text-darken-3" href="#avaliacoes_externas">Avaliações Externas</a></li>
        </ul>
      </div>
    </div>
    <!--END tabs-->

    <!--BEGIN avaliacoes_internas-->
    <div id="avaliacoes_internas">
      <?php if (isset($interna)) : ?>
      <?php foreach ($interna['avaliacoes'] as $avaliacao_interna) : ?>

      <!--BEGIN portlet-->
      <div class="portlet z-depth-1">

        <!--BEGIN title-->
        <div class="portlet-title">
          <i class="material-icons">person</i>
          <?= $avaliacao_interna['avaliador_nome'] ?>
        </div>
        <!--END title-->

        <!--BEGIN Body-->
        <div class="portlet-body">
          <table>
            <tr>
              <th></th>
              <th>Descrição</th>
              <th class="text-align center">Pontuação</th>
            </tr>
            <tr>
              <th>Critério do Projeto</th>
              <td><?= $avaliacao_interna['criterio_projeto_descricao'] ?></td>
              <td class="text-align center"><?= $avaliacao_interna['projeto_pontuacao'] ?></td>
            </tr>
            <tr>
              <th>Critério do Orientador</th>
              <td><?= $avaliacao_interna['criterio_orientador_descricao'] ?></td>
              <td class="text-align center"><?= $avaliacao_interna['orientador_pontuacao'] ?></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td class="text-align center"><b><?= $avaliacao_interna['nota'] ?></b></td>
            </tr>
          </table>
        </div>
        <!--END Body-->

      </div>
      <!--END portlet-->

      <?php endforeach; ?>

      <?php else: ?>
      <?php endif; ?>
    </div>
    <!--END avaliacoes_internas-->

    <!--BEGIN avaliacoes_externas-->
    <div id="avaliacoes_externas">
      <?php if (isset($externa['avaliacoes'])) : ?>
      <?php foreach ($externa['avaliacoes'] as $avaliacao_externa) : ?>

      <!--BEGIN portlet-->
      <div class="portlet z-depth-1">

        <!--BEGIN title-->
        <div class="portlet-title">
          <i class="material-icons">person</i>
          <?= $avaliacao_externa['avaliador'] ?>
        </div>
        <!--END title-->

        <!--BEGIN body-->
        <div class="portlet-body">

          <!--BEGIN tabela de avaliacoes externas-->
          <table>
            <thead>
              <th>Critério</th>
              <th>Nota</th>
            </thead>
            <tbody>
              <?php if (isset($avaliacao_externa['criterios'])) : ?>
                <?php foreach ($avaliacao_externa['criterios'] as $criterio) : ?>
                <tr>
                  <td><?= $criterio['descricao'] ?></td>
                  <td><?= $criterio['pontuacao'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                  <td class="text-align right"></td>
                  <td><b><?= $avaliacao_externa['nota'] ?></b></td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
          <!--END tabela de avaliacoes externas-->

          <span class="t2">Observações</span>
          <p><?= !empty($avaliacao_externa['observacao']) ? $avaliacao_externa['observacao'] : 'Nenhuma' ?></p>
        </div>
        <!--END body-->

      </div>
      <!--END portlet-->

      <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <!--END avaliacoes_externas-->

  </div>
</div>
