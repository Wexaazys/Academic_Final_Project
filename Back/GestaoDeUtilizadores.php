<?php
session_start();
if($_SESSION["funcao"] == "Admin"){ 

$passwordDefault = "Password1";
$passwordADDHash = hash('sha512', $passwordDefault);
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GestON";

$email = $_POST["EscolhaEmails"];
$funcao = $_POST["Funcao"];
    
    if(isset($_POST["inlineRadioOptions"])) {
        if($_POST["inlineRadioOptions"] == "Reset"){
                $reset = $_POST["inlineRadioOptions"];
        }else{
                $reset = $_POST["inlineRadioOptions"];
        }
    }else{
        $reset = "Off";
    }
    
    print_r($reset);
    
    
if($reset == "Reset"){

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE utilizadores SET funcao = '$funcao', Password = '$passwordADDHash'  WHERE User = '$email' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    $_SESSION["Gestao"] = "Reposta";
} else {
    echo "Error updating record: " . $conn->error;
}
    
}elseif($reset == "Erase"){
    
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM utilizadores WHERE User = '$email' ";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    $_SESSION["Gestao"] = "Apagada";
} else {
    echo "Error deleting record: " . $conn->error;
}

    
    
    
    
}else{
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE utilizadores SET funcao = '$funcao' WHERE User = '$email' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    $_SESSION["Gestao"] = "Funcao";
} else {
    echo "Error updating record: " . $conn->error;
}
}

    
$conn->close();
    
header("location:/PAP_Site/Admin/gerirUsers.php");


}else{
   
    header("location:/PAP_Site/Back/logout.php");
    
}


?>