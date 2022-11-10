<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="geston_logoPequeno.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <title>QRCode</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="/PAP_Site/AdminFuncionario/QRCode.php">Gerar Código QR</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Área Admin
        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/PAP_Site/Admin/gerirUsers.php">Gerir Utilizadores</a>
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
    
    
    <div class="container" id="QRCodeBox" style="margin-left:2em;">
        <br>
        <div class="row">
            <div class="col-md-4" style="background-color: white; padding:20px; box-shadow:10px 10px 5px #888;">
                <div class="panel-heading">
                    <h2>Crie o seu QR Code</h2>
                </div>
                <br>
                <form action="QRCodeCreate.php" method="get">
                <input type="text" name="QR" class="form-control" style="border-radius: 0px;" placeholder="Texto para o QR Code" value="" autocomplete="off" required maxlength="50">
                <br>
                <input type="submit" class="btn btn-md btn-danger btn-block" value="Gerar QR Code">
                    </form>
            </div>
        </div>    
    </div>

    
    
    
    
    

    
    <?php
    }elseif($_SESSION["funcao"] == "Funcionario"){
        ?>
    
        
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
<img src="geston_logo.png" width="100" height="35"  alt="">
<a class="navbar-brand"  href="/PAP_Site/AdminFuncionario/inicio.php"></a>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="/PAP_Site/AdminFuncionario/QRCode.php">Gerar Código QR</a>
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
    
    
    <div class="container" id="QRCodeBox" style="margin-left:2em;">
        <br>
        <div class="row">
            <div class="col-md-4" style="background-color: white; padding:20px; box-shadow:10px 10px 5px #888;">
                <div class="panel-heading">
                    <h2>Crie o seu código QR</h2>
                </div>
                <br>
                <form action="QRCodeCreate.php" method="get">
                <input type="text" name="QR" class="form-control" style="border-radius: 0px;" placeholder="Texto para o QRCode" value="" autocomplete="off" required maxlength="50">
                <br>
                <input type="submit" class="btn btn-md btn-danger btn-block" value="Gerar QRCode">
                    </form>
            </div>
        </div>    
    </div>
    
    <?php
    }else{
        header("Location: /PAP_Site/Back/logout.php");
    }
        ?>

</body>
</html>
