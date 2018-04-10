<?php
class Docente_model extends CI_Model{

    function projeto_com_docente_e_planos($id)
    {
        $this->db->select("*");
        $this->db->from("projeto");
        $this->db->where("proj_id", $id);
        $this->db->join("docente", "doc_id = projeto.fk_doc_id", "left");
        $projeto = $this->db->get();
        if ($projeto->num_rows() == 0)
            return null;
        $projeto = $projeto->result_array()[0];

		$doc_id = $projeto['fk_doc_id'];
        $query = "
            SELECT *
            FROM plano_trabalho
            WHERE fk_doc_id = $doc_id
            AND plano_id IN
            (
                SELECT MAX(plano_id)
                FROM plano_trabalho
                GROUP BY fk_doc_id, plano_ordem
            )
            ORDER BY plano_ordem
        ";

        $projeto['planos'] = $this->db->query($query)->result_array();

        return $projeto;
    }

    function id_do_ultimo_projeto($id_docente)
    {
        $this->db->select("max(pro.proj_id) as id");
        $this->db->from("projeto AS pro");
        $this->db->join("docente AS doc", "doc.doc_id = pro.fk_doc_id", "type");
        $this->db->where("doc.doc_id", $id_docente);
        $data = $this->db->get();
        if ($data->num_rows()!=1)
            return false;

        return $data->result_array()[0]['id'];
    }

    //Buscar os dados do docente
    function get_docente($id){
        $this->db->select('*');
        $this->db->from('docente');
        $this->db->join('usuario', 'usuario.usu_id = docente.fk_usu_id');
        $this->db->join('departamentos', 'docente.fk_dep_id = departamentos.dep_id');
        $this->db->where('usuario.type', '2');
        $this->db->where('usuario.usu_id', $id);

        $rs = $this->db->get();

        if ($rs->num_rows()> 0):
            return $rs->result();
        else:
            return false;
        endif;
    }
    //Buscar os dados do docente
    function get_docente_admin($id){
        $this->db->select('*');
        $this->db->from('docente');
        $this->db->join('usuario', 'usuario.usu_id = docente.fk_usu_id');
        $this->db->join('departamentos', 'docente.fk_dep_id = departamentos.dep_id');
        $this->db->where('usuario.type', '2');
        $this->db->where('docente.doc_id', $id);
        $this->db->where('doc_id !=','5');
        $this->db->where('doc_id !=','8');

        $rs = $this->db->get();
        #echo $this->db->last_query();
        if ($rs->num_rows()> 0):
            return $rs->result();
        else:
            return false;
        endif;
    }
    //Buscar os dados de todos docente
    function get_all_docentes(){
        $this->db->select('*');
        $this->db->from('docente');
        $this->db->join('usuario', 'usuario.usu_id = docente.fk_usu_id');
        $this->db->join('departamentos', 'docente.fk_dep_id = departamentos.dep_id');
        $this->db->where('usuario.type', '2');
        $this->db->where('doc_id !=','5');
        $this->db->where('doc_id !=','8');
        $this->db->order_by('doc_nome', 'asc');

        $rs = $this->db->get();
        #echo $this->db->last_query();
        if ($rs->num_rows()> 0):
            return $rs->result();
        else:
            return false;
        endif;
    }
    //Buscar o nome da área capes
    function get_area_capes($id){
        $this->db->select('*');
        $this->db->from('area_capes');

        $this->db->where('area_capes_id', $id);
        $rs = $this->db->get();

        if ($rs->num_rows()> 0):
            $area = $rs->result();
        return $area['0']->nome_area;
        else:
            return false;
        endif;
    }

    //Lista todos os projetos e dados do docente
    function get_all_projetos()
    {
        $query = "
            SELECT *
            FROM usuario
            LEFT JOIN docente ON fk_usu_id=usu_id
            LEFT JOIN projeto ON fk_doc_id=doc_id
            WHERE usuario.type=2
            AND proj_id IN
            (
                SELECT MAX(proj_id)
                FROM projeto
                GROUP BY fk_doc_id
            )
            ORDER BY doc_nome
        ";
        $rs = $this->db->query($query);

        if ($rs->num_rows()> 0):
            return $rs;
        else:
            return false;
        endif;
    }

    function get_all_projetos_planos()
    {
        $query = "
            SELECT *
            FROM projeto
            LEFT JOIN docente ON fk_doc_id = doc_id
            LEFT JOIN plano_trabalho AS pt ON pt.fk_doc_id = doc_id
            WHERE plano_id IN
            (
                SELECT MAX(plano_id)
                FROM plano_trabalho
                GROUP BY fk_doc_id, plano_ordem
            )
            AND proj_id IN
            (
                SELECT MAX(proj_id)
                FROM projeto
                GROUP BY fk_doc_id
            )
            ORDER BY proj_titulo
        ";
        $rs = $this->db->query($query);

        if ($rs->num_rows()> 0):
            return $rs;
        else:
            // return false;
            return $rs;
        endif;
    }

    //Listar todos os projetos e dados do usuário a partir do id de usuario
    function get_projetos($id){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('docente', 'docente.fk_usu_id = usuario.usu_id');
        $this->db->join('projeto', 'docente.doc_id = projeto.fk_doc_id');
        $this->db->WHERE('usu_id' , $id);
        $this->db->where('usuario.type', '2');
        $this->db->order_by('proj_data','desc');
        $this->db->limit('5');
        $rs = $this->db->get();

        if ($rs->num_rows()> 0):
            return $rs;
        else:
            return false;
        endif;
    }

    //Listar todos os projetos e dados do usuário a partir do id de usuario
    function get_anexos($id){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('docente', 'docente.fk_usu_id = usuario.usu_id');
        $this->db->join('anexos', 'docente.doc_id = anexos.fk_doc_id');
        $this->db->WHERE('usu_id' , $id);
        $this->db->where('usuario.type', '2');
        $this->db->order_by('anexo_data','desc');

        $rs = $this->db->get();



        if ($rs->num_rows()> 0):
            return $rs;
        else:
            return false;
        endif;
    }

    function get_plano($id, $ordem){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('docente', 'docente.fk_usu_id = usuario.usu_id');
        $this->db->join('plano_trabalho', 'docente.doc_id = plano_trabalho.fk_doc_id');
        $this->db->WHERE('usu_id' , $id);
        $this->db->where('usuario.type', '2');
        $this->db->WHERE('plano_trabalho.plano_ordem' , $ordem);
        $this->db->order_by('plano_data','desc');
        $this->db->limit('5');
        $rs = $this->db->get();


        if ($rs->num_rows()> 0):
            return $rs;
        else:
            return false;
        endif;
    }

    function get_all_planos(){
        $query = "
            SELECT *
            FROM plano_trabalho
            LEFT JOIN docente ON fk_doc_id=doc_id
            WHERE plano_id IN
            (
                SELECT MAX(plano_id)
                FROM plano_trabalho
                GROUP BY fk_doc_id, plano_ordem
            )
            ORDER BY doc_nome
        ";

        $rs = $this->db->query($query);
        if ($rs->num_rows()> 0):
            return $rs;
        else:
            return false;
        endif;
    }

    function delete_projeto($id){

        $this->db->delete('projeto', array('proj_id' => $id));
    }
}
?>
