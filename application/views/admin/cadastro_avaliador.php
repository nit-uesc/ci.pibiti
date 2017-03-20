<div class="row">
  <h1>Cadastro de Avaliador</h1>
  <p>Após clicar em salvar, um email com os dados de acesso da plataforma será enviado para o endereço de email inserido.</p>

  <div class="col s12 white card-panel">

    <?php
      if(isset($success)):
        echo $this->return_boxes->sucess($success);
      elseif(isset($error)):
        echo $this->return_boxes->error($error);
      endif;
    ?>

    <?php echo form_open('admin/cadastro_avaliador'); ?>
      <div class="row">
        <div class="input-field col s12">
          <input id="nome" name="nome" type="text">
          <label for="nome">Nome</label>
          <?php echo form_error('nome'); ?>
        </div>

        <div class="input-field col s12">
          <input id="email" name="email" type="email">
          <label for="email">Email</label>
          <?php echo form_error('email'); ?>
        </div>

        <div class="input-field col s12">
          <?php
            $options = array();
            foreach ($tipo_avaliador as $row):
              $options[$row->id] = $row->nome;
            endforeach;
            echo form_dropdown('tipo_avaliador', $options, set_value('tipo_avaliador'));
          ?>
          <label>Tipo de Avaliador</label>
          <?php echo form_error('tipo_avaliador'); ?>
        </div>

        <div class="col s12">
          <button type="submit" class="btn blue right"><i class="material-icons left">save</i>Salvar dados</button>
        </div>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>

<div class="row">
  <div class="col s12 card-panel">
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Tipo avaliador</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($avaliadores as $row): ?>
        <tr>
          <td><?php echo $row->doc_nome; ?></td>
          <td><?php echo $row->usu_login; ?></td>
          <?php if($row->FK_tipo_avaliador_id == 1): ?>
            <td>Interno</td>
          <?php elseif($row->FK_tipo_avaliador_id == 2): ?>
            <td>Externo</td>
          <?php endif; ?>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
