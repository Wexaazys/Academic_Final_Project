<?php
session_start();
if($_SESSION["funcao"] == "Admin"){ 
print_r($_POST);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geston";

$con = new mysqli($servername, $username, $password, $dbname);
$result = mysqli_query($con,"TRUNCATE TABLE historico_logins");
while($row = mysqli_fetch_array($result))
{
  $emails[] = $row;
}

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
    header("Location: /PAP_Site/Admin/historico.php");               

}else{
    header("Location: /PAP_Site/Back/logout.php");   
}


?>


