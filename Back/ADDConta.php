<?php
session_start();
if($_SESSION["funcao"] == "Admin"){ 
print_r($_POST);
$passwordADD = "Password1";
$passwordADDHash = hash('sha512', $passwordADD);
$emailnovo = $_POST["EmailADD"];
$func = $_POST["FuncaoSele"]; 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geston";

$con = new mysqli($servername, $username, $password, $dbname);
$result = mysqli_query($con,"SELECT * FROM utilizadores");
while($row = mysqli_fetch_array($result))
{
  $emails[] = $row;
}
    
    
    foreach($emails as $value){
$emailTratados[] = $value["User"];
    }
    
foreach($emailTratados as $value){
    if($emailnovo == $value){
        $_SESSION["EmailNovo"] = "Igual";
        break;  
    }else{
        $_SESSION["EmailNovo"] = "Novo";
            
            
$sql = "INSERT INTO utilizadores (User, Password, funcao)
VALUES ('$emailnovo', '$passwordADDHash', '$func')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
            
        }
        
    }
    header("Location: /PAP_Site/Admin/addUsers.php");   
}else{
    header("Location: /PAP_Site/Back/logout.php");   
}


?>

