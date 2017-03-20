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
        <td><?php echo $plano->doc_nome;?></td>
        <td><?php echo $plano->plano_titulo;?></td>
        <td><a href="<?php echo base_url('planos/'.$plano->plano_arquivo); ?>">Visualizar</a></td>
        <td><?php echo $plano->plano_ordem;?></td>
        <td><?php echo $plano->plano_data;?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
<?php else: ?>
  <?php echo '<h3 style="text-align:center;">Não há cadastros.</h3>'; ?>
<?php endif; ?>

