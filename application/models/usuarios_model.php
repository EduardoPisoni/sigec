<?php

class Usuarios_model extends CI_Model{
    public function user($usuario){
        $this->db->insert("user", $usuario);
    }
    public function telefone($telefone){
        $this->db->insert("telefone", $telefone);
    }
    public function empresa($empresa){
        $this->db->insert("empresa", $empresa);
    }
    public function endereco($endereco){
        $this->db->insert("endereço", $endereco);
    }

    public function buscarUser($senha, $nome){
        $this->db->select("*");
        $this->db->from("user u");
        $this->db->join("empresa e", "e.user_idUser = u.idUser and e.nome = '".$nome."'");
        $this->db->where("u.senha", $senha);
        $usuario = $this->db->get()->row_array();
        if($usuario){
            $usuario=0;
        }
        else{
            $usuario=1;
        }
        return $usuario;
    }
    public function buscarEmpresa($idEmpresa){
        $this->db->select("*");
        $this->db->from("empresa e");
        $this->db->where("e.idEmpresa", $idEmpresa);
        $usuario = $this->db->get()->row_array();
        return $usuario;
    }
    public function buscarTelefone($usuario){
        $this->db->select("t.número, t.ddd");
        $this->db->from("telefone t");
        $this->db->join("empresa e", "t.empresa_idEmpresa = e.idEmpresa and e.idEmpresa = ".$usuario['idEmpresa']);
        $telefone = $this->db->get()->result_array();
        return $telefone;
    }
    public function buscarEndereço($usuario){
        $this->db->select("en.cidade, en.tipoLogradouro, en.nomeLogradouro, en.nomebairro, en.número ");
        $this->db->from("endereço en");
        $this->db->join("empresa e", "en.empresa_idEmpresa = e.idEmpresa and e.idEmpresa = ".$usuario);
        $ender = $this->db->get()->result_array();
        return $ender;
    }

    public function buscarCursos(){
        $this->db->select("c.nome, c.coordenador, c.idCurso, c.horas");
        $this->db->from("curso c");
        $cursos = $this->db->get()->result_array();
        return $cursos;
    }

    public function buscarCursosVagas($idVaga){
        $this->db->select("c.nome, c.coordenador, c.idCurso");
        $this->db->from("curso c");
        $this->db->join("vaga v", "v.idVaga = ".$idVaga);
        $this->db->join("vaga_curso vc", "".$idVaga." = vc.vaga_idVaga and c.idCurso = vc.curso_idCurso");
        $cursos = $this->db->get()->result_array();
        return $cursos;
    }

    public function buscarVagas($empresa){
        $this->db->select("v.quantidade, v.quantidade2, v.cargaHoraria, v.titulo, v.descrição, v.idVaga");
        $this->db->from("vaga v");
        $this->db->join("empresa e", "v.empresa_idEmpresa = e.idEmpresa and e.idEmpresa = ".$empresa['idEmpresa']);
        $vagas = $this->db->get()->result_array();
        return $vagas;

    }
    public function todasVagas($idCurso, $cidade){
        $this->db->select("v.quantidade, v.quantidade2, v.cargaHoraria, v.titulo, v.descrição, v.idVaga, e.nome as nomeEmpresa");
        $this->db->from("vaga v");
        $this->db->join("empresa e", "e.idEmpresa = v.empresa_idEmpresa");
        $this->db->join("curso c", "c.idCurso = ".$idCurso);
        $this->db->join("vaga_curso vc", "vc.vaga_idVaga = v.idVaga and vc.curso_idCurso = c.idCurso");
        $this->db->join("endereço en", "en.empresa_idEmpresa=e.idEmpresa and en.cidade= '".$cidade."'");
        $vagas = $this->db->get()->result_array();
        return $vagas;

    }
    public function localidades($idCurso){
        $this->db->select("en.*, COUNT(en.cidade) AS quantCidades, sum(v.quantidade) as quant, sum(v.quantidade2) as quant2");
        $this->db->from("vaga v");
        $this->db->join("empresa e", "e.idEmpresa = v.empresa_idEmpresa");
        $this->db->join("curso c", "c.idCurso = ".$idCurso);
        $this->db->join("vaga_curso vc", "vc.vaga_idVaga = v.idVaga and vc.curso_idCurso = c.idCurso");
        $this->db->join("endereço en", "en.empresa_idEmpresa=e.idEmpresa");
        $localidades = $this->db->get()->result_array();
        return $localidades;
    }
    public function buscarCurso($idCurso){
        $this->db->select("c.nome, c.coordenador, c.idCurso, c.horas");
        $this->db->from("curso c");
        $this->db->where("c.idCurso = ".$idCurso);
        $cursos = $this->db->get()->result_array();
        return $cursos;
    }

    public function vagas_cursos($idCurso){
        $cursos=$this->cursoEmVaga();
        for($i=0; $i<count($cursos); $i++){
            if($cursos[$i]==$idCurso):
                $this->db->select("sum(v.quantidade) as quant, sum(v.quantidade2) as quant2");
                $this->db->from("vaga v");
                $this->db->join("curso c", "c.idCurso = ".$idCurso);
                $this->db->join("vaga_curso vc", "vc.vaga_idVaga = v.idVaga and vc.curso_idCurso = c.idCurso");
                $vagas = $this->db->get()->result_array();
                break;
            else: $vagas= array(array("quant"=>0, "quant2"=>0));
            endif;
        }
        return $vagas;
    }
    public function cursoEmVaga(){
        $this->db->select("vc.curso_idCurso as id");
        $this->db->from("vaga_curso vc");
        $vagas = $this->db->get()->result_array();
        $temp=array();
        for($i=0; $i<count($vagas); $i++){
            $temp[] = $vagas[$i]['id'];
        }
        return $temp;
    }

    public function buscarLocalidades(){
        $this->db->select("en.nome");
        $this->db->from("endereço en");
        $this->db->join("empresa e", "en.empresa_idEmpresa = e.idEmpresa and en.idEndereço=1");
        $localidades = $this->db->get()->result_array();
        return $localidades;
    }


    public function logarUsers($nome, $senha){
        $this->db->select("*");
        $this->db->from("empresa e");
        $this->db->join("user u", "u.idUser = e.user_idUser");
        $this->db->where("e.nome", $nome);
        $this->db->where("u.senha", $senha);
        $usuario = $this->db->get()->row_array();
        return $usuario;
    }

    public function inserirVaga($vaga, $idCurso){
        $this->db->insert("vaga", $vaga);
        $vagaId = $this->db->insert_id();
        for($i=0; $i<count($idCurso); $i++)
        {
            $vaga_curso = array(
                "vaga_idVaga" => $vagaId,
                "curso_idCurso" => $idCurso[$i]
            );
            $this->db->insert("vaga_curso",$vaga_curso);
        }

        $this->session->set_flashdata("succes", "Cadastrada com sucesso!");
    }

    public function testarUser($nome){
        $this->db->select("e.nome");
        $this->db->from("empresa e");
        $cont=0;
        $empresaNome = $this->db->get()->row_array();
        for($i=0; $i<count($empresaNome); $i++){
            if(strcmp($empresaNome[$i],$nome)==0){
                $cont=0;
                break;
            }
            else{
                $cont++;
            }
        }
        return $cont;
    }


}
