<html>
        <head>
            <link rel="stylesheet" href="<?= base_url('/css/bootstrap.css')?>">
            <link rel="stylesheet" href="<?= base_url('/css/styles.css')?>">
            <script language="JavaScript" src="<?= base_url('/script/script.js')?>"> </script>
            <script language="JavaScript" src="<?= base_url('/script/jquery.js')?>"> </script>
            <title>SIGEC</title>
        </head>
        <body>
            <!-- header -->
            <div id="cont">
                <div class="header w3-white" id="myNavbar">
                    <button id="openNav" class="w3-xlarge2 menuCell" onclick="w3_open2()" >&#9776;</button>
                    <img src="<?= base_url('imagens/sigecBranco.png')?>" class="logo"  onclick="subir();">
                </div>
                <!-- menu -->
                <div class="" style="display:none" id="mySidebar">
                    <div class="header2 w3-red w3-animate-left"></div>
                    <div class="w3-sidebar w3-bar-block w3-card menuCelular w3-animate-left">
                        <a href="<?= base_url(index_page()."/home")?>" onclick="w3_close()" class="w3-bar-item w3-button aMenu" >Home</a>
                        <a href="<?= base_url(index_page()."/empresa")?>" onclick="w3_close()" class="w3-bar-item w3-button aMenu" >Empresa</a>
                        <a href="<?= base_url(index_page()."/vagas")?>" onclick="w3_close()" class="w3-bar-item w3-button aMenu" >Vagas</a>
                    </div>
                    <div class="w3-bar-block menuCelular2 w3-animate-fading" onclick="w3_close()"></div>
                </div>
            </div>