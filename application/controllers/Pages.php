<?php
class Pages extends CI_Controller {

		public function home($page='home'){
			if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
					show_404();
			}
			$data['title'] = ucfirst($page); // Capitalize the first letter
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
		}
		
		public function empresa($page='empresa'){
            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            $data['title'] = ucfirst($page); // Capitalize the first letter

            if($this->session->userdata("usuario_logado")){
                $usuario = $this->session->userdata("usuario_logado");
                $this->load->model("usuarios_model");
                $lista = $this->usuarios_model->buscarVagas($usuario["usuario"]);
                $cursos = $this->usuarios_model->buscarCursos();
                $dados = array( "vagas" => $lista, "cursos" => $cursos);
            }
            else{
                $dados="0";
            }

            $this->load->view('templates/header', $data);
            $this->load->view('pages/' . $page, $dados);
            $this->load->view('templates/footer', $data);
        }
        public function criarVagas($page='criarVagas'){
            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->model("usuarios_model");
            $lista = $this->usuarios_model->buscarCursos();
            $dados = array( "cursos" => $lista);

            $this->load->view('templates/header', $data);
            $this->load->view('pages/' . $page, $dados);
            $this->load->view('templates/footer', $data);
        }

    public function novoEndereco($page='novoEndereco'){
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page);
        $this->load->view('templates/footer', $data);
    }

		public function vagas($page='vagas'){
			if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
					show_404();
			}

			$data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->model("usuarios_model");
            $cursos = $this->usuarios_model->buscarCursos();
            $dados = array("cursos" => $cursos);

			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $dados);
			$this->load->view('templates/footer', $data);
		}

        public function vagasCurso($idCurso){
            if ( ! file_exists(APPPATH.'views/pages/vagaCurso.php')) {
                show_404();
            }
            $this->load->model("usuarios_model");
            $this->session->set_userdata("vagaCurso", $idCurso);
            $lista = $this->usuarios_model->localidades($idCurso);
            $cursos = $this->usuarios_model->buscarCurso($idCurso);
            $dados = array( "localidades" => $lista, "cursos" => $cursos);
            $this->load->view('templates/header');
            $this->load->view('pages/vagaCurso', $dados);
            $this->load->view('templates/footer');
        }

        public function vagasLocalidade($cidade){
            if ( ! file_exists(APPPATH.'views/pages/vagaCurso.php')) {
                show_404();
            }
            $this->load->model("usuarios_model");
            $idCurso=$this->session->userdata("vagaCurso");
            $lista = $this->usuarios_model->todasVagas($idCurso, $cidade);
            $cursos = $this->usuarios_model->buscarCurso($idCurso);
            $dados = array( "vagas" => $lista, "cursos" => $cursos, "cidade" => $cidade);
            $this->load->view('templates/header');
            $this->load->view('pages/vagaLocalidade', $dados);
            $this->load->view('templates/footer');
        }

        public function adm($page='adm'){
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                show_404();
            }
            $data['title'] = ucfirst($page); // Capitalize the first letter
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
}