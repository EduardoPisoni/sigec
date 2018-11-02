<div id="main">
    <div class="w3-display-container2 w3-opacity-min inicio2 w3-white">
        <div class="w3-bar-block fundoEmpresas"></div>
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-padding-large w3-black w3-jumbo w3-wide w3-animate-opacity">
                <?php if($this->session->userdata("usuario_logado")): ?>SUA EMPRESA
                <?php else: ?>EMPRESAS
                <?php endif?></span>
        </div>
    </div>

    <?php if($this->session->flashdata("excluido")):?>
        <p class="alert alert-success msg-success" style="position: fixed;margin-top: -113px;"> <?= $this->session->flashdata("excluido")?></p>
        <script>
            setTimeout(function(){
                var msg = document.getElementsByClassName("msg-success");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
            }, 4000);
        </script>
    <?php endif ?>

    <?php if($this->session->flashdata("succes")):?>
        <p class="alert alert-success msg-success" style="position: fixed;margin-top: -113px;"> <?= $this->session->flashdata("succes")?></p>
        <script>
            setTimeout(function(){
                var msg = document.getElementsByClassName("msg-success");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
            }, 4000);
        </script>
    <?php endif ?>

    <?php if($this->session->flashdata("danger")):?>
        <p class="alert alert-danger msg-danger" style="position: fixed;margin-top: -113px;" > <?= $this->session->flashdata("danger")?></p>
        <script>
            setTimeout(function(){
                var msg = document.getElementsByClassName("msg-danger");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
                $("msg-danger").onload(function(){
                    $("p").fadeOut();
                });
            }, 4000);

        </script>
    <?php endif ?>



     <!--USUARIO LOGADO -->

    <?php if($this->session->userdata("usuario_logado")):
    ?>
        <?=
        anchor("login/logout", "Sair", array("class"=>"btn btn-lg botaoSair"));
        ?><!-- botao sair -->

        <?php $user = $this->session->userdata("usuario_logado");
            $usuario = $user["usuario"];?>
        <br/>
        <br/>
        <header  class="aboutEmpresas">
            <h1 > - <?= strtoupper($usuario['nome'])?> -</h1>
        </header>
        <table class="table" style="margin-left: 5%; width: 90%;">
            <tr>
                <td><h3>Telefone:</h3></td>
                <td><h3>(<?php $ddd=$user['telefone'];  echo $ddd['ddd']?>) <?php $telefone=$user['telefone'];  echo $telefone['número']?> </h3></td>
            </tr>
            <tr>
                <td><h3>Email:</h3></td>
                <td><h3><?= $usuario['email']?></h3></td>
            </tr>
            <tr>
                <td><h3>Descrição:</h3></td>
                <td><h3><?= $usuario['descrição']?></h3></td>
            </tr>
            <?php

            print_r($user);

            if(array_key_exists ( 2 , $usuario )):
                $endereços = array( "1" => $usuario[1], "2" => $usuario[2]);
                foreach ($endereços as $endereço):?>

                <tr>
                    <td><h3>Endereço:</h3></td>
                    <td><h3><?= ucfirst($endereço['cidade'])?>, <?= ucfirst($endereço['tipoLogradouro'])?> <?= ucfirst($endereço['nomeLogradouro'])?></h3></td>
                </tr>
                <tr>
                    <td></td>
                    <td><h3>nº <?= $endereço['número']?>, Bairro <?= $endereço['nomebairro']?></h3></td>
                </tr>
                <?php endforeach;?>
            <?php else:
                $endereço=$user[1];?>

                <tr>
                    <td><h3>Endereço:</h3></td>
                    <td><h3><?= ucfirst($endereço['cidade'])?>, <?= ucfirst($endereço['tipoLogradouro'])?> <?= ucfirst($endereço['nomeLogradouro'])?></h3></td>
                </tr>
                <tr>
                    <td></td>
                    <td><h3>nº <?= $endereço['número']?>, Bairro <?= $endereço['nomebairro']?></h3></td>
                </tr>
            <?php endif;?>
            <tr>
                <td><h2></h2></td>
                <td><h2 style="font-size: 50px; color:#1b4fa3; float: right;" id="mais"><?= anchor("pages/novoEndereco", "+ Adicionar endereço"); ?></h2></td>
            </tr>
        </table>
        <br/>
        <br/>
        <br/>
        <header  class="aboutEmpresas">
            <h1 >Vagas</h1>
        </header>

    <div style="margin-bottom: 5%">
        <div id="menu-overlay" style="display: none;
  position: fixed;
  background: purple; /* I made this purple so you can see it :) */
  opacity: 0.1; /* can be made to 0 */
  width: 100%;
  height: 100%;
  z-index: 0;
  top: 0;
  left: 0;"></div>
        <?php
        foreach($vagas as $vaga):

        ?>

            <div class="parent" style="width: 90%; margin-left: 5%;background-color: #ffffff; padding: 5%">
                <header style="height: 90px;margin-bottom: 20px;">
                    <h1  id="abreVaga" style="float: left;" > <?= ucfirst($vaga["titulo"])?></h1>
                    <h1 style="float: right;"> <?= $vaga["quantidade2"]?>/<?= $vaga["quantidade"]?> </h1>
                </header>
                <div class="sub-nav" id="infoVaga" style="display: none">
                    <table class="table">
                        <tr>
                            <td><h2 style="font-size: 40px">Curso</h2></td>
                            <td><h2 style="font-size: 40px"><?php
                                    $this->load->model("usuarios_model");
                                    $lista = $this->usuarios_model->buscarCursosVagas($vaga["idVaga"]);
                                    for($i=0; $i<count($lista); $i++){
                                        if($i==1){
                                            echo "<br/>";
                                        }
                                        $nomeCurso = $lista[$i];
                                        echo $nomeCurso["nome"];

                                    }
                                    ?></h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 40px">Carga horária</h2></td>
                            <td><h2 style="font-size: 40px"><?= $vaga["cargaHoraria"]?> horas</h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 40px">Descrição</h2></td>
                            <td><h2 style="font-size: 40px"><?= $vaga["descrição"]?></h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 50px; color:#1b4fa3" id="excluir" ><?= anchor("usuarios/excluirVaga/".$vaga['idVaga'], "Excluir"); ?></h2></td>
                            <td><h2 style="font-size: 50px; color:#1b4fa3; float: right;" id="mais"><a>+</a></h2></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br/>

        <?php
        endforeach; ?>
        <script>
            $('.parent').on("click",function(){
                $(this).find(".sub-nav").toggle(600);
                $(this).siblings().find(".sub-nav").hide(600);
            });
        </script>

    </div>
        <?= anchor("pages/criarVagas", "Novo", array("class"=>"btn btn-lg btn-block", "style"=>"height:100px;
        font-size: 50px;
        background-color: #464646;
        color: #fff;
        border-color: #464646;
        width: 50%;
        margin-left: 25%;"));
        ?><!-- botao nova vaga -->






    <!-- USUARIO NÃO LOGADO -->

    <?php else: ?>

        <?php
        echo form_open("login/autenticar");
        ?>
        <div style="margin-bottom: 100px;">
            <div id="forms">
                <header class="aboutEmpresas">
                    <h1 >LOGIN</h1>
                </header>
                <?php
                echo form_input(array(
                    "name" => 'nome',
                    "id" => 'nome',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Nome da Empresa',
                    "required"=>"required"
                ));
                ?><br/>
                <?php
                echo form_input(array(
                    "name" => 'senha',
                    "type" => 'password',
                    "id" => 'senha',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Sua senha',
                    "required"=>"required"
                ));
                ?> <br/>
                <?php
                echo form_button(array(
                    "class" => 'w3-btn logar w3-red w3-hover-new2 w3-card w3-center',
                    "type" => 'submit',
                    "content" => 'Logar'
                )); ?>
            </div>
        </div>
        <?php
        echo form_close();
        ?>



        <?php
        echo form_open("usuarios/novo");
        ?>
        <div id="forms2" style="height=1%">
            <div class="cadastroEmpresa">
                <header class="aboutEmpresas">
                    <h1 class="w3-center" style="float=left" onclick="cadastro('cadastro')">CADASTRE-SE</h1>
                </header>
                <div id="cadastro" class=" ">
                    <br/><br/>
                    <h1 class="titulosForm" >LOGIN</h1>
                    <?php
                    echo form_input(array(
                        "name" => 'nome',
                        "id" => 'nome',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Nome da Empresa'
                    ));
                    ?>
                    <br/>
                    <?php
                    echo form_input(array(
                        "name" => 'senhaC',
                        "id" => 'senhaC',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Crie uma senha'
                    ));
                    ?>
                    <br/><br/><br/>
                    <h1 class="titulosForm" >CONTATO</h1>
                    <?php
                    echo form_input(array(
                        "name" => 'emailC',
                        "id" => 'emailC',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Email'
                    ));
                    ?>
                    <br/>
                    <?php
                    echo form_input(array(
                        "name" => 'ddd',
                        "id" => 'ddd',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'5',
                        "placeholder" => 'DDD'
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
                    <?php
                    echo form_input(array(
                        "name" => 'cidade',
                        "id" => 'cidade',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Cidade'
                    ));
                    ?><br/>
                    <?php
                    echo form_input(array(
                        "name" => 'bairro',
                        "id" => 'bairro',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Bairro'
                    ));
                    ?><br/>
                    <?php
                    echo form_input(array(
                        "name" => 'tipo_logradouro',
                        "id" => 'tipo_logradouro',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Tipo do Logradouro'
                    ));
                    ?><br/>
                    <?php
                    echo form_input(array(
                        "name" => 'nome_logradouro',
                        "id" => 'nome_logradouro',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Nome do Logradouro'
                    ));
                    ?><br/>
                    <?php
                    echo form_input(array(
                        "name" => 'numero',
                        "id" => 'numero',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Número'
                    ));
                    ?><br/>
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
                        "class" => 'w3-btn logar w3-red w3-hover-new2 w3-card w3-cente',
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

</div>