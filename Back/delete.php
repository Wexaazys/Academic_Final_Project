    <?php  
    session_start();
if($_SESSION["funcao"] == "Admin"){ 
$delete = $_GET;
$ID = $delete["id"];


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

$sql = "DELETE FROM armazem WHERE IDArmazem='".$ID."'";
  
      
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "ALTER TABLE armazem AUTO_INCREMENT = 1";
?>
<script>
    window.history.back("location:/PAP_Site/armazem.php");
 </script> 
  <?php
  
      
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
 
}elseif($_SESSION["funcao"] == "Funcionario"){
$delete = $_GET;
$ID = $delete["id"];


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

$sql = "DELETE FROM armazem WHERE IDArmazem='".$ID."'";
  
      
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "ALTER TABLE armazem AUTO_INCREMENT = 1";
?>
<script>
    window.history.back("location:/PAP_Site/armazem.php");
 </script> 
  <?php    
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
 

}else{
            header("Location: /PAP_Site/Back/logout.php");
    
}
    
?>