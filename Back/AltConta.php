<?php
session_start();
if($_SESSION["funcao"] == "Admin"){    


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "geston";
    
    $userSession = $_SESSION["username"];
    $PassPostData = $_POST["Veri1password"];
    $PassPost = hash('sha512', $PassPostData);
    $PassNovaPost = $_POST["Veri4password"];   
    $PassNova = hash('sha512', $PassNovaPost); 
    
        
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT User,Password FROM Utilizadores WHERE User = '$userSession' ";
    $result = $conn->query($sql);
    
    while($row = $result->fetch_assoc()) {
        $dadosSe = $row;
    }
        
        
        $SQPass = $dadosSe["Password"];
        
    if( $SQPass == $PassPost){
        
    $sql = "UPDATE Utilizadores SET Password='$PassNova' WHERE User = '$userSession' ";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
       $_SESSION["AltOuNao"] = "S";
    
    }else{
        
       $_SESSION["AltOuNao"] = "N";
        
    }
        
    $conn->close();
    ?>
    <script>
        window.history.back();
    </script>
 <?php   
}elseif($_SESSION["funcao"] == "Funcionario"){    
 


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "geston";
    
    $userSession = $_SESSION["username"];
    $PassPostData = $_POST["Veri1password"];
    $PassPost = hash('sha512', $PassPostData);
    $PassNovaPost = $_POST["Veri4password"];   
    $PassNova = hash('sha512', $PassNovaPost); 
    
        
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT User,Password FROM Utilizadores WHERE User = '$userSession' ";
    $result = $conn->query($sql);
    
    while($row = $result->fetch_assoc()) {
        $dadosSe = $row;
    }
        
        
        $SQPass = $dadosSe["Password"];
        
    if( $SQPass == $PassPost){
        
    $sql = "UPDATE Utilizadores SET Password='$PassNova' WHERE User = '$userSession' ";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
       $_SESSION["AltOuNao"] = "S";
    
    }else{
        
       $_SESSION["AltOuNao"] = "N";
        
    }
        
    $conn->close();
    
    ?>
    <script>
        window.history.back();
    </script>
 <?php  
}else{
     header("Location: /PAP_Site/Back/logout.php");
}

?>