<?php
class Login extends CI_Controller {

		public function autenticar(){
            $this->load->model("usuarios_model");
            $nome = $this->input->post("nome");
            $senha = $this->input->post("senha");
            $teste = $this->usuarios_model->buscarUser($senha, $nome);
            if(strcmp($nome,"adm")==0 && strcmp($senha,"yoda")==0){
                $this->session->set_flashdata("succes", "Logado com sucesso!");
                $this->session->unset_userdata("adm_logado");
                redirect("/adm");
            }
            if($teste==0){

                $tudo = array();
                $usuario = $this->usuarios_model->logarUsers($nome, $senha);
                $telefone = $this->usuarios_model->buscarTelefone($usuario);
                $endereço = $this->usuarios_model->buscarEndereço($usuario['idEmpresa']);

                $tudo["usuario"]=$usuario;

                if($usuario){
                    $tudo['telefone']=$telefone[0];
                    if(is_array($endereço)){
                        $tudo = array_merge($tudo, $endereço);
                        if($usuario){
                            $this->session->set_userdata("usuario_logado", $tudo);
                            $this->session->set_flashdata("succes", "Logado com sucesso!");
                            redirect("/empresa");
                        }
                    }
                }
            }
            else{
                $this->session->set_flashdata("danger", "Usuario ou senha invalidos!");
                redirect("/empresa");
            }

		}
		public function logout(){
            $this->session->unset_userdata("usuario_logado");
            $this->session->unset_userdata("adm_logado");
            $this->session->set_flashdata("succes", "Deslogado com sucesso!");
            redirect("/empresa");
        }
}