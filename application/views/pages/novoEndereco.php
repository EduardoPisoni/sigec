<div id="main" style="">
    <div class="w3-display-container2 w3-opacity-min inicio4 w3-white">
        <div class="w3-bar-block fundoEmpresas"></div>
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-padding-large w3-black w3-jumbo w3-wide w3-animate-opacity">
                NOVO ENDEREÇO</span>
        </div>
    </div>

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


        <?php
        echo form_open("usuarios/novoEndereco");
        ?>
        <div style="margin-bottom: 100px;">
            <div id="forms" style="height: 65%">
                <header class="aboutEmpresas">
                    <h1 >FORMULÁRIO</h1>
                </header>
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
                    "name" => 'tipoLogradouro',
                    "id" => 'tipoLogradouro',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Tipo do Logradouro'
                ));
                ?> <br/>
                <?php
                echo form_input(array(
                    "name" => 'nomeLogradouro',
                    "id" => 'nomeLogradouro',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Nome do Logradouro'
                ));
                ?> <br/>
                <?php
                echo form_input(array(
                    "name" => 'nomebairro',
                    "id" => 'nomebairro',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Bairro'
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
                ?>
                <br/>
                <?php
                echo form_button(array(
                    "class" => 'w3-btn logar w3-red w3-hover-new2 w3-card w3-center',
                    "type" => 'submit',
                    "style" => 'margin-top: 8%;',
                    "content" => 'Pronto!'
                )); ?>
            </div>
        </div>
        <?php
        echo form_close();
        ?>
</div>