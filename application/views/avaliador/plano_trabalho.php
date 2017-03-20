<!--Titulo-->
<div class="page-header">
  <div class="page-header-content">
    <h1 class="blue-text">Planos de Trabalho</h1>
  </div>
</div>

<!--Card de instruções-->
<?php include('instrucoes.php'); ?>

<!--Status da avaliação-->
<div>
  <p>Planos avaliados:</p>
  <i class="material-icons grey-text">done_all</i>
  <span id="total-avaliados">0</span>
  <span>/ <?php echo $quantidade_projetos ?></span>
</div>

<!--Listagem dos planos-->
<?php if($planos):?>
  <?php for ($i = 0; $i < count($planos); $i++): ?> 
    <?php include('template-parts/avaliacao_externa.php'); ?>
  <?php endfor;?>
<?php endif;?>

<script type="text/javascript" src="<?= base_url('');?>layout/public/js/avaliador/feel.js"></script>
<script type="text/javascript" charset="utf-8">

var totalAvaliados;
var base_url = '<?php echo base_url();?>';
var requests = {};

$(document).ready( function() {

  // Esvazia todos os campos
  $(':input').each(function() {
    $(this).val('');
  });

  // START Coleta todas as avaliações
  $.ajax({

    // SEND
    type: "GET",
    url: base_url + 'avaliador/get_all_externo',

    // CATCH
    success : function(data) {
      requests['avaliacoes_com_observacoes'] = data;
    },
    error : function(xhr, textStatus, errorThrown) {
      console.log("Ocorreu um erro");
      console.log(xhr.responseText);
    }

  });
  // END Pega todas as avaliações

  setTimeout(function(){
    var result = JSON.parse(requests['avaliacoes_com_observacoes']);
    avaliacoes = result.avaliacoes;
    observacoes = result.observacoes;

    // Atualiza total de avaliados
    totalAvaliados = avaliacoes.length/5;
    refreshTotalAvaliados();

    // Preenche os campos com as notas e atualiza pontuação
    for (var i = 0; i < avaliacoes.length; i++) {
      var idProjeto = avaliacoes[i].FK_projeto_id;
      var idCriterio = avaliacoes[i].FK_criterio_externo_id;
      var pontuacao = avaliacoes[i].pontuacao;
      $('#criterio' + idCriterio + '' + idProjeto).val(pontuacao);
      refreshPontuacao(idProjeto);
    }

    // Preenche todas as observações
    for (var i = 0; i < observacoes.length; i++) {
      var idProjeto = observacoes[i].FK_projeto_id;
      $('#observacoes' + idProjeto).val(observacoes[i].texto);
    }

  }, 200);

});

function refreshTotalAvaliados(){
  $('#total-avaliados').html(totalAvaliados);
}

function refreshPontuacao(idProjeto){
  var pontuacao = 0;
  $('#' + idProjeto + ' :input').each(function() {
    pontuacao += +this.value; 
  });
  $('#pontuacao' + idProjeto).html(pontuacao);
  $('#status' + idProjeto).html('done').parent().removeClass('grey-text').addClass('green-text');
}

function salvarAvaliacao(idProjeto){
  var observacoes;
  var criterios = {};
  var i = 0;

  // Pega a nota de cada critério
  var $input = $("#" + idProjeto + " :input[type='number']").each(function() {
    criterios['' + i] = {};
    criterios['' + i].FK_criterio_externo_id = i+1;
    var pontuacao_clamp = Math.min(Math.max(this.value, 0), 2);
    criterios['' + i].pontuacao = pontuacao_clamp;
    this.value = pontuacao_clamp;
    i += 1;
  });

  observacoes = $("#observacoes" + idProjeto).val();
  console.log(criterios);
  console.log(observacoes);

  // START Envia a avaliação
  $.ajax({

    // SEND
    type : "POST",
    url : base_url + 'avaliador/avaliar_externo',
    data : {
      idProjeto,
      criterios,
      observacoes
    },
    dataType : "json",

    // CATCH
    success : function(data) {
      if (data.length != 0) {
        console.log("Salvo!");
        console.log(data);
        refreshPontuacao(idProjeto);
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
  // END Envia avaliação
}

</script>
