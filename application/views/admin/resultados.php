<pre>
  <!--<?php var_dump($quantidade_de_avaliadores) ?>-->
  <!--<?php var_dump($resultados) ?>-->
</pre>
<h1>Resultados</h1>
<?php if ($resultados) : ?>
<div class="portlet z-depth-1">
  <div class="portlet-title blue-grey darken-3 white-text">
    Avaliações 2016
  </div>
  <div class="portlet-body">
    <table class="highlight fixed-table" id="data-table">
      <thead>
        <th>Orientador</th>
        <th>Projeto</th>
        <th class="text-align center">Interno</th>
        <th class="text-align center">Externo</th>
        <th class="text-align center">Média</th>
        <th class="text-align center">Opções</th>
      </thead>
      <tbody>
        <?php foreach ($resultados as $resultado) : ?>
        <tr>
          <td><?= $resultado['doc_nome'] ?></td>
          <td><?= $resultado['proj_titulo'] ?></td> 
          <td class="text-align center">
            <?=  $resultado['quantidade_de_avaliacoes_internas'] . '/' . $quantidade_de_avaliadores['interno'] ?>
          </td> 
          <td class="text-align center">
            <?=  $resultado['quantidade_de_avaliacoes_externas'] . '/' . $quantidade_de_avaliadores['externo'] ?>
          </td> 
          <td class="text-align center"><?= $resultado['pontuacao'] ?></td>
          <td class="text-align center"><a class="action" href="<?= base_url('admin/detalhar_avaliacao') . '/' . $resultado['proj_id'] ?>" target="_blank">Detalhar</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>
</div>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
  $('#data-table').DataTable({
    dom: 'Bfrtip',
    "paging": false,
    "order": [[4,'desc']],

    //BEGIN buttons
    //Cria botões para exportar dados
    buttons: {
      buttons: [
        {
          extend: 'csvHtml5',
          className: 'btn'
        }
      ]
    },
    //END buttons

    //Tradução
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
    },

    //Remove as classes padrão
    "fnInitComplete": function(oSettings, json) {
      $(".dt-button").removeClass('dt-button').removeClass('buttons-csv').removeClass('buttons-html5');
    },

    //Ícone para busca
    "oLanguage": { "sSearch": '<i class="material-icons prefix">search</i>' }
  });
});
</script>
