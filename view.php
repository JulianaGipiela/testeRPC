<!DOCTYPE html>
<html>
    <head>
        
        <title>RPC | Programação</title>
        <meta charset="UTF-8">
        <meta name="description" content="Programação utilizando API">
        <meta name="author" content="Juliana Cecília Gipiela Corrêa Dias">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="resource/css/main.css" media="screen" />
        <link rel="preconnect" href="https://spans.gstatic.com">
        <link href="https://spans.googleapis.com/css2?family=Roboto:wght@100;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="shortcut icon" href="resource/img/icon.ico" />

    </head>
    <body>
        <header>
            <div class="menu">
                <img src="resource/img/logo_web.png" class="img-logo">
            </div>  
        </header>
    
        

    <div class="container">
        <h1> PROGRAMAÇÃO </h1>
        
        <div class="flex-container-now">     
            <div><img src="<?php echo $toNow["imgPrograma"]; ?>" class="img-now"></div>
            <div class="marginLive">
                <h2 class="titleNow-content-hr">Passando Agora</h2>   
                <h2 class="titleNow-content"> <?php echo $toNow["tituloPrograma"]; ?></h2>
            </div>  
        </div>
      
        <div class="flex-container-lista-title margin-10">
            <div class="<?php echo $urlPrev=="#" ? "iconArrowDisabled":"iconArrow" ?>"><a href="<?php 
                echo $urlPrev; ?>" ><i class="fas fa-arrow-circle-left"></i></a></div>
            <div>
                <h2 class="titleDate"><?php echo $dateNow; ?></h2> 
            </div>
            <div class="<?php echo $urlNext=="#" ? "iconArrowDisabled":"iconArrow" ?>"><a href="<?php
                echo $urlNext;
            ?>"><i class="fas fa-arrow-circle-right"></i></a></div>
        </div>

    <?php 
        foreach ($programation as $p) {
    ?>
      
        <button type="button" class="collapsible">
            <div class="flex-container-lista">                
                <div class="margin-10 time"><div class="textHour"><?php echo $p["humanStartTime"]; ?> às <?php echo $p["humanEndTime"]; ?><span class="textRed"><?php echo $p["noAr"]? "<br/> Ao Vivo" : "";?></span></div></div>
                <div class="flex-group-time">
                    <div class="margin-10"><img src="<?php echo $p["logoPrograma"];?>" class="img-logo-prog"></div>
                    <div class="margin-10"><div class="textTitle"><?php echo $p["tituloPrograma"];?></div></div>
                </div>    
            </div>  
        </button>
        
        <div class="content">
            <div class="flex-container-conteudo">               
                <div class="width40"><img src="<?php echo $p["imgPrograma"]!=null ? $p["imgPrograma"] : "https://s2.glbimg.com/7Vhaxhj9PGP2p_fadpUh21SRQQ4=/s.glbimg.com/og/rg/f/original/2017/01/30/banner.png";?>" class="img-content"></div>
                <div class="width60">
                    <p>                       
                        <span class="textContent"><?php echo $p["descricao"];?></span>
                    </p>
                    <p>
                        <span class="textContent"><?php echo $p["sinopse"]==null ? $p["sinopse"]:"Sem Sinopse";?></span>
                    </p>
                    <p>
                        <span class="textTitleContent"> Classificação </span>
                    </p>
                    <p>
                        <span class="textTitleContent"> Idade: </span>
                        <span class="textContent"><?php echo $p["idade"];?></span>
                        <span class="textTitleContent"> Sexo: </span>
                        <span class="textContent"><?php echo $p["sexo"]? "Contém" : "Não contém";?></span>
                        <span class="textTitleContent"> Drogas: </span>
                        <span class="textContent"> <?php echo $p["drogas"]? "Contém" : "Não contém";?></span>
                        <span class="textTitleContent"> Violência: </span>
                        <span class="textContent"> <?php echo $p["violencia"]? "Contém" : "Não contém";?></span>
                    </p>
                
                </div>
            </div>
        </div>
    <?php
        }
    ?>

    </div>        
        </div>
        <footer>
            <div>
               <span class="textFooter">Desenvolvido por Juliana Cecília </span>
            </div>  
        </footer>
        <script type="text/javascript" src="resource/js/main.js"></script>
    </body>
</html>
