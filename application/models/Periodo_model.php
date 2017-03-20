<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodo_model extends CI_Model
{
    public function getDataControle()
    {
        return $this->db->get('periodo')->result();
    }


}

/* End of file periodo_model.php */
/* Location: ./application/models/periodo_model.php */