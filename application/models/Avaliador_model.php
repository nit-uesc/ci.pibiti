<?php
class avaliador_model extends CI_Model{

    function get_id($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('avaliador');
        $this->db->where('avaliador.FK_usuario_id', $id_usuario);

        $query = $this->db->get();

        if ($query->num_rows() == 1){
            return $query->result_array()[0]['id'];
        } else {
            return false;
        }
    }

    function get($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('avaliador');
        $this->db->where('avaliador.FK_usuario_id', $id_usuario);
        $query = $this->db->get();

        if ($query->num_rows() == 1){
            return $query->result_array()[0];
        } else {
            return false;
        }
    }

    function quantidade_de_avaliadores_internos()
    {
        $this->db->select('*');
        $this->db->from('avaliador AS ava');
        $this->db->join('usuario AS usu', 'usu.usu_id = ava.FK_usuario_id', 'left');
        $this->db->where('FK_tipo_avaliador_id', 1);
        $this->db->where('usu.teste', 0);
        $quantidade = $this->db->get()->num_rows();
        return $quantidade;
    }

    function quantidade_de_avaliadores_externos()
    {
        $this->db->select('*');
        $this->db->from('avaliador AS ava');
        $this->db->join('usuario AS usu', 'usu.usu_id = ava.FK_usuario_id', 'left');
        $this->db->where('FK_tipo_avaliador_id', 2);
        $this->db->where('usu.teste', 0);
        $quantidade = $this->db->get()->num_rows();
        return $quantidade;
    }
}
?>
