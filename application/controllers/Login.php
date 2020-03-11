<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Função Login
	 * Lucas Braz Melo
	 * 07/04/2015
	 */

		public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<small class="error">* ', '</small>');
	}

	public function index()
	{

		$this->load->model('auth_model');
		$this->load->model('docente_model');

		$this->form_validation->set_rules('username', 'USUARIO', 'trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('password', 'SENHA', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="red-text right"><small>', '</small></div>');

		if ($this->form_validation->run()==TRUE):
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');
			$data['g-recaptcha-response'] = $this->input->post('g-recaptcha-response');

			if(isset($data['g-recaptcha-response'])):
				$captcha=$data['g-recaptcha-response'];
				if(!$captcha):
					$data['return'] = 'Please check the the captcha form.<br>';
				else:
					$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lfb2AUTAAAAAFv4ASnMOTt83rX2h2IuEk4usRMy&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
					$response=json_decode($response);
					if($response->success==false):
						$data['return'] = '<h2>You are spammer ! Get the @$%K out</h2><br>';
					else:
						$data['recaptcha'] = true;
					endif;
				endif;
			endif;

			$login = $data['username'];
			$senha = sha1($data['password']);

			if(isset($data['recaptcha'])):
				$rs = $this->auth_model->auth_recaptcha($login, $senha);
				if($rs):
					$this->unlock($login);
				endif;
			else:
				$rs = $this->auth_model->auth($login, $senha);
			endif;

			if(isset($rs['check'])):
				$dados['login'] = $rs['check']->usu_login;
				$dados['id_login'] = $rs['check']->usu_id;
				$docente = $this->docente_model->get_docente($rs['check']->usu_id);
				if ($rs['check']->type==2) {
					$dados['id_doc'] = $docente[0]->doc_id;
				}
				$dados['senha'] = $rs['check']->usu_senha;
				$dados['type'] = $rs['check']->type;
				//gambiarra nº01 - Autor Lucas Melo
				#$dados['fk_edicao'] = $rs['check']->fk_edicao;
				$this->session->set_userdata($dados);
				// echo "<pre>";
				// echo var_dump($dados);
				// echo "</pre>";
                $now = time();
                $start = strtotime('2020-03-15 23:59');
				switch($rs['check']->type):
					CASE '1':
						redirect('admin', 'refresh');
						break;
					CASE '2':
            //if ($now > $start) {
              //redirect('docente_resultado', 'refresh');
            //} else {
              //redirect('/login/logout/', 'refresh');
            //}
			  redirect('doc', 'refresh');
						break;
					CASE '3':
						$this->load->model('avaliador_model');
						$avaliador = $this->avaliador_model->get($dados['id_login']);
						$this->session->set_userdata('avaliador', $avaliador);
						redirect('avaliador', 'refresh');
						break;
					default:
						redirect('/login/logout/', 'refresh');
						break;
				endswitch;
			else:
				$data['return'] = $rs['return'];
				$data['recaptcha'] = @$rs['recaptcha'];
			endif;
		endif;
		$data['titulo']='Login';
		$data['tela']='login/login';
		$this->load->view('template', $data);
	}
	/* função para recuperar senha */
	public function remember(){
		//verificando form
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[4]|valid_email');

		if ($this->form_validation->run()==TRUE):

			$this->load->model('auth_model');
			$data['email'] = $this->input->post('email');
			//verificando se o email é valido
			if ($dados = $this->auth_model->exist_email($data['email'])):
				//trocando senha
				if($dados['nova_senha'] = $this->auth_model->remember($dados)):
					//enviando nova senha para o usuario
					$this->load->model('email_model');
					if( $this->email_model->remember_email($dados) ):
						$data['ok'] =  "Senha alterada com sucesso!";
					else:
						$data['retorno'] =  "Não foi possivel enviar nova senha para o usuario" ;
					endif;
				else:
					$data['retorno'] = "Não foi possivel gerar nova senha para o usuario" ;
				endif;
			else:
				$data['retorno'] ="Email não cadastrado";
			endif;
		endif;

		$data['titulo']='Esqueci a senha';
		$data['tela']='login/remember';
		$this->load->view('template', $data);
	}

	/* função para sair/logout */
	public function logout(){
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}

	public function unlock($login){
		$this->load->model('auth_model');
		$this->auth_model->unlock($login);
	}

}
