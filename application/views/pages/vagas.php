<!-- home -->
<div class="w3-display-container2 w3-opacity-min inicio4 w3-white" >
    <div class="w3-bar-block fundoEmpresas"></div>
    <div class="w3-display-middle" style="white-space:nowrap;">
        <span class="w3-center w3-padding-large w3-black w3-jumbo w3-wide w3-animate-opacity">Vagas para Estágio!</span>
    </div>
</div>

<div id="main">
    <div id="cursos">
        <div style="text-align: center;margin: 10%;">
            <h1 style="font-size: 80px;">Primeiramente selecione uma área:</h1>
        </div>
        <?php
        foreach($cursos as $curso):
        ?>

        <div id="contCurso" style="margin: 8%;/* background-color: #1b4fa3; */height: 44%;color: #fff;border: solid #929292;box-shadow: 3px 3px 60px -15px #000;">
            <div id="contTitulo" style="padding: 5%;background-color: <?= corCurso($curso['idCurso'])?>;height: 30%; ">
                <h1 style="font-size: 70px;"><?=anchor("curso/".$curso["idCurso"], "".$curso["nome"], array("style"=>"text-decoration:none"));?></h1>
                <style>
                    a:hover, a:active {
                        color:#fff;
                        font-size: 72px;
                    }
                </style>
                <h3 style=""><?= $curso["horas"]?> horas</h3>
            </div>
            <div id="contCorpo" style="background-color: <?= corCurso($curso['idCurso'])?>;margin-top: -1px">
                <div style="height: 50%;background-image: url('http://localhost/code/imagens/escola.png');opacity: 0.9;background-repeat: no-repeat;z-index: 0;position: relative;background-size: cover;background-position-y: 60%;">
                </div>
                <h1 style="height: 240px;width: 240px;background-color: #fff;color: #fff;padding: 5%;padding-top: 10%;float: left;margin-top: -50%;margin-left: 55%;border-radius: 50%;border: 5px solid #fff9;box-shadow: 0px 15px 80px -5px #000;
                        background-image: url('http://localhost/code/imagens/logosCursos/logo_<?php
                $mab="Meio Ambiente";
                $des="Design de Móveis";
                if(strcmp($curso["nome"], $mab)==0):
                    echo "MeioAmbiente";
                elseif (strcmp($curso["nome"], $des)==0):
                    echo "Design";
                else:
                    echo $curso["nome"];
                endif;
                ?>.png');
                        position: absolute; background-size: contain;background-repeat: no-repeat;background-position-y: center;">
                </h1>
            </div>
            <div id="contFoot" style="background-color: #fff;color: #000;height: 20%;padding: 5%;border-top: solid #828282 2px;">
                <h3 style="float: right;margin-right: 5%;">
                    <?php
                    $this->load->model("usuarios_model");
                    $lista = $this->usuarios_model->vagas_cursos($curso['idCurso']);
                    $quant = $lista[0];
                        echo $quant['quant2'];?>
                        /
                        <?= $quant['quant'] ;?>
                    </h3>
            </div>
        </div>

        <?php
        endforeach;
            function corCurso($idCurso) {
                $cor="";
                switch ($idCurso) {
                    case 1:
                        $cor="#006478";
                        break;
                    case 3:
                        $cor="#293692";
                        break;
                    case 4:
                        $cor="#32689b";
                        break;
                    case 5:
                        $cor="#000";
                        break;
                    case 6:
                        $cor="#040707";
                        break;
                    case 7:
                        $cor="#00792b";
                        break;
                    case 8:
                        $cor="#443b18";
                        break;
                    case 9:
                        $cor="#a69533";
                        break;
                }
                return $cor;
            }
        ?>
    </div>
</div>