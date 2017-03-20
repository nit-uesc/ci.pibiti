<?php
class Resultado_model extends CI_Model{

    function projetos_com_pontuacao_e_quantidade_de_avaliacoes()
    {
        $this->load->model('avaliacao_externa_model');
        $this->load->model('avaliacao_interna_model');
        $this->load->model('docente_model');
		$projetos = $this->docente_model->get_all_projetos();
		if (!$projetos) {
			return false;
		}
		$projetos = $projetos->result_array();
        foreach ($projetos as &$projeto) {
          $id_projeto = $projeto['proj_id'];
          $avaliacoes_externas = $this->avaliacao_externa_model->pontuacao_e_quantidade_de_avaliacoes($id_projeto);
          $avaliacoes_internas = $this->avaliacao_interna_model->pontuacao_e_quantidade_de_avaliacoes($id_projeto);
          $pontuacao_externa = $avaliacoes_externas['media_das_pontuacoes'];
          $pontuacao_interna = $avaliacoes_internas['media_das_pontuacoes'];
          $projeto['pontuacao_interna'] = $pontuacao_interna;
          $projeto['pontuacao_externa'] = $pontuacao_externa;
          $projeto['pontuacao'] = ($pontuacao_interna + $pontuacao_externa)/2;
          $projeto['quantidade_de_avaliacoes_externas'] = 0 + $avaliacoes_externas['quantidade_de_avaliacoes'];
          $projeto['quantidade_de_avaliacoes_internas'] = 0 + $avaliacoes_internas['quantidade_de_avaliacoes'];
        }
        return $projetos;
    }

}
?>
