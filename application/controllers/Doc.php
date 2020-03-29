<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doc extends CI_Controller {

/**
 * Class Doc
 * Lucas Braz Melo
 * 24/04/2015
 */
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('type')=='2'):
      //redirect('docente_resultado', 'refresh');
			$this->load->model('docente_model');
			$this->form_validation->set_error_delimiters('<div class="card-panel red white-text">', '</div>');
		else:
			redirect('login/logout', 'refresh');
		endif;
	}
	public function index()
	{
		$dados['tela']='/doc/home';
		$this->load->view('template_docente', $dados);
	}
	public function dados_cadastro()
	{
		$dados['docente'] = $this->docente_model->get_docente($this->session->userdata('id_login'));
		$dados['capes1'] = $this->docente_model->get_area_capes($dados['docente']['0']->doc_capes1);
		$dados['capes2'] = $this->docente_model->get_area_capes($dados['docente']['0']->doc_capes2);
		$dados['tela']='/doc/dados_cadastro';
		$this->load->view('template_docente', $dados);
	}
	public function projeto()
	{
		$dados['projetos'] = $this->docente_model->get_projetos($this->session->userdata('id_login'));
		$dados['planos_1'] = $this->docente_model->get_plano($this->session->userdata('id_login'), '1');
		$dados['planos_2'] = $this->docente_model->get_plano($this->session->userdata('id_login'), '2');
		$dados['tela']='/doc/projeto';
		$this->load->view('template_docente', $dados);
	}
	public function anexos()
	{
		$dados['anexos'] = $this->docente_model->get_anexos($this->session->userdata('id_login'));

		$dados['tela']='/doc/anexos';
		$this->load->view('template_docente', $dados);
	}
	public function plano_trabalho()
	{
		$dados['planos'] = $this->docente_model->get_plano($this->session->userdata('id_login'), '1');

		$dados['tela']='/doc/plano_trabalho';
		$this->load->view('template_docente', $dados);
	}
	public function plano_trabalho_2()
	{
		$dados['planos2'] = $this->docente_model->get_plano($this->session->userdata('id_login'), '2');

		$dados['tela']='/doc/plano_trabalho_2';
		$this->load->view('template_docente', $dados);
	}
	public function plano_trabalho2()
	{
		// Por data aqui
		//
		$now = time();
		$end = strtotime('2020-05-11 23:59');

		// Pode cadastrar
		// if(true)
		if($now < $end)
		{
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');
			#echo "projeto2<br>";
			$config['upload_path'] = './planos/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']	= '10000';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces']= TRUE;
			#echo "config<br>";

			$dados['error'] = ' ';

			$this->form_validation->set_rules('userfile', 'Arquivo', 'required');
			$this->form_validation->set_rules('ordem', 'Ordem', 'required');
			$order = $this->input->post('ordem', TRUE);
			#echo "set_rules<br>";
			$rs = null;
			if ($this->form_validation->run() == FALSE) {
				$dados = $this->up_files('userfile', $config);

				if (isset($dados['upload_data'])) {
					$dados['ordem'] = $order;
					$dados['titulo'] = $this->input->post('titulo',TRUE);
					#echo var_dump($dados['upload_data']);
					$this->load->model('cadastro_model');
					$rs = $this->cadastro_model->cadastrar_plano($dados);
				}
			}
			if ($rs !== null) {
				$this->session->set_flashdata('resPlan'.$order, '<div class="customCard success">Cadastro realizado com sucesso!</div>');
				redirect('doc/projeto','refresh');
			} else {
				$this->session->set_flashdata('resPlan'.$order, '<div class="customCard error">Falha no cadastro!</div>');
				redirect('doc/projeto','refresh');
			}
			/* Caso o tempo para submissão esteja finalizado */
		} else {
			$dados['tela'] = '/home/cadastro/encerrado';
			$this->load->view('template_docente', $dados);
		}
	}
	public function enviar_projeto()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		#echo "projeto2<br>";
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '10000';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']= TRUE;

		#echo "config<br>";

		$dados['error'] = ' ';

		$this->form_validation->set_rules('titulo', 'Titulo', 'required|min_length[3]');
		//$this->form_validation->set_rules('userfile', 'Arquivo', 'required');
		if (empty($_FILES['userfile']['name'])) {
			$this->form_validation->set_rules('userfile','Arquivo','required');
		}

		$rs = null;
		if ($this->form_validation->run()) {
			$dados = $this->up_files('userfile', $config);
			if (isset($dados['upload_data'])) {
				$dados['titulo'] = $this->input->post('titulo',TRUE);
				$this->load->model('cadastro_model');
				$rs = $this->cadastro_model->cadastrar_projeto($dados);
			}
		}
		if ($rs !== null) {
			$this->session->set_flashdata('resProj', '<div class="customCard success">Cadastro realizado com sucesso!</div>');
			redirect('doc/projeto','refresh');
		} else {
			$this->session->set_flashdata('resProj', '<div class="customCard error">Falha no cadastro!</div>');
			redirect('doc/projeto','refresh');
		}

		#echo "load<br>";
		$dados['tela']='/doc/projeto';
		$this->load->view('template_docente', $dados);
		// redirect('doc/projeto','refresh');
	}

	public function anexos2()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		#echo "projeto2<br>";
		$config['upload_path'] = './anexos/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '10000';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']= TRUE;

		#echo "config<br>";

		$dados['error'] = ' ';

		$this->form_validation->set_rules('titulo', 'Titulo', 'required|min_legth[3]');
		$this->form_validation->set_rules('userfile', 'Arquivo', 'required');
		#echo "set_rules<br>";

		if ($this->form_validation->run() == FALSE):
			#echo "form_validation<br>";

			$dados = $this->up_files('userfile', $config);

			if (isset($dados['upload_data'])):
				$dados['titulo'] = $this->input->post('titulo',TRUE);
				#echo var_dump($dados['upload_data']);
				$this->load->model('cadastro_model');
				$rs = $this->cadastro_model->cadastrar_anexo($dados);
				if ($rs):
					$dados['data'] = "<h3>Cadastro realizado com sucesso!</h3>";
				endif;
			endif;
		endif;

		#echo "load<br>";
		$dados['tela']='/doc/anexos2';
		$this->load->view('template_docente', $dados);
	}

	function up_files($input, $config)
	{
		$this->load->library('upload', $config);
		#echo "up_files<br>";
		if ( ! $this->upload->do_upload($input))
		{
			$dados = array('error' => $this->upload->display_errors());
			return $dados;
		}
		else
		{
			$dados = array('upload_data' => $this->upload->data());
			return $dados;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
