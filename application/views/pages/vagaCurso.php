<!-- home -->
<div class="w3-display-container2 w3-opacity-min inicio4 w3-white" >
    <div class="w3-bar-block fundoEmpresas"></div>
    <div class="w3-display-middle" style="white-space:nowrap;">
        <span class="w3-center w3-padding-large w3-black w3-jumbo w3-wide w3-animate-opacity">Vagas para Estágio!</span>
    </div>
</div>

<div id="main">

    <?php
    $idCurso=$cursos;
    $local = $localidades[0];
    if($local['quant']==0):
    ?>
        <div style="text-align: center;margin: 20%;margin-top: 25%;" id="myID">
            <h1 style="font-size: 80px;">OPS!</h1>
            <h1 style="font-size: 75px;">Nenhuma vaga aqui ainda!</h1>
        </div>
    <?php
    else:
    ?>
    <div id="vagas" style=" margin-top: 50px;">
        <div style="text-align: center;margin: 10%;">
            <h1 style="font-size: 80px;">Selecione agora uma localidade:</h1>
        </div>
        <?php
        foreach($localidades as $localidade):?>

        <div class="parent" style="width: 90%; margin-left: 5%;background-color: #ffffff; padding: 5%">
            <header style="height: 90px;">
                <h1 style="float: left;" > <?= anchor("localidade/".$localidade["cidade"], "".$localidade["cidade"], array("style"=>"text-decoration:none"));?></h1>
                <h3 style="float: right;margin-right: 5%;margin-top: 20px;">
                    <?php
                    echo $localidade['quant2'];?>
                    /
                    <?= $localidade['quant'] ;?>
                </h3>
            </header>

        </div>

    <?php
        endforeach;
        endif;
    ?>

    </div>
</div>