<div class="page-header">
  <div class="page-header-content">
    <h1>Projetos</h1>
  </div>
</div>

<?php if($projetos):?>
<table border="0" cellspacing="5" cellpadding="5">
  <thead>
    <tr><th>Docente</th><th>Titulo</th><th>Arquivo</th><th>Data de Inscrição</th></tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    <?php foreach ($projetos->result() as $projeto): ?>
    <tr>
      <td>
        <p><?php echo $projeto->doc_nome;?></p>
      </td>
      <td>
        <p><?php echo $projeto->proj_titulo;?></p>
      </td>
      <td>
        <p><a target="_blank" href="<?php echo base_url('uploads/'.$projeto->proj_arquivo);?>">Visualizar</a></p>
      td>
      <td>
        <p><?php echo $projeto->proj_data;?></p>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>

<?php else: ?>
  <?php #echo '<h3 style="text-align:center;">Não há cadastros.</h3>'; ?>
<?php endif;?>
