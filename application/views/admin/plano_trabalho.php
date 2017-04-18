<div class="page-header">
  <div class="page-header-content">
    <h1>Planos de Trabalho</h1>
  </div>
</div>

<?php if($planos):?>
  <table border="0" cellspacing="5" cellpadding="5">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Título</th>
        <th>Arquivo</th>
        <th>Ordem</th>
        <th>Data</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($planos->result() as $plano): ?>
      <tr>
        <td>
          <p><?php echo $plano->doc_nome;?></p>
        </td>
        <td>
          <p><?php echo $plano->plano_titulo;?></p>
        </td>
        <td>
          <p><a target="_blank" href="<?php echo base_url('planos/'.$plano->plano_arquivo); ?>">Visualizar</a></p>
        </td>
        <td>
          <p><?php echo $plano->plano_ordem;?></p>
        </td>
        <td>
          <p><?php echo $plano->plano_data;?></p>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
<?php else: ?>
  <?php echo '<h3 style="text-align:center;">Não há cadastros.</h3>'; ?>
<?php endif; ?>
