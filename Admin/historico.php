<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="geston_logoPequeno.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <title>Historico de Logins</title>
</head>

<body background="/PAP_Site/Pattern.jpg">
    
    <?php
    session_start();
    if($_SESSION["funcao"] == "Admin"){ 
    ?>
    
     
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	<img src="geston_logo.png" width="100" height="35"  alt="">
            <a class="navbar-brand" href="/PAP_Site/AdminFuncionario/inicio.php"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/PAP_Site/AdminFuncionario/inicio.php">Início <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PAP_Site/AdminFuncionario/armazem.php">Armazém</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PAP_Site/AdminFuncionario/QRCode.php">Gerar Código QR</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Área Admin
        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/PAP_Site/Admin/gerirUsers.php">Gerir Utilizadores</a>
                            <a class="dropdown-item" href="/PAP_Site/Admin/addUsers.php">Adicionar Utilizadores</a>
                            <a class="dropdown-item active" href="/PAP_Site/Admin/historico.php">Histórico de Logins</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PAP_Site/AdminFuncionario/conta.php">Conta</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action='/PAP_Site/Back/logout.php' method='post'>
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="LogOut">LogOut</button>
                </form>
            </div>
        </nav>

<?php    
    $con=mysqli_connect("localhost","root","","geston");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM historico_logins");

echo '<div class="col-4" style="margin-left:3em;">';
echo '
     <br> <br>   
    <h3>Histórico</h3>
    <br>  
';
echo "<table class='table'>
<table class='table table-hover'>
<thead class='thead-light'>
<tr>
<th>Utilizador que fez login:</th>
<th>Data:</th>
</tr>
</thead>
";


    $i = 0;
    $u = 0;
while($row = mysqli_fetch_array($result))
{
$i++;
    
echo "<tr>";
//echo "<td> <input type='text' name='name' id = 'name'>' . $row['nome'] . '</td>";
    
    
echo"<td>"; echo $row['NomeUtilizadorHistorico']; echo"</td>";
echo"<td style='min-width:10em'>"; echo $row['DataHistorico']; echo"</td>";
echo"<td hidden>"; echo $row['IDHistoricoLogins']; echo"</td>";  

    
$u++;       
    
    
    
    
echo "</tr>";

   
}
        


    
    
    
    
    


   
echo "</table>";
        echo "</br>";
       echo" <form action ='/PAP_Site/Back/ApagarTudo.php' method = 'post'>";
         echo'   <input type="submit" class="btn btn-danger"  value="Apagar todo o histórico"/> ';
         echo" </form>";
echo '</div>';
echo "</br>";
                


    
    
    
    
    
    
    
 ?>   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php
    }else{
          header("Location: /PAP_Site/Back/logout.php");
    }
    ?>

</body>

</html>