<?php
class avaliacao_interna_model extends CI_Model{

    function avaliacoes_com_avaliador_criterios_notas_e_media($id_projeto)
    {
        // BEGIN Coleta todas as avaliações internas, junto com a descrição do critério escolhido
        $this->db->select('
            docente.doc_nome AS avaliador_nome,
            criterio_projeto.pontuacao AS projeto_pontuacao,
            criterio_orientador.pontuacao AS orientador_pontuacao,
            criterio_projeto.descricao AS criterio_projeto_descricao,
            criterio_orientador.descricao AS criterio_orientador_descricao,
        ');
         $this->db->from('avaliacao_interna')
                  ->join('avaliador', 'avaliador.id = avaliacao_interna.FK_avaliador_id', 'left')
                  ->join('docente', 'docente.fk_usu_id = avaliador.FK_usuario_id', 'left')
                  ->join('criterio_projeto', 'criterio_projeto.id  = avaliacao_interna.FK_criterio_projeto_id', 'left')
                  ->join('criterio_orientador', 'criterio_orientador.id  = avaliacao_interna.FK_criterio_orientador_id', 'left')
                  ->join("usuario AS usu", "avaliador.fk_usuario_id = usu.usu_id", "left")
                  ->where('FK_projeto_id', $id_projeto)
                  ->where("usu.teste", 0);
        $avaliacao_interna = $this->db->get();
        $quantidade_avaliacoes = $avaliacao_interna->num_rows();
        if ($quantidade_avaliacoes == 0)
            return false;

        $avaliacao_interna = $avaliacao_interna->result_array();
        // END Coleta todas as avaliações internas, junto com a descrição do critério escolhido

        // BEGIN Calcula a nota de cada avaliação e a média geral de todas as avaliações
        $soma_das_notas = 0;
        for ($i = 0; $i < count($avaliacao_interna); $i++) {
            $avaliacao_interna[$i]['nota'] = $avaliacao_interna[$i]['projeto_pontuacao'] + $avaliacao_interna[$i]['orientador_pontuacao'];
            $soma_das_notas += $avaliacao_interna[$i]['nota'];
        }
        $data['media'] = $soma_das_notas / $quantidade_avaliacoes;
        // END Calcula a nota de cada avaliação e a média geral de todas as avaliações

        $data['avaliacoes'] = $avaliacao_interna;
        return $data;
    }

    function get_all($id_avaliador)
    {
        $this->db->select(
            'FK_projeto_id,
            FK_criterio_projeto_id,
            FK_criterio_orientador_id,
            criterio_orientador.pontuacao AS orientador_pontuacao,
            criterio_projeto.pontuacao AS projeto_pontuacao
            ');
        $this->db->from('avaliacao_interna');
        $this->db->join('criterio_projeto', 'criterio_projeto.id  = avaliacao_interna.FK_criterio_projeto_id', 'left');
        $this->db->join('criterio_orientador', 'criterio_orientador.id  = avaliacao_interna.FK_criterio_orientador_id', 'left');
        $this->db->where('avaliacao_interna.FK_avaliador_id', $id_avaliador);
        $avaliacao_interna = $this->db->get();

        if ($avaliacao_interna->num_rows() == 0) {
            return false;
        }

        return $avaliacao_interna->result_array();
    }

    function get_criterios()
    {
        $criterios['projeto'] = $this->db->get('criterio_projeto')->result_array();
        $criterios['orientador'] = $this->db->get('criterio_orientador')->result_array();
        return $criterios;
    }

    function pontuacao_e_quantidade_de_avaliacoes($id_projeto)
    {
        $this->db->select('
            *,
            cp.pontuacao AS pontuacao_projeto,
            co.pontuacao AS pontuacao_orientador,
        ')
                 ->from('avaliacao_interna AS avi')
                 ->join('criterio_projeto AS cp', 'cp.id  = avi.FK_criterio_projeto_id', 'left')
                 ->join('criterio_orientador AS co', 'co.id  = avi.FK_criterio_orientador_id', 'left')
                 ->join("avaliador AS ava", "avi.FK_avaliador_id = ava.id", "left")
                 ->join("usuario AS usu", "ava.FK_usuario_id = usu.usu_id", "left")
                 ->where('FK_projeto_id', $id_projeto)
                 ->where("usu.teste", 0);
        $avaliacoes = $this->db->get();
        if ($avaliacoes->num_rows() == 0) 
            return false;

        // Calcula a pontuação
        $pontuacao_total = 0;
        foreach ($avaliacoes->result_array() as $avaliacao) {
            $pontuacao = 0;
            $pontuacao += (int)$avaliacao['pontuacao_projeto'];
            $pontuacao += (int)$avaliacao['pontuacao_orientador'];
            $pontuacao_total += $pontuacao;
        }

        $quantidade_avaliacoes = $avaliacoes->num_rows();
        $media_das_pontuacoes = $pontuacao_total / $quantidade_avaliacoes;
        
        $data['quantidade_de_avaliacoes'] = $quantidade_avaliacoes;
        $data['media_das_pontuacoes'] = $media_das_pontuacoes;
        return $data;
    }

        function insert($id_avaliador, $id_projeto, $id_criterio_projeto, $id_criterio_orientador)
        {
            $this->db->select("*");
            $this->db->from("avaliacao_interna");
            $this->db->where("FK_projeto_id", $id_projeto);
            $this->db->where("FK_avaliador_id", $id_avaliador);
            $query = $this->db->get()->result_array();

            $avaliacao_interna = array(
                'FK_projeto_id' => $id_projeto,
                'FK_avaliador_id' => $id_avaliador,
                'FK_criterio_projeto_id' => $id_criterio_projeto,
                'FK_criterio_orientador_id' => $id_criterio_orientador,
            );

            // Se avaliação nao existe cria uma nova
            if (!isset($query[0])) {
                $this->db->trans_start();
                $this->db->insert('avaliacao_interna', $avaliacao_interna);
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE){
                    return false;
                }
                return 'insert';
            } else {
                // Se avaliação já existe atualiza os dados
                $avaliacao_interna['id'] = $query[0]["id"];
                $this->db->trans_start();
                $this->db->replace('avaliacao_interna', $avaliacao_interna);
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE){
                    return false;
                }
                return 'update';
            }
        }

    }
?>
