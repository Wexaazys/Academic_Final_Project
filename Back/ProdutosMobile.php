<?php

session_start();
if($_SESSION["funcao"] == "Admin"){
    $diret = $_GET["QRVar"];


//print_r($diret);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geston";

$dadosPost = $_POST;
$dadosPostID = $_POST["IDArmazem"];

$nome = $dadosPost["NomeProduto"];
$categoria = $dadosPost["Categoria"];
$quantidade = $dadosPost["Quantidade"];
$numeroEstante = $dadosPost["NumeroEstante"];
$qrCode = $dadosPost["QRCode"];
$descricaoProduto = $dadosPost["DescricaoProduto"];
$postID = $dadosPost["IDArmazem"];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE armazem SET NomeProduto = '$nome' ,Categoria = '$categoria', Quantidade ='$quantidade', NumeroEstante = '$numeroEstante', QRCode='$qrCode' ,DescricaoProduto='$descricaoProduto' WHERE IDArmazem='$postID'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

if(isset($_GET["QRVar"])){
    header("Location: /PAP_Site/Mobile/inicio.php?QRVar=$diret"); 
}else{
    header("Location: /PAP_Site/Mobile/inicio.php"); 
}

$conn->close();

}elseif($_SESSION["funcao"] == "Funcionario"){
    $diret = $_GET["QRVar"];


    //print_r($diret);
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "geston";
    
    $dadosPost = $_POST;
    $dadosPostID = $_POST["IDArmazem"];
    
    $nome = $dadosPost["NomeProduto"];
    $categoria = $dadosPost["Categoria"];
    $quantidade = $dadosPost["Quantidade"];
    $numeroEstante = $dadosPost["NumeroEstante"];
    $qrCode = $dadosPost["QRCode"];
    $descricaoProduto = $dadosPost["DescricaoProduto"];
    $postID = $dadosPost["IDArmazem"];
    
    
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "UPDATE armazem SET NomeProduto = '$nome' ,Categoria = '$categoria', Quantidade ='$quantidade', NumeroEstante = '$numeroEstante', QRCode='$qrCode' ,DescricaoProduto='$descricaoProduto' WHERE IDArmazem='$postID'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    if(isset($_GET["QRVar"])){
        header("Location: /PAP_Site/Mobile/inicio.php?QRVar=$diret"); 
    }else{
        header("Location: /PAP_Site/Mobile/inicio.php"); 
    }
    
    $conn->close();

}else{
    header("Location: /PAP_Site/Back/logout.php"); 
}

?>