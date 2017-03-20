<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class docente_resultado extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('type')=='2') {
            $this->load->model('docente_model');
            $this->form_validation->set_error_delimiters('<div class="card-panel red white-text">', '</div>');
        } else {
            redirect('login/logout', 'refresh');
        }
    }

    function index()
    {
        $this->load->model('docente_model');
        $this->load->model('avaliacao_interna_model');
        $this->load->model('avaliacao_externa_model');
        $id_docente = $this->session->userdata('id_doc');
        $id_projeto = $this->docente_model->id_do_ultimo_projeto($id_docente);
        $data['projeto'] = $this->docente_model->projeto_com_docente_e_planos($id_projeto);
        $data['interna'] = $this->avaliacao_interna_model->avaliacoes_com_avaliador_criterios_notas_e_media($id_projeto);
        $data['externa'] = $this->avaliacao_externa_model->avaliacoes_com_avaliador_criterios_notas_e_media($id_projeto);
        $media_interna = $data['interna']['media'];
        $media_externa = $data['externa']['media'];

        $data['nota_final'] = ($media_externa + $media_interna) / 2;
        $data['avaliacoes']['nota_final'] = ($media_externa + $media_interna) / 2;
        $data['tela']='/doc/detalhar_avaliacao';
        $this->load->view('template_docente_resultado', $data);
    }

}
