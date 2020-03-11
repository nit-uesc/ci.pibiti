<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Função Home
	 * Lucas Braz Melo
	 * 07/04/
	 */
	public function index()
	{
		$dados['tela']='/home/home';
		$dados['titulo']='Home';
		$this->load->view('template', $dados);
	}
	public function cadastro_sucesso(){
		$dados['tela']='/home/cadastro/cadastro_sucesso';
		$this->load->view('template', $dados);
	}
	public function cadastro()
	{
		$now = time();
		$end = strtotime('');

		// Pode cadastrar
		if($now < $end)
		// if(true)
		{
			$dados['tela']='/home/cadastro';
			$this->load->helper('security');


			$this->form_validation->set_error_delimiters('<div class="card-panel red white-text">', '</div>');
			//Validação
			$this->form_validation->set_rules('doc_nome', 'Nome', 'trim|required|max_length[100]|ucwords|is_unique[docente.doc_nome]');
			$this->form_validation->set_rules('doc_email', 'Email', 'trim|required|max_length[50]|valid_email|is_unique[docente.doc_email]|matches[doc_confirmar_email]');
			$this->form_validation->set_rules('doc_confirmar_email', 'Confirmar email', 'trim|required|max_length[50]|valid_email|is_unique[docente.doc_email]|matches[doc_email]');
			$this->form_validation->set_rules('doc_cpf', 'CPF', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('doc_rg', 'RG', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('doc_telefone', 'Telefone', 'trim|required|max_length[100]');

			$this->form_validation->set_rules('fk_dep_id', 'Departamento', 'trim|required|max_length[2]');
			$this->form_validation->set_rules('doc_cargo', 'Cargo', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('link_lattes', 'Lattes', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('doc_regime', 'Regime', 'trim|required');
			$this->form_validation->set_rules('doc_titulacao', 'Titulacao', 'trim|required');

			$this->form_validation->set_rules('doc_grupo_pesq', 'Grupo de pesquisa cadastrado no Diretório do CNPq', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('doc_cnpq', 'Área de atuação segundo o CNPq', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('fk_garea_id', 'Grande Área de conhecimento', 'trim|required');
			$this->form_validation->set_rules('doc_capes1', 'Áreas de avaliação do periódico segundo WebQualis', 'trim|required');
			$this->form_validation->set_rules('doc_capes2', 'Áreas de avaliação do periódico segundo WebQualis', 'trim|required');

			$this->form_validation->set_rules('usu_login', 'Login', 'trim|max_length[100]|required|is_unique[usuario.usu_login]');
			$this->form_validation->set_rules('usu_senha', 'Senha', 'trim|max_length[100]|required|matches[confirmar_senha]');
			$this->form_validation->set_rules('confirmar_senha', 'Confirmação da senha', 'trim|required|max_length[100]|matches[usu_senha]');

			//mensagens de erro
			$this->form_validation->set_message('required', 'Campo obrigatório');
			$this->form_validation->set_message('valid_email', 'Digite um email válido');
			$this->form_validation->set_message('is_unique[docente.doc_email]', 'Email já cadastrado');
			$this->form_validation->set_message('is_unique[docente.doc_nome]', 'Nome já cadastrado');

			//form-validation
			if($this->form_validation->run() == TRUE){

				$docente['doc_nome'] = $this->input->post('doc_nome', TRUE);
				$docente['doc_email'] = $this->input->post('doc_email', TRUE);
				$docente['doc_cpf'] = $this->input->post('doc_cpf', TRUE);
				$docente['doc_rg'] = $this->input->post('doc_rg', TRUE);
				$docente['doc_telefone'] = $this->input->post('doc_telefone', TRUE);
				$docente['fk_dep_id'] = $this->input->post('fk_dep_id', TRUE);
				$docente['doc_cargo'] = $this->input->post('doc_cargo', TRUE);
				$docente['link_lattes'] = $this->input->post('link_lattes', TRUE);
				$docente['doc_regime'] = $this->input->post('doc_regime', TRUE);
				$docente['doc_titulacao'] = $this->input->post('doc_titulacao', TRUE);
				$docente['doc_grupo_pesq'] = $this->input->post('doc_grupo_pesq', TRUE);
				$docente['doc_cnpq'] = $this->input->post('doc_cnpq', TRUE);
				$docente['fk_garea_id'] = $this->input->post('fk_garea_id', TRUE);
				$docente['doc_capes1'] = $this->input->post('doc_capes1', TRUE);
				$docente['doc_capes2'] = $this->input->post('doc_capes2', TRUE);

				$user['usu_login'] = $this->input->post('usu_login', TRUE);
				$user['usu_senha'] = sha1($this->input->post('usu_senha', TRUE));

				#var_dump($dados);
				$this->load->model('cadastro_model');

				$return = $this->cadastro_model->cadastrar_inscricao($docente, $user);

				if($return){

					$dados['tela']='/home/cadastro/cadastro_sucesso';

					$this->load->model('email_model');
					$return = $this->email_model->cadastro_email($docente);

				}else{
					$dados['tela']='/home/cadastro/cadastro_falho';
				}
			}
		}
		else
		{
			$dados['tela'] = '/home/cadastro/encerrado';
		}

		$dados['titulo']='Cadastro';
		$this->load->view('template', $dados);

	}


	public function cronograma()
	{
		$dados['titulo']='Cronograma';
		$dados['tela']='/home/cronograma';
		$this->load->view('template', $dados);
	}
	public function edital()
	{
		$dados['titulo']='Edital';
		$dados['tela']='/home/edital';
		$this->load->view('template', $dados);
	}
	public function resultados()
	{
		$dados['titulo']='Resultados';
		$dados['tela']='/home/resultados';
		$this->load->view('template', $dados);
	}
	public function resultados2015()
	{
		$dados['titulo']='Resultados';
		$dados['tela']='/home/resultados2015';
		$this->load->view('template', $dados);
	}
	public function resultados2018()
	{
		$dados['titulo']='Resultados';
		$dados['tela']='/home/resultados2018';
		$this->load->view('template', $dados);
	}
	/*Nova função criada para apontar para os resultados de 2019*/
	public function resultados2019()
	{
		$dados['titulo']='Resultados';
		$dados['tela']='/home/resultados2018';
		$this->load->view('template', $dados);
	}

	public function relatorios()
	{
		$dados['titulo']='Relatórios';
		$dados['tela']='/home/relatorios';
		$this->load->view('template', $dados);
	}
	private function sucess()
	{
		$dados['titulo']='Sucesso';
		$dados['tela']='/home/cadastro/cadastro_sucesso';
		$this->load->view('template', $dados);
	}
	private function fail()
	{
		$dados['titulo']='Ops...';
		$dados['tela']='/home/cadastro/cadastro_falho';
		$this->load->view('template', $dados);
	}
	public function email()
	{
		$this->load->model('email_model');

		$dados['email']='lucasbrazmelo@gmail.com';
		$dados['mensagem']='teste';
		$dados['assunto']='loren ipsun';

		if ($this->email_model->sistema_email($dados)) {
			echo 'enviou';
		}else{
			echo 'não enviou';
		}
	}

}
