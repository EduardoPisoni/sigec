<!-- home -->
<div class="w3-display-container2 w3-opacity-min inicio5 w3-white" >
    <div class="w3-bar-block fundoEmpresas"></div>
    <div class="w3-display-middle" style="white-space:nowrap;">
        <span class="w3-center w3-padding-large w3-black w3-jumbo w3-wide w3-animate-opacity">Bem-vinda, Priscila!</span>
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
<div id="main">
    <a href="http://localhost/code/index.php/login/logout" class="btn btn-lg botaoSair" >Sair</a>
    <div style="margin-top: 10%;margin-bottom: 10%;">
        <div class="parent" style="width: 90%; margin-left: 5%;background-color: #ffffff; padding: 5%">
            <header style="height: 90px;">
                <h1 style="float: left;"><?= anchor("todasEmpresas", "Todas Empresas"); ?></h1>
            </header>
        </div>
        <br>
        <div class="parent" style="width: 90%; margin-left: 5%;background-color: #ffffff; padding: 5%">
            <header style="height: 90px;">
                <h1 style="float: left;">Todas Vagas</h1>
            </header>
        </div>
    </div>
    <script>
        $('.parent').on("click",function(){
            $(this).find(".sub-nav").toggle(600);
            $(this).siblings().find(".sub-nav").hide(600);
        });
    </script>
</div>