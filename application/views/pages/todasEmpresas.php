<!-- home -->
<div class="w3-display-container2 w3-opacity-min inicio5 w3-white" >
    <div class="w3-bar-block fundoEmpresas"></div>
    <div class="w3-display-middle" style="white-space:nowrap;">
        <span class="w3-center w3-padding-large w3-black w3-jumbo w3-wide w3-animate-opacity">Empresas</span>
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
<div id="main">
    <div style="text-align: center;margin: 10%;">
        <h1 style="font-size: 80px;">- Todas as Empresas -</h1>
    </div>
    <div>
        <?php
        foreach($empresas as $empresa):
            ?>

            <div class="parent" style="width: 90%; margin-left: 5%;background-color: #ffffff; padding: 5%">
                <header style="height: 90px;margin-bottom: 20px;">
                    <h1  id="abreVaga" style="float: left;" ><?= $empresa['nome']?></h1>
                    <h1 style="float: right;">  </h1>
                </header>
                <div class="sub-nav" id="infoVaga" style="display: none">
                    <table class="table">
                        <tr>
                            <td><h2 style="font-size: 40px"><?= $empresa['descrição']?></h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 50px">Contato:</h2></td>
                            <td><h2 style="font-size: 50px"></h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 40px">Email:</h2></td>
                            <td><h2 style="font-size: 40px"><?= $empresa['email']?></h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 40px">Telefone:</h2></td>
                            <td><h2 style="font-size: 40px"><?= $empresa['ddd']?> <?= $empresa['número']?></h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 50px">Endereço:</h2></td>
                            <td><h2 style="font-size: 50px"></h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 40px">Cidade:</h2></td>
                            <td><h2 style="font-size: 40px"><?= $empresa['cidade']?></h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 40px">Bairro:</h2></td>
                            <td><h2 style="font-size: 40px"><?= $empresa['nomebairro']?></h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 40px"><?= $empresa['tipoLogradouro']?>:</h2></td>
                            <td><h2 style="font-size: 40px"><?= $empresa['nomeLogradouro']?></h2></td>
                        </tr>
                        <tr>
                            <td><h2 style="font-size: 40px">Número:</h2></td>
                            <td><h2 style="font-size: 40px"><?= $empresa['numeroEnd']?></h2></td>
                        </tr>

                        <tr>
                            <td><h2 style="font-size: 50px; color:#1b4fa3" id="excluir" ><?= anchor("adm/excluirEmpresa/".$empresa['idEmpresa'], "Excluir"); ?></h2></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br/>

        <?php
        endforeach;?>
        <script>
            $('.parent').on("click",function(){

                $(this).find(".sub-nav").toggle(600);
                $(this).siblings().find(".sub-nav").hide(600);
            });
        </script>
    </div>
</div>