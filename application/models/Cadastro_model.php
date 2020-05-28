<?php
class Cadastro_model extends CI_Model {

	function cadastrar_inscricao($dados = NULL, $user = NULL) {

		if ($dados != NULL) :
			$this -> db -> trans_start();
			$this -> db -> insert('usuario', $user);
			$dados['fk_usu_id'] = $this -> db -> insert_id();
			$this -> db -> insert('docente', $dados);
			$this -> db -> trans_complete();

			if ($this -> db -> trans_status() === FALSE) :
				return false;
			else :
				return true;
			endif;
		else :
			return true;
		endif;
	}

	function cadastrar_projeto($dados) {

		$dados = array('proj_titulo' => $dados['titulo'], 'proj_arquivo' => $dados['upload_data']['raw_name'] . $dados['upload_data']['file_ext'], 'fk_doc_id' => $this -> session -> userdata('id_doc'), 'orig_name' => $dados['upload_data']['orig_name'], 'raw_name' => $dados['upload_data']['raw_name'], 'file_ext' => $dados['upload_data']['file_ext']);
		$this -> db -> trans_start();
		$this -> db -> insert('projeto', $dados);
		$this -> db -> trans_complete();

        if ($this -> db -> trans_status() === FALSE) {
			return false;
        } else {
			return true;
        }
	}

	function cadastrar_plano($dados) {
		$dados = array('plano_titulo' => $dados['titulo'], 'plano_arquivo' => $dados['upload_data']['raw_name'] . $dados['upload_data']['file_ext'], 'plano_ordem' => $dados['ordem'], 'fk_doc_id' => $this -> session -> userdata('id_doc'), 'orig_name' => $dados['upload_data']['orig_name'], 'raw_name' => $dados['upload_data']['raw_name'], 'file_ext' => $dados['upload_data']['file_ext']);
		$this -> db -> trans_start();
		$this -> db -> insert('plano_trabalho', $dados);
		$this -> db -> trans_complete();

		if ($this -> db -> trans_status() === FALSE) :
			return false;
		else :
			return true;
		endif;

	}
	function cadastrar_anexo($dados) {
		$dados = array('anexo_titulo' => $dados['titulo'], 'anexo_arquivo' => $dados['upload_data']['raw_name'] . $dados['upload_data']['file_ext'], 'fk_doc_id' => $this -> session -> userdata('id_doc'), 'orig_name' => $dados['upload_data']['orig_name'], 'raw_name' => $dados['upload_data']['raw_name'], 'file_ext' => $dados['upload_data']['file_ext']);
		$this -> db -> trans_start();
		$this -> db -> insert('anexos', $dados);
		$this -> db -> trans_complete();

		if ($this -> db -> trans_status() === FALSE) :
			return false;
		else :
			return true;
		endif;

	}

	public function get_tipos_avaliador(){
		return $this->db->get('tipo_avaliador')->result();
	}

	// mudar pra pegar o nome de docente
	public function get_avaliadores()
	{
		$this->db->join('avaliador', 'avaliador.FK_usuario_id = usuario.usu_id', 'left');
		$this->db->join('tipo_avaliador', 'tipo_avaliador.id = avaliador.FK_tipo_avaliador_id', 'left');
		$this->db->join('docente', 'docente.fk_usu_id = usuario.usu_id', 'left');
		$this->db->where('usuario.type', 3);
		return $this->db->get('usuario')->result();
	}

	public function cadastro_avaliador($avaliador=NULL)
	{
		if($avaliador!=NULL) {
			$usuario['usu_login'] = $avaliador['email'];
			$usuario['usu_senha'] = $avaliador['senha'];
			$usuario['type'] 	  = 3;
			$this->db->insert('usuario', $usuario);

			$id_usuario = $this->db->insert_id();

			$aval['FK_usuario_id'] 	   = $id_usuario;
			$aval['FK_tipo_avaliador_id'] = $avaliador['tipo_avaliador'];
			$this->db->insert('avaliador', $aval);

			$docente['fk_usu_id']  = $id_usuario;
			$docente['doc_nome']  = $avaliador['nome'];
			$docente['doc_email'] = $avaliador['email'];
			$this->db->insert('docente', $docente);

			return true;
		} else {
			return false;
		}

	}
}
?>
