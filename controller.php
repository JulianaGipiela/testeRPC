<?php
    date_default_timezone_set('America/Sao_Paulo');
    $datetoAPI = date('Y-m-d');
    if(isset($_GET["date"])) {
        $dateVal = DateTime::createFromFormat('Y-m-d', $_GET["date"]);
        if($dateVal !== false){
            $datetoAPI = date('Y-m-d', strtotime($_GET["date"]));
        }        
    }
    $isToDay = ($datetoAPI == date('Y-m-d'));    
    $apiContent = file_get_contents("https://epg-api.video.globo.com/programmes/1337?date=".$datetoAPI);
    $data = json_decode($apiContent);
    $dateNow = $data->programme->date;
    $timestamp = strtotime($dateNow);    
    $dateNow = date('d/m/Y', $timestamp);
    $week = array('DOMINGO', 'SEGUNDA', 'TERÇA', 'QUARTA', 'QUINTA', 'SEXTA', 'SÁBADO');
    $weekNum = date('w', $timestamp);
    $dateNow =  $week[ $weekNum]." - ".$dateNow;
    $programation = array();
    $toNow = null;
    foreach ($data->programme->entries as $entry) {
        $now = date('H:i');
        $start = date('H:i', strtotime($entry->human_start_time));
        $end = date('H:i', strtotime($entry->human_end_time));
        $estaNoAr = false;        
        if($now < $end && $now >= $start && $isToDay) {
            $estaNoAr = true;
        }
        $description = isset($entry->custom_info->Resumos->ResumoImprensa) && $entry->custom_info->Resumos->ResumoImprensa != "" ? $entry->custom_info->Resumos->ResumoImprensa : $entry->description; 
        $aux = array(
            "humanStartTime" =>  $start,
            "humanEndTime" => $end,
            "tituloPrograma" => $entry->title,
            "descricao" => $description,
            "sinopse" => $entry->custom_info->Resumos->Sinopse,
            "idade" => $entry->custom_info->Classificacao->Idade,
            "sexo" => $entry->custom_info->Classificacao->Sexo,
            "drogas" => $entry->custom_info->Classificacao->Drogas,
            "violencia" => $entry->custom_info->Classificacao->Violencia,
            "imgPrograma" => $entry->custom_info->Graficos->ImagemURL,
            "logoPrograma" => $entry->custom_info->Graficos->LogoURL,
            "noAr" => $estaNoAr);           
            array_push($programation, $aux);
            if($estaNoAr){               
                $toNow = $aux;
            }
    }

    if($toNow == null) {
        $apiContentNow = file_get_contents("https://epg-api.video.globo.com/programmes/1337?date=".date('Y-m-d'));
        $dataNow = json_decode($apiContentNow);

        foreach ($dataNow->programme->entries as $entry) {
            $now = date('H:i');
            $start = date('H:i', strtotime($entry->human_start_time));
            $end = date('H:i', strtotime($entry->human_end_time));
            if($now < $end && $now >= $start) {             
                $toNow = array(
                    "humanStartTime" =>  $start,
                    "humanEndTime" => $end,
                    "tituloPrograma" => $entry->title,
                    "descricao" => $entry->description,
                    "sinopse" => $entry->custom_info->Resumos->Sinopse,
                    "idade" => $entry->custom_info->Classificacao->Idade,
                    "sexo" => $entry->custom_info->Classificacao->Sexo,
                    "drogas" => $entry->custom_info->Classificacao->Drogas,
                    "violencia" => $entry->custom_info->Classificacao->Violencia,
                    "imgPrograma" => $entry->custom_info->Graficos->ImagemURL,
                    "logoPrograma" => $entry->custom_info->Graficos->LogoURL,
                    "noAr" => true);   
            }
        }
    }
    $urlNext = "#";
    $urlPrev = "#"; 

    if($datetoAPI>date('Y-m-d', strtotime('-1 days',  strtotime(date('Y-m-d'))))) {
        $urlPrev = "?date=".date('Y-m-d', strtotime('-1 days',  strtotime($datetoAPI)));
    } 
    if($datetoAPI<date('Y-m-d', strtotime('+1 days',  strtotime(date('Y-m-d'))))) {
        $urlNext = "?date=".date('Y-m-d', strtotime('+1 days',  strtotime($datetoAPI)));
    }
   // echo "<pre>";
   // print_r($programation);

    require("view.php");

?>
