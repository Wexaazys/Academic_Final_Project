    <?php  
    session_start();
if($_SESSION["funcao"] == "Admin"){ 
    
//print_r($_POST);
    
$NomeProduto = $_POST["NomeProduto"];
$Categoria = $_POST["Categoria"];
$Quantidade = $_POST["Quantidade"];
$NumeroEstante = $_POST["NumeroEstante"];
$QRCode = $_POST["QRCode"];
$DescricaoProduto = $_POST["DescricaoProduto"];
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geston";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$sql = "INSERT INTO armazem (NomeProduto, Categoria, Quantidade, NumeroEstante, QRCode, DescricaoProduto) 
VALUES ('$NomeProduto', '$Categoria', '$Quantidade', '$NumeroEstante', '$QRCode', '$DescricaoProduto')";
  
      
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";

} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>
<script>
    window.history.go(-1)
 </script>
<?php
}elseif($_SESSION["funcao"] == "Funcionario"){
    
    
    
   // print_r($_POST);
    
$NomeProduto = $_POST["NomeProduto"];
$Categoria = $_POST["Categoria"];
$Quantidade = $_POST["Quantidade"];
$NumeroEstante = $_POST["NumeroEstante"];
$QRCode = $_POST["QRCode"];
$DescricaoProduto = $_POST["DescricaoProduto"];
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geston";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$sql = "INSERT INTO armazem (NomeProduto, Categoria, Quantidade, NumeroEstante, QRCode, DescricaoProduto) 
VALUES ('$NomeProduto', '$Categoria', '$Quantidade', '$NumeroEstante', '$QRCode', '$DescricaoProduto')";
  
      
if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";

} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>
<script>
    window.history.go(-1)
 </script>
<?php
    
    
}else{
    
    header("Location: /PAP_Site/Back/logout.php");
}
?>