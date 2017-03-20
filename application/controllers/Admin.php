<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

/**
 * Class Admin
 * Lucas Braz Melo
 * 24/04/2015
 */
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('type')=='1'):
			$this->load->model('docente_model');
		else:
			redirect('login/logout', 'refresh');
		endif;
	}
	/**
	 * função index; exibe as informações dos docentes cadastrados
	 * @return CI_DB_object $docentes lista de docentes cadastrados na tabela docente
	 * @return String $tela retorna uma string contendo o caminho da view do conteudo
	 */
	public function index()
	{
		$dados['docentes'] = $this->docente_model->get_all_docentes();
		$dados['titulo']='Docentes';
		$dados['tela']='/admin/home';
		$this->load->view('template_admin', $dados);
	}
	public function dados_cadastro()
	{
		$dados['docentes'] = $this->docente_model->get_all_docentes();
		$dados['tela']='/admin/dados_cadastro';
		$this->load->view('template_admin', $dados);
	}
	public function docente_info()
	{
		$id = $this->uri->segment(3);
		#echo $id;
		#echo $this->db->last_query();
		$dados['docente'] = $this->docente_model->get_docente_admin($id);
		$dados['capes1'] = $this->docente_model->get_area_capes($dados['docente'][0]->doc_capes1);
		$dados['capes2'] = $this->docente_model->get_area_capes($dados['docente'][0]->doc_capes2);

		$dados['tela']='/admin/docente_info';
		$this->load->view('template_admin', $dados);
	}

	public function projeto()
	{
		$dados['projetos'] = $this->docente_model->get_all_projetos();
		$dados['tela']='/admin/projeto';
		$this->load->view('template_admin', $dados);
	}
	public function plano_trabalho()
	{
		$dados['planos'] = $this->docente_model->get_all_planos();
		$dados['tela']='/admin/plano_trabalho';
		$this->load->view('template_admin', $dados);
	}

	public function cadastro_avaliador()
	{
		$this->load->model('cadastro_model');
		$this->load->model('email_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('string');
		$this->form_validation->set_error_delimiters('<p class="red-text">* ', '</p>');

		$this->form_validation->set_rules('nome', 'NOME', 'trim|required|min_lenght[10]');
		$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email|is_unique[usuario.usu_login]');
		$this->form_validation->set_rules('tipo_avaliador', 'TIPO AVALIDOR', 'required|numeric');

		if($this->form_validation->run() == TRUE):

			$password = random_string('numeric', 8);

			$avaliador['nome']  = $this->input->post('nome');
			$avaliador['email'] = $this->input->post('email');
			$avaliador['senha'] = sha1($password);
			$avaliador['tipo_avaliador'] = $this->input->post('tipo_avaliador');

			if($this->cadastro_model->cadastro_avaliador($avaliador)):

				$email_data['email'] 	= $avaliador['email'];
				$email_data['assunto'] 	= 'AVALIADOR PIBITI/UESC 2016';
				$email_data['mensagem'] = "

					Olá, ".$avaliador['nome']."!
					<br><br>
					Você foi cadastrado como avaliador no PIBITI 2016.
					<br><br>
					Segue abaixo os seus dados de acesso:
					<br>
					Usuário: ".$avaliador['email']."
					<br>
					Senha: ".$password."
					<br><br>
					Para fazer login na plataforma, clique no link a seguir: <a href='".base_url('login')."'>".base_url('login')."</a>
					<br>
					Atenciosamente,
					<br>
					PIBITI 2016
				";

				if($this->email_model->sistema_email($email_data)):
					$data['success'] = 'Avaliador cadastrado com sucesso! :)';
				else:
					$data['error'] = 'Avaliador cadastrado, mas o email com dados de acesso NÃO pôde ser enviado. Contate o administrador do sistema.';
				endif;
			else:
				$data['error'] = 'Oops... Ocorreu um erro ao adicionar o avaliador. :X';
			endif;

		endif;

		$data['avaliadores'] = $this->cadastro_model->get_avaliadores();
		$data['tipo_avaliador'] = $this->cadastro_model->get_tipos_avaliador();
		$data['tela'] = '/admin/cadastro_avaliador';
		$this->load->view('template_admin', $data);
	}

    public function resultados()
    {
        $this->load->model('resultado_model');
        $this->load->model('avaliador_model');
        $data['resultados'] = $this->resultado_model->projetos_com_pontuacao_e_quantidade_de_avaliacoes();
        $data['quantidade_de_avaliadores']['interno'] = 0 + $this->avaliador_model->quantidade_de_avaliadores_internos();
        $data['quantidade_de_avaliadores']['externo'] = 0 + $this->avaliador_model->quantidade_de_avaliadores_externos();
        $data['tela'] = '/admin/resultados';
        $this->load->view('template_admin', $data);
    }

    public function detalhar_avaliacao($id_projeto = NULL)
    {
        $this->load->model('docente_model');
        $this->load->model('avaliacao_interna_model');
        $this->load->model('avaliacao_externa_model');
        $data['projeto'] = $this->docente_model->projeto_com_docente_e_planos($id_projeto);
        $data['interna'] = $this->avaliacao_interna_model->avaliacoes_com_avaliador_criterios_notas_e_media($id_projeto);
        $data['externa'] = $this->avaliacao_externa_model->avaliacoes_com_avaliador_criterios_notas_e_media($id_projeto);
        $media_interna = $data['interna']['media'];
        $media_externa = $data['externa']['media'];
        $data['nota_final'] = ($media_externa + $media_interna) / 2;
        $data['tela'] = '/admin/detalhar_avaliacao';
        // echo '<script>console.log('.json_encode($data).')</script>';
        $this->load->view('template_admin', $data);
    }

    public function painel_controle()
    {
    	$this->load->library('periodo');

        $data['tela'] = 'admin/painel_controle';
        $this->load->view('template_admin', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
