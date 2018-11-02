<?php
class Usuarios extends CI_Controller {
        public function endereço(){
            $idEmpresa = $this->db->insert_id();
            $usuario = $this->usuarios_model->buscarEmpresa($idEmpresa);
            $endereco = array(
                "cidade" => $this->input->post("cidade"),
                "tipoLogradouro" => $this->input->post("tipo_logradouro"),
                "nomeLogradouro" => $this->input->post("nome_logradouro"),
                "nomebairro" => $this->input->post("bairro"),
                "número" => $this->input->post("numero"),
                "empresa_idEmpresa" => $usuario['idEmpresa']
            );
            $this->usuarios_model->endereco($endereco);
        }
		public function novo(){
            $this->load->model("usuarios_model");

            $senha = array(
                "senha"=> $this->input->post('senhaC')
            ) ;
            $this->usuarios_model->user($senha);
            $usuario = $this->usuarios_model->buscarUser($this->input->post('senhaC'));
            if($usuario){
                $this->cadastroEmpresa($usuario);
                $this->telefone($usuario);
                $this->endereço();

                $this->session->set_flashdata("succes", "Cadastrado com sucesso!");
                redirect("/empresa");
            }

		}
        public function cadastroEmpresa($usuario){
            $empresa = array(
                "nome"=> $this->input->post('nome'),
                "email"=> $this->input->post('emailC'),
                "descrição"=> $this->input->post('descricao'),
                "user_idUser" => $usuario['idUser']
            );
            $this->usuarios_model->empresa($empresa);
        }
		public function telefone(){
            $idEmpresa = $this->db->insert_id();
            $usuario = $this->usuarios_model->buscarEmpresa($idEmpresa);
            $telefone = array(
                "ddd" => $this->input->post("ddd"),
                "número" => $this->input->post("telefone"),
                "empresa_idEmpresa" => $usuario['idEmpresa'],
                "empresa_user_idUser" => $usuario['user_idUser']
            );
            $this->usuarios_model->telefone($telefone);
        }

        public function criarVagas(){
            $usuarioId = $this->session->userdata("usuario_logado");
            $vaga =array(
                "descrição" => $this->input->post("descricao"),
                "cargaHoraria" => $this->input->post("cargaHoraria"),
                "quantidade" => $this->input->post("quantidade"),
                "quantidade2" => 0,
                "titulo" => $this->input->post("titulo"),
                "empresa_idEmpresa" => $usuarioId['idEmpresa']
            );
            $idCurso = $this->input->post("curso");
            $this->load->model("usuarios_model");
            $this->usuarios_model->inserirVaga($vaga, $idCurso);
            redirect("/empresa");

        }

		public function novoEndereco(){
            $usuarioId = $this->session->userdata("usuario_logado");
            $ender =array(
                "cidade" => $this->input->post("cidade"),
                "tipoLogradouro" => $this->input->post("tipoLogradouro"),
                "nomeLogradouro" => $this->input->post("nomeLogradouro"),
                "nomebairro" => $this->input->post("nomebairro"),
                "número" => $this->input->post("numero"),
                "empresa_idEmpresa" => $usuarioId['idEmpresa']
            );
            $this->load->model("usuarios_model");
            $this->usuarios_model->endereco($ender);
            redirect("/empresa");
        }

        public function excluirVaga($idVaga){
            $this->db->delete('vaga_curso', array('vaga_idVaga' => $idVaga));
            $this->db->delete('vaga', array('idVaga' => $idVaga));
            $this->session->set_flashdata("excluido", "Excluído com sucesso!");
            redirect("/empresa");
        }

}