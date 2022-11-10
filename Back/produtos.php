<?php
session_start();
if($_SESSION["funcao"] == "Admin"){
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


echo "<pre>";
print_r($dadosPost);
echo "</pre>";

$u = 0;
foreach($dadosPostID as $value){

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "UPDATE armazem SET NomeProduto ='$nome[$u]' ,Categoria='$categoria[$u]', Quantidade='$quantidade[$u]', NumeroEstante='$numeroEstante[$u]', QRCode='$qrCode[$u]' ,DescricaoProduto='$descricaoProduto[$u]' WHERE IDArmazem='$postID[$u]'";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }
    $u++;
}


header("Location: /PAP_Site/AdminFuncionario/armazem.php"); 
}elseif($_SESSION["funcao"] == "Funcionario"){
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
    
    
    echo "<pre>";
    print_r($dadosPost);
    echo "</pre>";
    
    $u = 0;
    foreach($dadosPostID as $value){
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 
    
        $sql = "UPDATE armazem SET NomeProduto ='$nome[$u]' ,Categoria='$categoria[$u]', Quantidade='$quantidade[$u]', NumeroEstante='$numeroEstante[$u]', QRCode='$qrCode[$u]' ,DescricaoProduto='$descricaoProduto[$u]' WHERE IDArmazem='$postID[$u]'";
    
        if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
        }
        $u++;
    }
    
    
    header("Location: /PAP_Site/AdminFuncionario/armazem.php"); 
    
}else{
    header("Location: /PAP_Site/Back/logout.php");     
}
    
?>