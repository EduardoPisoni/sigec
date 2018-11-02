<!-- home -->
<div class="w3-display-container2 w3-opacity-min inicio4 w3-white" >
    <div class="w3-bar-block fundoEmpresas"></div>
    <div class="w3-display-middle" style="white-space:nowrap;">
        <span class="w3-center w3-padding-large w3-black w3-jumbo w3-wide w3-animate-opacity">Vagas para Estágio!</span>
    </div>
</div>

<div id="main">
    <?php $curso = $cursos[0];?>
    <div id="vagas" style=" margin-top: 50px;">
        <div style="text-align: center;margin: 10%;">
            <h1 style="font-size: 80px;">Vagas na àrea de <?= $curso["nome"]?><h1 style="font-size: 80px;"> em <?= $cidade?></h1>
        </div>
        <?php
        foreach($vagas as $vaga):
            ?>

            <div class="parent" style="width: 90%; margin-left: 5%;background-color: #ffffff; padding: 5%">
                <header style="height: 90px;margin-bottom: 20px;">
                    <h1  id="abreVaga" style="float: left;" > <?= $vaga["titulo"]?></h1>
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
                            <td><h2 style="font-size: 50px">Empresa</h2></td>
                            <td><h2 style="font-size: 50px"><?= $vaga["nomeEmpresa"]?></h2></td>
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