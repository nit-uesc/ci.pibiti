<div class="page-header">
  <div class="page-header-content">
    <h1 class="blue-text">Projetos</h1>
  </div>
</div>

<?php include('instrucoes.php'); ?>

<div>
  <p>Projetos avaliados:</p>
  <i class="material-icons grey-text">done_all</i>
  <span id="total-avaliados">0</span>
  <span>/ <?php echo sizeof($projetos); ?></span>
</div>

<?php if($projetos):?>
<?php foreach ($projetos as $projeto): ?>
<?php include('template-parts/avaliacao_interna.php'); ?>
<?php endforeach;?>
<?php endif;?>

<script type="text/javascript" src="<?= base_url('');?>layout/public/js/avaliador/feel.js"></script>
<script type="text/javascript" charset="utf-8">

var criteriosProjeto;
var criteriosOrientador;
var base_url = '<?php echo base_url();?>';
var results = {};

$(document).ready( function() {

  // Desmarca todos os radios
  $(':radio').each(function() {
    this.checked = false;
  });

  // START Coleta todos os criterios de avaliação
  $.ajax({

    // SEND
    type: 'GET',
    url: base_url + 'avaliador/get_criterios',

    // CATCH
    success : function(criterios) {
      results['criterios'] = criterios;
    },
    error : function(xhr, textStatus, errorThrown) {
      console.log('ERRO!');
      console.log(xhr);
    }

  });
  // END Coleta todos os criterios de avaliação

  // START Coleta todas as avaliações
  $.ajax({

    // SEND
    type: "GET",
    url: base_url + 'avaliador/get_all',

    // CATCH
    success : function(avaliacoes) {
      results['avaliacoes'] = avaliacoes;
    },
    error : function(xhr, textStatus, errorThrown) {
      console.log("Ocorreu um erro");
      console.log(xhr.responseText);
    }

  });
  // END Coleta todas as avaliações

  setTimeout(function(){
    criterios = JSON.parse(results['criterios']);
    criteriosProjeto = criterios.projeto;
    criteriosOrientador = criterios.orientador;
  }, 200);

  setTimeout(function(){
    avaliacoes = JSON.parse(results['avaliacoes']);
    totalAvaliados = avaliacoes.length;
    refreshTotalAvaliados();

    for (var i = 0; i < avaliacoes.length; i++) {
      console.log(avaliacoes[i]);
      var idProjeto = avaliacoes[i].FK_projeto_id;
      var idCriterioProjeto = avaliacoes[i].FK_criterio_projeto_id;
      var idCriterioOrientador = avaliacoes[i].FK_criterio_orientador_id;
      var pontuacaoProjeto  = avaliacoes[i].projeto_pontuacao;
      var pontuacaoOrientador  = avaliacoes[i].orientador_pontuacao;
      $('#criterio' + idCriterioProjeto + '' + idProjeto).prop('checked', true);
      $('#criterio_orientador_' + idCriterioOrientador + '' + idProjeto).prop('checked', true);
      refreshPontuacao(idProjeto, idCriterioProjeto, idCriterioOrientador);
    }
  }, 200);
});

var totalAvaliados;
function refreshTotalAvaliados(){
  $('#total-avaliados').html(totalAvaliados);
}

function refreshPontuacao(idProjeto, idCriterioProjeto, idCriterioOrientador){
  var pontuacaoProjeto = criteriosProjeto[idCriterioProjeto-1].pontuacao;
  var pontuacaoOrientador = criteriosOrientador[idCriterioOrientador-1].pontuacao;
  var pontuacao = +pontuacaoProjeto + +pontuacaoOrientador;
  $('#pontuacao' + idProjeto).html(pontuacao);
  $('#status' + idProjeto).html('done').parent().removeClass('grey-text').addClass('green-text');
}

function save(idProjeto){
  var idCriterioProjeto;
  var idCriterioOrientador;

  var $input = $(".criterio_orientador:checked").each(function() {
      idCriterioOrientador = this.value;
  });

  var $input = $(".criterio_projeto:checked").each(function() {
      idCriterioProjeto = this.value;
  });

  console.log('dano');
  console.log(idCriterioProjeto);
  console.log(idCriterioOrientador);
  // Só salva quando ambos os critérios foram avaliados
  if (idCriterioProjeto == null || idCriterioOrientador == null) {
    return;
  }


  $.ajax({
    type : "POST",
    url : base_url + 'avaliador/avaliar',
    data : {
      idProjeto,
      idCriterioProjeto,
      idCriterioOrientador,
    },
    dataType : "json",

    success : function(data) {
      if (data.length != 0) {
        console.log("Salvo!");
        console.log(data);
        refreshPontuacao(idProjeto, idCriterioProjeto, idCriterioOrientador);
        if (data === 'insert'){
          totalAvaliados += 1;
          refreshTotalAvaliados();
        }
      }
    },

    error : function(xhr, textStatus, errorThrown) {
      console.log("Ocorreu um erro");
      console.log(xhr.responseText);
    }
  });
}

</script>
