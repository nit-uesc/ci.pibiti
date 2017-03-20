<?php
class avaliacao_externa_model extends CI_Model{

    function get($id)
    {
        $this->db->select("*")
                 ->from("avaliacao_externa")
                 ->where("FK_projeto_id", $id);
        $query = $this->db->get();

        if ($query->num_rows == 0)
            return false;

        return $query->result_array();
    }

    function pontuacao_e_quantidade_de_avaliacoes($id_projeto)
    {
        // Coleta todas as avaliações do projeto
        $this->db->select("*, ave.id AS id_avaliacao")
                 ->from("avaliacao_externa AS ave")
                 ->join("avaliador AS ava", "ave.FK_avaliador_id = ava.id", "left")
                 ->join("usuario AS usu", "ava.FK_usuario_id = usu.usu_id", "left")
                 ->where("FK_projeto_id", $id_projeto)
                 ->where("usu.teste", 0);
        $avaliacoes = $this->db->get();
        if ($avaliacoes->num_rows() == 0)
			return false;

        // Calcula a pontuação
        $pontuacao_total = 0;
        $criterios = null;
        foreach ($avaliacoes->result_array() as $avaliacao) {

            // Coleta os critérios de cada avaliação
            $this->db->select("*")
                     ->from("avaliacao_externa_has_criterio_externo")
                     ->where("FK_avaliacao_externa_id", $avaliacao["id_avaliacao"]);
            $criterios = $this->db->get();
            if ($criterios->num_rows() == 0)
                continue;

            // Soma a nota de cada critério
            $pontuacao = 0;
            foreach ($criterios->result_array() as $criterio) {
                $pontuacao += (float)$criterio["pontuacao"];
            }

            $pontuacao_total += $pontuacao;
        }

        $quantidade_avaliacoes = $avaliacoes->num_rows();
        $media_das_pontuacoes = $pontuacao_total / $quantidade_avaliacoes;
        $data['quantidade_de_avaliacoes'] = $quantidade_avaliacoes;
        $data['media_das_pontuacoes'] = $media_das_pontuacoes;
        return $data;
    }

    function coleta_observacoes($id_avaliador = NULL)
    {
        $this->db->select("*");
        $this->db->from("observacao");
        if (isset($id_avaliador))
          $this->db->where("observacao.FK_avaliador_id", $id_avaliador);

        $observacoes = $this->db->get()->result_array();
        return $observacoes;
    }

    function get_all($id_avaliador = NULL)
    {
        $this->db->select("
            FK_projeto_id,
            FK_criterio_externo_id,
            pontuacao,
        ");

        $this->db->from("avaliacao_externa");
        $this->db->join(
            "avaliacao_externa_has_criterio_externo",
            "avaliacao_externa_has_criterio_externo.FK_avaliacao_externa_id = avaliacao_externa.id",
            "left"
        );
        if (isset($id_avaliador))
          $this->db->where("avaliacao_externa.FK_avaliador_id", $id_avaliador);
        $avaliacao_externa = $this->db->get()->result_array();

        return $avaliacao_externa;
    }

    private function cria_ou_atualiza_observacao($id_projeto, $id_avaliador, $observacoes)
    {
        $this->db->select("*");
        $this->db->from("observacao");
        $this->db->where("FK_projeto_id", $id_projeto);
        $this->db->where("FK_avaliador_id", $id_avaliador);
        $query = $this->db->get()->result_array();

        $data = array(
            'FK_projeto_id' => $id_projeto,
            'FK_avaliador_id' => $id_avaliador,
            'texto' => $observacoes
        );

        // Se avaliação nao existe cria uma nova
        if (!isset($query[0])) {
            $this->db->trans_start();
            $this->db->insert("observacao", $data);
            $this->db->trans_complete();
            return $this->db->trans_status();
        } else {
            // Se já existe atualiza
            $data['id'] = $query[0]["id"];
            $this->db->trans_start();
            $this->db->replace("observacao", $data);
            $this->db->trans_complete();
            return $this->db->trans_status();
        }
    }

    function insert($id_avaliador, $id_projeto, $criterios, $observacoes)
    {
        $this->db->select("*");
        $this->db->from("avaliacao_externa");
        $this->db->where("FK_projeto_id", $id_projeto);
        $this->db->where("FK_avaliador_id", $id_avaliador);
        $query = $this->db->get()->result_array();

        $avaliacao_externa = array(
            "FK_projeto_id" => $id_projeto,
            "FK_avaliador_id" => $id_avaliador
        );

        // Se avaliação nao existe cria uma nova
        if (!isset($query[0])) {
            $this->db->insert("avaliacao_externa", $avaliacao_externa);
            $id = $this->db->insert_id();

            foreach ($criterios as $criterio) {
                $this->db->trans_start();
                $criterio["FK_avaliacao_externa_id"] = $id;
                $this->db->insert("avaliacao_externa_has_criterio_externo", $criterio);
                $this->db->trans_complete();
            }

            if ($this->db->trans_status() === FALSE)
                return false;

            if ($this->cria_ou_atualiza_observacao($id_projeto, $id_avaliador, $observacoes) == FALSE)
                return false;

            return "insert";
        } else {
            // Se avaliação já existe atualiza os dados
            $id_avaliacao_externa = $query[0]["id"];
            $this->db->select("id, pontuacao");
            $this->db->from("avaliacao_externa_has_criterio_externo");
            $this->db->where("FK_avaliacao_externa_id", $id_avaliacao_externa);
            $avaliacao_externa_has_criterio_externo = $this->db->get()->result_array();

            for ($i = 0; $i < sizeof($avaliacao_externa_has_criterio_externo); $i++) {
                if ( !isset($criterios[$i]["pontuacao"]) ||
                    $avaliacao_externa_has_criterio_externo[$i]["pontuacao"] == $criterios[$i]["pontuacao"]
                )
                {
                    continue;
                }
                $this->db->trans_start();
                $criterios[$i]["id"] = $avaliacao_externa_has_criterio_externo[$i]["id"];
                $criterios[$i]["FK_avaliacao_externa_id"] = $id_avaliacao_externa;
                $this->db->replace("avaliacao_externa_has_criterio_externo", $criterios[$i]);
                $this->db->trans_complete();
            }

            if ($this->db->trans_status() === FALSE)
                return false;

            if ($this->cria_ou_atualiza_observacao($id_projeto, $id_avaliador, $observacoes) == FALSE)
                return false;

            return "update";
        }
    }

    function avaliacoes_com_avaliador_criterios_notas_e_media($id_projeto)
    {

        // Coleta as avaliacoes externas
        $this->db->select("
            avaliacao_externa.id AS id,
            avaliacao_externa.FK_projeto_id AS FK_projeto_id,
            avaliacao_externa.FK_avaliador_id AS FK_avaliador_id,
            docente.doc_nome AS avaliador,
        ");
        $this->db->from("avaliacao_externa");
        $this->db->join("avaliador", "avaliador.id = avaliacao_externa.FK_avaliador_id", "left");
        $this->db->join("docente", "docente.fk_usu_id = avaliador.FK_usuario_id", "left");
        $this->db->join("usuario AS usu", "avaliador.fk_usuario_id = usu.usu_id", "left");
        $this->db->where("FK_projeto_id", $id_projeto);
        $this->db->where("usu.teste", 0);
        $avaliacoes = $this->db->get();
        $quantidade_de_avaliacoes = $avaliacoes->num_rows();
        if ($quantidade_de_avaliacoes == 0)
            return null;

        $avaliacoes = $avaliacoes->result_array();
        $soma_das_notas = 0;

        // Para cada avaliação, coleta os critérios avaliados, a nota atribuída e as observacoes
        foreach ($avaliacoes as &$avaliacao) {
            $this->db->select("
                avaliacao_externa_has_criterio_externo.pontuacao AS pontuacao,
                criterio_externo.descricao AS descricao,
            ");
            $this->db->from("avaliacao_externa_has_criterio_externo");
            $this->db->join("criterio_externo", "criterio_externo.id = avaliacao_externa_has_criterio_externo.FK_criterio_externo_id", "left");
            $this->db->where("FK_avaliacao_externa_id", $avaliacao["id"]);
            $criterios = $this->db->get();
            if ($criterios->num_rows() == 0)
                continue;

            $criterios = $criterios->result_array();

            // Calcula a nota total
            $nota = 0;
            foreach ($criterios as $criterio) {
                $nota += $criterio['pontuacao'];
            }

            $soma_das_notas += $nota;

            $this->db->select("texto");
            $this->db->from("observacao");
            $this->db->where("FK_projeto_id", $id_projeto);
            $this->db->where("FK_avaliador_id", $avaliacao["FK_avaliador_id"]);
            $observacao = $this->db->get();
            if ($observacao->num_rows() == 1)
                $avaliacao['observacao'] = $observacao->result_array()[0]['texto'];

            $avaliacao['criterios'] = $criterios;
            $avaliacao['nota'] = $nota;
        }
        $media = $soma_das_notas / $quantidade_de_avaliacoes;

        $data['avaliacoes'] = $avaliacoes;
        $data['media'] = $media;
        return $data;
    }
}
?>
