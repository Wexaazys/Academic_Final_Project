<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="geston_logoPequeno.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/PAP_Site/JS/hash.js" crossorigin="anonymous"></script>
    <title>Conta</title>
</head>

<body background="/PAP_Site/Pattern.jpg">
    <?php
session_start();

$userdata = $_SESSION["username"];

 $con=mysqli_connect("localhost","root","","geston");
    
    
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
      $result = mysqli_query($con,"SELECT * FROM utilizadores WHERE User = '$userdata' ");    
 
$row_cnt = $result->num_rows;    
    
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $password = $row["Password"];
    }
}





if($_SESSION["funcao"] == "Admin"){ 
    //print_r($_SESSION);   
    ?>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/PAP_Site/Mobile/inicio.php"><img src="geston_logo.png" width="100" height="30" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/PAP_Site/Mobile/inicio.php">Início <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/PAP_Site/Mobile/conta.php">Conta</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action='/PAP_Site/Back/logout.php' method='post'>
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="LogOut">LogOut</button>
                </form>
            </div>
        </nav>

<form action="/PAP_Site/Back/AltConta.php" method="post">

                    <div class="col-3" style="margin-left:1em;">
                            <br> <br> 
    
    <h3>Conta</h3>
    <br>  <br> 
    <?php echo('<input style="min-width: 15em"; class="form-control" type="text" value="'.$_SESSION['username'].'" readonly>')?>
    <br> 
    <input style="min-width: 15em"; class="form-control" placeholder="Password Atual da Conta" type="password" name="Veri1password" id="Veri1JSpassword"><br>
    <!-- <input style="min-width: 10em"; class="form-control" placeholder="Verificar Password" type="password" name="Veri2password" id="Veri2JSpassword" onChange="checkPasswordMatch();"><br> -->            
    <input style='min-width: 15em'; class='form-control' placeholder='Nova Password' type='password' name='Veri3password' id="Veri3password" pattern='.{6,}' required title='A Password tem de ter pelo menos 6 carateres.'>
    <br>
    <input style='min-width: 15em'; class='form-control' placeholder=' Confirme a nova Password' type='password' name='Veri4password' id="Veri4password" pattern='.{6,}' required title='A Password tem de ter pelo menos 6 carateres.'>
    <div id="changes"></div>
    <div id="Confirm"></div>
    <br>
    <br>

                    </div>
                        </form>
    

    
    
<?php
    
    
}elseif($_SESSION["funcao"] == "Funcionario"){
?>   
   
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/PAP_Site/Mobile/inicio.php"><img src="geston_logo.png" width="100" height="30" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/PAP_Site/Mobile/inicio.php">Início <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/PAP_Site/Mobile/conta.php">Conta</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action='/PAP_Site/Back/logout.php' method='post'>
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="LogOut">LogOut</button>
                </form>
            </div>
        </nav>

<form action="/PAP_Site/Back/AltConta.php" method="post">

                    <div class="col-3" style="margin-left:1em;">
                            <br> <br> 
    
    <h3>Conta</h3>
    <br>  <br> 
    <?php echo('<input style="min-width: 15em"; class="form-control" type="text" value="'.$_SESSION['username'].'" readonly>')?>
    <br> 
    <input style="min-width: 15em"; class="form-control" placeholder="Password Atual da Conta" type="password" name="Veri1password" id="Veri1JSpassword"><br>
    <!-- <input style="min-width: 10em"; class="form-control" placeholder="Verificar Password" type="password" name="Veri2password" id="Veri2JSpassword" onChange="checkPasswordMatch();"><br> -->            
    <input style='min-width: 15em'; class='form-control' placeholder='Nova Password' type='password' name='Veri3password' id="Veri3password" pattern='.{6,}' required title='A Password tem de ter pelo menos 6 carateres.'>
    <br>
    <input style='min-width: 15em'; class='form-control' placeholder=' Confirme a nova Password' type='password' name='Veri4password' id="Veri4password" pattern='.{6,}' required title='A Password tem de ter pelo menos 6 carateres.'>
    <div id="changes"></div>
    <div id="Confirm"></div>
    <br>
    <br>

                    </div>
                        </form>
    
    
    
    
    
<?php   
      
}else{
    header("Location: /PAP_Site/Back/logout.php");
} 
    
  
 
    
if(isset($_SESSION["AltOuNao"])){
    if($_SESSION["AltOuNao"] == "N"){
    echo '<script language="javascript">';
    echo '$("#Confirm").html("<br><font color=red>Password Errada!</font>")';
    echo '</script>';
    }elseif($_SESSION["AltOuNao"] == "S"){
    
    echo '<script language="javascript">';
    echo '$("#Confirm").html("<br><font color=green>Password Alterada!</font>")';
    echo '</script>';
        
    }
    }else{
        
    }
    unset($_SESSION["AltOuNao"]); 
    
    
    
?>

<script language="javascript">
var dataPencrypt = <?php echo json_encode($password) ?>;

function checkPassword() {
var inputPass = document.getElementById("Veri1JSpassword").value;
var dataPDecrypt = sha512(inputPass);

    if (inputPass != 0) {
        if (dataPencrypt != dataPDecrypt) {
            $("#changes").html("<br>A Password está errada!");
            var BoolPass = "False";
        } else {
            var BoolPass = "True";
            $("#changes").html("");
            checkPasswordsNovas();
        }
    } else {
        var BoolPass = "False";
        $("#changes").html("");
    }
    
    return BoolPass;
}

var func1 = checkPassword();

function checkPasswordsNovas() {
var inputPass3 = document.getElementById("Veri3password").value;
var inputPass4 = document.getElementById("Veri4password").value;

    if (inputPass3 != 0) {
        if (inputPass3 != inputPass4) {
            $("#changes").html("<br>As Password Novas não correspondem!");
        } else{
            $("#changes").html("<br><input type='submit' class='btn btn-success' value='Alterar'>");
            
        }
    } else {
        $("#changes").html("<br>Coloque a sua Nova Password!");
    }
}


$(document).ready(function () {
    $("#Veri1JSpassword").keyup(checkPassword);
});

$(document).ready(function () {
    $("#Veri3password, #Veri4password").keyup(checkPasswordsNovas);
});

</script>



    
    
</body>
</html>