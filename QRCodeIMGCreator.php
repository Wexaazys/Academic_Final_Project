<?php
require "vendor/autoload.php";
use Endroid\QrCode\QrCode;


session_start();
    if($_SESSION["funcao"] == "Admin"){
        
        $TextPost = $_GET["QR"];



$qrCode = new QrCode($TextPost);

header('Content-Type: '.$qrCode->getContentType());
echo $qrCode->writeString();
        
    }elseif($_SESSION["funcao"] == "Funcionario"){
        $TextPost = $_GET["QR"];



$qrCode = new QrCode($TextPost);

header('Content-Type: '.$qrCode->getContentType());
echo $qrCode->writeString();
        
        
   }else{
        header("Location: /PAP_Site/Back/logout.php");
    }


?>