<div class="row">
  <div class="col s12 card-panel">

    <p>Teste da função <b>avaliacaoEmAndamento()</b> da library controle </p>
    <div class="divider"></div>
    <?php if($this->periodo->avaliacaoEmAndamento()): ?>
      <p class="green-text"><b>Avaliação em andamento...</b></p>
    <?php else: ?>
      <p class="red-text"><b>Avaliação encerrada...</b></p>
    <?php endif; ?>

    <p>Teste da função <b>submissaoEmAndamento()</b> da library controle</p>
    <div class="divider"></div>
    <?php if($this->periodo->submissaoEmAndamento()): ?>
      <p class="green-text"><b>Submissão em andamento...</b></p>
    <?php else: ?>
      <p class="red-text"><b>Submissão encerrada...</b></p>
    <?php endif; ?>

    <p>Teste da função <b>resultadoDisponivel()</b> da library controle</p>
    <div class="divider"></div>
    <?php if($this->periodo->resultadoDisponivel()): ?>
      <p class="green-text"><b>Resultado divulgado...</b></p>
    <?php else: ?>
      <p class="red-text"><b>Resultado não divulgado...</b></p>
    <?php endif; ?>

  </div>
</div>