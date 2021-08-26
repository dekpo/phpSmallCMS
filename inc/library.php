<?php
// Fonction de logout()
function logOut(){
    header('HTTP/1.0 401 Unauthorized');
    die('<h1>Server says 401 (Unauthorized),<br> You must go <a href="../">Out !!!</a></h1>');
}

// Fonction de lecture d'un fichier complet texte
function readTitleParag($file){
    $myfile = fopen($file,"r");
    $title = fgets($myfile);
    $parag = "";
    while (!feof($myfile)){
        $parag .=fgets($myfile); 
    } 
    fclose($myfile);
    $result = [strip_tags($title),strip_tags($parag)];
    return $result;
}

// Fonction pour écrire dans un fichier
function writeAllTxt($file,$txt){
    $myfile = fopen($file,"w");
    fwrite($myfile,$txt);
    fclose($myfile);
}

// Fonction de lecture d'un fichier complet texte
function readAllTxt($file){
    $myfile = fopen($file,"r");
    $txt = fread($myfile,filesize($file));
    fclose(($myfile));
    return $txt;
}

// Fonction de traitement des champs input
function clearInput($input){
    $strCleared = trim($input);
    $strCleared = strip_tags($strCleared);
    $strCleared = stripslashes($strCleared);
    $strCleared = str_replace("/","",$strCleared);
    $strCleared = htmlspecialchars($strCleared,ENT_QUOTES);
    return $strCleared;
}

// Fonction pour faire un print_r avec <pre>
function print_r_pre($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

// Fonction pour faire un var_dump avec <pre>
function var_dump_pre($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

// Fonction pour calculer la tva à partir d'un total ttc
function dont_tva($total_ttc){
    $result = $total_ttc*0.2;
    return $result;
}

// Fonction qui retourne le type mime d'un fichier
function type_mime($file){
    return finfo_file(finfo_open(FILEINFO_MIME_TYPE),$file);
}