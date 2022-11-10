<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="geston_logoPequeno.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <title>Gerir Utilizadores</title>
</head>    
<body background="/PAP_Site/Pattern.jpg">
<?php
session_start();
if($_SESSION["funcao"] == "Admin"){ 
   

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geston";

$con = new mysqli($servername, $username, $password, $dbname);
$result = mysqli_query($con,"SELECT * FROM utilizadores");
$option = '';
while($row = mysqli_fetch_array($result))
{
  $option .= '<option value = "'.$row['User'].'">'.$row['User'].'</option>';
}

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
                            <a class="dropdown-item active" href="/PAP_Site/Admin/gerirUsers.php">Gerir Utilizadores</a>
                            <a class="dropdown-item" href="/PAP_Site/Admin/addUsers.php">Adicionar Utilizadores</a>
                            <a class="dropdown-item" href="/PAP_Site/Admin/historico.php">Histórico de Logins</a>
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

<div class="col-3" style="margin-left:3em;min-width: 15em">
        <br> <br> 
    <h3>Gerir Utilizadores</h3>
    <br>  <br> 
<form action="/PAP_Site/Back/GestaoDeUtilizadores.php" method = 'post'>
      <label for="Emails">Escolher utilizador para alterações:</label>
      <select class="form-control" id="Emails" name="EscolhaEmails">
        <?php echo $option; ?>
      </select>
    <br>
<label for="Funcao">Nova função do utilizador:</label>
<select class="form-control" id="Funcao" name="Funcao">
       <option value="Admin">Admin</option>
       <option value="Funcionario">Funcionário</option>
      </select>
    <br>
    
<div class="form-check">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Reset" onclick="validateDays()">
  <label class="form-check-label" for="inlineRadio1">Repor Password Default</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Erase" onclick="validateDays()">
  <label class="form-check-label" for="inlineRadio2">Apagar a conta</label>
</div>
    
    <div id="Extras">
        
    </div>
    
     <br>
    <br>
    
    
<script type="text/javascript">
    
function validateDays() {
    if (document.getElementById("inlineRadio1").checked == true) {
        document.getElementById("Funcao").disabled=false;
    }
    else if (document.getElementById("inlineRadio2").checked == true) {
        document.getElementById("Funcao").disabled=true;
		if '.$row['User'].' == (document.getElementById("option") {
			
    }else {
        // DO NOTHING
        }
    }
    
    
    
</script>
 
<?php    
    if(isset($_SESSION["Gestao"])){
    if($_SESSION["Gestao"] == "Reposta"){
    echo '<script language="javascript">';
    echo '$("#Extras").html("<font color=green><br>Password reposta com sucesso.</font>")';
    echo '</script>';
    }elseif($_SESSION["Gestao"] == "Apagada"){
    
    echo '<script language="javascript">';
    echo '$("#Extras").html("<font color=green><br>Conta apagada com sucesso.</font>")';
    echo '</script>';
        
    }elseif($_SESSION["Gestao"] == "Funcao"){
    echo '<script language="javascript">';
    echo '$("#Extras").html("<font color=green><br>Função alterada com sucesso.</font>")';
    echo '</script>'; 
    }
    }else{
        
    }
    unset($_SESSION["Gestao"]);     
    
?>   
    
    
    
    
    
    
      <input type="submit" class="btn btn-primary" value="Alterar">

</form>
</div>
     
    
<?php
}else{
    header("Location: /PAP_Site/Back/logout.php");
}
?>
</body>
</html>


