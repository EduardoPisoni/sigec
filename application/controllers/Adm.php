<?php
class Adm extends CI_Controller {

		public function empresas($page='todasEmpresas'){
			if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
					show_404();
			}
            $this->load->model("Adm_model");
            $lista = $this->Adm_model->dadosEmpresa();
            $dados = array( "empresas" => $lista);
			$data['title'] = ucfirst($page); // Capitalize the first letter
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $dados);
			$this->load->view('templates/footer', $data);
		}
		public function excluirEmpresa($idEmpresa){
            $this->db->delete('endereço', array('empresa_idEmpresa' => $idEmpresa));
            $this->db->delete('telefone', array('empresa_idEmpresa' => $idEmpresa));
            $this->db->delete('empresa', array('idEmpresa' => $idEmpresa));
            $this->db->delete('user', array('idUser' => 'empresa.user_idUser'));
            $this->session->set_flashdata("excluido", "Excluído com sucesso!");
            redirect("/todasEmpresas");
        }
}