<?php

class Adm_model extends CI_Model{
    public function dadosEmpresa(){
        $this->db->select("*, en.número as numeroEnd");
        $this->db->from("empresa e");
        $this->db->join("endereço en", "en.empresa_idEmpresa = e.idEmpresa");
        $this->db->join("telefone t", "t.empresa_idEmpresa = e.idEmpresa");
        $empresa = $this->db->get()->result_array();
        return $empresa;
    }
}
