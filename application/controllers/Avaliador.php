
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avaliador extends CI_Controller {

/**
 * Class Admin
 * Lucas Braz Melo
 * 24/04/2015
 */
	private $id_usuario;
	private $id_avaliador;

	public function __construct()
	{
		parent::__construct();
    //redirect('login/logout', 'refresh');
		if ($this->session->userdata('type')=='3') {
			$this->load->model('docente_model');
			$this->load->model('avaliacao_interna_model');
			$this->load->model('avaliacao_externa_model');
			$this->load->model('avaliador_model');
			$this->id_usuario = $this->session->userdata('id_login');
			$this->id_avaliador = $this->avaliador_model->get_id($this->id_usuario);
		} else {
			redirect('login/logout', 'refresh');
		}
	}
	/**
	 * função index; exibe as informações dos docentes cadastrados
	 * @return CI_DB_object $docentes lista de docentes cadastrados na tabela docente
	 * @return String $tela retorna uma string contendo o caminho da view do conteudo
	 */
	public function index()
	{
		$tipo_avaliador = $this->session->userdata('avaliador')['FK_tipo_avaliador_id'];
		if ((int)$tipo_avaliador == 1) {
			//Avaliador interno
			$this->projeto();
		} else {
			//Avaliador externo
			$this->plano_trabalho();
		}
	}
	public function dados_cadastro()
	{
		$dados['docentes'] = $this->docente_model->get_all_docentes();
		$dados['tela']='/avaliador/dados_cadastro';
		$this->load->view('template_avaliador', $dados);
	}
	public function docente_info()
	{
		$id = $this->uri->segment(3);
		#echo $id;
		#echo $this->db->last_query();
		$dados['docente'] = $this->docente_model->get_docente_admin($id);
		$dados['capes1'] = $this->docente_model->get_area_capes($dados['docente'][0]->doc_capes1);
		$dados['capes2'] = $this->docente_model->get_area_capes($dados['docente'][0]->doc_capes2);

		$dados['tela']='/avaliador/docente_info';
		$this->load->view('template_avaliador', $dados);
	}
	public function projeto()
	{
		$dados['projetos'] = $this->docente_model->get_all_projetos()->result();
		$dados['avaliacoes'] = $this->avaliacao_interna_model->get_all($this->session->userdata('id_login'));

		$dados['tela']='/avaliador/projeto';
		$this->load->view('template_avaliador', $dados);
	}
	public function plano_trabalho()
	{
		$dados['quantidade_projetos'] = $this->docente_model->get_all_projetos()->num_rows();
		$dados['planos'] = $this->docente_model->get_all_projetos_planos()->result();
		$dados['tela']='/avaliador/plano_trabalho';
		$this->load->view('template_avaliador', $dados);
	}

	public function get_all()
	{
		echo json_encode($this->avaliacao_interna_model->get_all($this->id_avaliador));
	}

	public function get_criterios()
	{
		echo json_encode($this->avaliacao_interna_model->get_criterios());
	}
	public function avaliar()
	{
		$data = $this->input->post(NULL, TRUE);
		$data['id_avaliador'] = $this->id_avaliador;
		$query = $this->avaliacao_interna_model->insert(
			$data['id_avaliador'],
			$data['idProjeto'],
			$data['idCriterioProjeto'],
			$data['idCriterioOrientador']
		);
		echo json_encode($query);
	}

	public function get_all_externo()
	{
    $data['avaliacoes'] = $this->avaliacao_externa_model->get_all($this->id_avaliador);
    $data['observacoes'] = $this->avaliacao_externa_model->coleta_observacoes($this->id_avaliador);
		echo json_encode($data);
	}

	public function avaliar_externo()
	{
		$data = $this->input->post(NULL, TRUE);
		$data['id_avaliador'] = $this->id_avaliador;
        $query = $this->avaliacao_externa_model->insert(
            $data['id_avaliador'],
            $data['idProjeto'],
            $data['criterios'],
            $data['observacoes']
        );
		echo json_encode($query);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
