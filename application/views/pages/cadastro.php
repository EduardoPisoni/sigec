<html>
    <head>
        <link rel="stylesheet" href="<?= base_url('/css/bootstrap.css')?>">
        <title>Teste de TCC</title>
    </head>
    <body>

    <?php if($this->session->flashdata("succes")):?>
        <p class="alert alert-success"> <?= $this->session->flashdata("succes")?></p>
    <?php endif ?>

    <?php if($this->session->flashdata("danger")):?>
        <p class="alert alert-danger"> <?= $this->session->flashdata("danger")?></p>
    <?php endif ?>

    <?php if($this->session->userdata("usuario_logado")): ?>
      <p> logadoo</p>
    <?= anchor("login/logout", "Sair", array("class"=>"btn btn-primary"));?>

    <?php else: ?>

    <?php
    $id=10;
    echo form_open("login/autenticar/".$id);
    ?>
    <div>
        <div>
            <header>
                <h1 >LOGIN</h1>
            </header>
                <?php
                echo form_input(array(
                    "name" => 'email',
                    "id" => 'email',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Email'
                ));
                ?><br/>
                <?php
                echo form_input(array(
                    "name" => 'senha',
                    "id" => 'senha',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Crie uma senha'
                ));
                ?> <br/>
                <?php
                echo form_button(array(
                    "class" => 'btn btn-primary',
                    "type" => 'submit',
                    "content" => 'Logar'
                )); ?>
        </div>
    </div>
    <?php
    echo form_close();
    ?>



    <?php
    $id=10;
    echo form_open("usuarios/novo/".$id);
    ?>
    <div id="forms2" style="height=1%">
        <div class="cadastroEmpresa">
            <header class="aboutEmpresas">
                <h1 class="w3-center" style="float=left" onclick="cadastro('cadastro')">CADASTRE-SE</h1>
            </header>
            <div id="cadastro" class=" w3-animate-left">
                <br/><br/>
                <h1 class="titulosForm" >LOGIN</h1>
                <?php
                echo form_input(array(
                    "name" => 'nome',
                    "id" => 'nome',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Nome'
                ));
                ?>
                <br/>
                <?php
                echo form_input(array(
                    "name" => 'senha',
                    "id" => 'senha',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Crie uma senha'
                ));
                ?>
                <br/><br/><br/>
                <h1 class="titulosForm" >CONTATO</h1>
                <?php
                echo form_input(array(
                    "name" => 'email',
                    "id" => 'email',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Email'
                ));
                ?>
                <br/>
                <?php
                echo form_input(array(
                    "name" => 'telefone',
                    "id" => 'telefone',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Telefone'
                ));
                ?>
                <br/><br/><br/>
                <h1 class="titulosForm" >ENDEREÇO</h1>
                <input class="w3-input w3-border-input w3-light-grey" type="text" placeholder="Cidade" ><br/>
                <input class="w3-input w3-border-input w3-light-grey" type="text" placeholder="Bairro" ><br/>
                <input class="w3-input w3-border-input w3-light-grey" type="text" placeholder="Tipo do Logradouro"><br/> <!-- drop -->
                <input class="w3-input w3-border-input w3-light-grey" type="text" placeholder="Nome do Logradouro" ><br/>
                <input class="w3-input w3-border-input w3-light-grey" type="text" placeholder="Número"><br/>
                <br/><br/>
                <h1 class="titulosForm" >DESCRIÇÃO DA EMPRESA</h1>
                <?php
                echo form_textarea(array(
                    "name" => 'descricao',
                    "id" => 'descricao',
                    "class" => 'w3-input-descricao w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Fale um pouco sobre sua Empresa!'
                ));
                ?>
                <br/><br/><br/><br/>
                <?php
                echo form_button(array(
                    "class" => 'btn btn-primary',
                    "type" => 'submit',
                    "content" => 'Cadastrar'
                )); ?>
            </div>
        </div>
    </div>
    <?php
    echo form_close();
    ?>

    <?php endif?>