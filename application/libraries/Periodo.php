<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodo
{
    public function submissaoEmAndamento()
    {
        $CI =& get_instance();
        $CI->load->model('periodo_model');
        $datas = $CI->periodo_model->getDataControle();

        $horaInicial = strtotime($datas[0]->inicio_submissao);
        $horaAtual = time();
        $horaFinal = strtotime($datas[0]->fim_submissao);

        if(($horaAtual > $horaInicial) && ($horaAtual < $horaFinal)):
            return true;
        else:
            return false;
        endif;
    }

    public function avaliacaoEmAndamento()
    {
        $CI =& get_instance();
        $CI->load->model('periodo_model');
        $datas = $CI->periodo_model->getDataControle();

        $horaInicial = strtotime($datas[0]->inicio_avaliacao);
        $horaAtual = time();
        $horaFinal = strtotime($datas[0]->fim_avaliacao);

        if(($horaAtual > $horaInicial) && ($horaAtual < $horaFinal)):
            return true;
        else:
            return false;
        endif;
    }

    public function resultadoDisponivel()
    {
        $CI =& get_instance();
        $CI->load->model('periodo_model');
        $datas = $CI->periodo_model->getDataControle();

        // $horaInicial = strtotime($datas[0]->inicio_avaliacao);
        $horaAtual = time();
        $horaFinal = strtotime($datas[0]->inicio_resultado);

        if($horaAtual > $horaFinal):
            return true;
        else:
            return false;
        endif;
    }


}

/* End of file controle.php */
/* Location: ./application/libraries/controle.php */
