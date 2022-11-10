<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="geston_logoPequeno.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <title>Armazém</title>
	
	
	
	 <meta charset="UTF-8">
     <link rel="stylesheet" href="style.css">
      <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
      
	  
	  

</head>

<body background="/PAP_Site/Pattern.jpg">

    
<style type="text/css">
a {
  color: inherit;
}
a:hover { 
    color: inherit;
}
</style>

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
                    <li class="nav-item active">
                        <a class="nav-link" href="/PAP_Site/AdminFuncionario/armazem.php">Armazém</a>
                    </li>
                    <li class="nav-item">
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


    <?php
   
$con=mysqli_connect("localhost","root","","geston");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM armazem");
echo "</br>";


echo '<div class="col-6" style="margin-left:3em;">';
echo'       
    <br>   

        <h3>Armazém</h3>

      <br>        
     ';
        
echo "<form action ='/PAP_Site/Back/produtos.php' method = 'post'>";
echo "<table class='table table-hover'>
<thead class='thead-light'>
<tr>
<th colspan='1' class='text-center'>#</th>
<th colspan='1' class='text-center'>Nome</th>
<th colspan='1' class='text-center'>Categoria</th>
<th colspan='1' class='text-center'>Quantidade</th>
<th colspan='1' class='text-center'>Estante</th>
<th colspan='1' class='text-center'>QRCode</th>
<th colspan='1' class='text-center'>Anotações</th>
<th colspan='1' class='text-center'></th>
</tr>
</thead>";
             
$row_cnt = $result->num_rows;



    $u = 0;
while($row = mysqli_fetch_array($result))
{
echo "<tbody>";   
echo "<tr>";
//echo "<td> <input type='text' name='name' id = 'name'>' . $row['nome'] . '</td>";
echo '<td>'.$row['IDArmazem'].'</td>';  
echo '<td><input autocomplete="off" type="text" name="NomeProduto['.$u.']" class="form-control" maxlength="50" value="'.$row['NomeProduto'].'" size="6" style="min-width: 7em;"></td>'; 
echo '<td><input autocomplete="off" type="text" name="Categoria['.$u.']" class="form-control" maxlength="50" value="'.$row['Categoria'].'" size="8" style="min-width: 8em;"></td>';
echo '<td><input autocomplete="off" type="text" name="Quantidade['.$u.']" class="form-control" maxlength="50" value="'.$row['Quantidade'].'" size="1" style="min-width: 1em;"></td>';
echo '<td><input autocomplete="off" type="text" name="NumeroEstante['.$u.']" class="form-control" maxlength="10" value="'.$row['NumeroEstante'].'" size="1" style="min-width: 3em;"></td>';
echo '<td><input type="text" name="QRCode['.$u.']" class="form-control" maxlength="10" value="'.$row['QRCode'].'" size="1" style="min-width: 1em;"></td>';
echo '<td> <textarea class="form-control" rows="2" maxlength="146" id="comment" name="DescricaoProduto['.$u.']" style="min-width: 20em" >'.$row['DescricaoProduto'].'</textarea></td>';
echo '<td hidden><input type="text" name="IDArmazem['.$u .']"  class="form-control" value="'.$row['IDArmazem'].'" ></td>';
echo '<td><a href=/PAP_Site/Back/delete.php?id='.$row['IDArmazem'].'>Delete</a></td>';


echo "</tbody>"; 
 

$u++;       
    
    
    
    
echo "</tr>";

   
}




   
echo "</table>";

echo "</br>";
echo '<input type="submit" class="btn btn-primary"  value="Atualizar"/>'; 
echo "</form>"; 
     echo "</br>";




    
    
    
    ?>
  


  
  
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Adicionar Produto</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action ='/PAP_Site/Back/adicionar_Produto.php' method = 'post'>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input autocomplete="off" type="text" name="NomeProduto" class="form-control" maxlength="50" id="recipient-name" placeholder="Nome" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Categoria:</label>
            <input autocomplete="off" type="text" name="Categoria" class="form-control" maxlength="50" id="recipient-name" placeholder="Categoria">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantidade:</label>
            <input autocomplete="off" type="text" name="Quantidade" class="form-control" maxlength="50" id="recipient-name" placeholder="Quantidade">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estante:</label>
            <input autocomplete="off" type="text" name="NumeroEstante" class="form-control" maxlength="25" id="recipient-name" placeholder="Estante" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">QRCode:</label>
            <input autocomplete="off" type="text" name="QRCode" class="form-control" maxlength="10" id="recipient-name" placeholder="QRCode" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Anotações:</label>
            <textarea class="form-control" rows="2" maxlength="146" id="comment" name="DescricaoProduto"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary"  value="Inserir"/>
      </div>
          </form>
		  </div>
		    
		  
		  
    </div>
  </div>
</div>
    <br>
    <br>

    
    
    
    
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
                    <li class="nav-item active">
                        <a class="nav-link" href="/PAP_Site/AdminFuncionario/armazem.php">Armazém</a>
                    </li>
                    <li class="nav-item">
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


    

    
    <?php
   
$con=mysqli_connect("localhost","root","","geston");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM armazem");
echo "</br>";


echo '<div class="col-6" style="margin-left:3em;">';
echo'       
    <br>   

        <h3>Armazém</h3>

      <br>        
     ';
        
echo "<form action ='/PAP_Site/Back/produtos.php' method = 'post'>";
echo "<table class='table table-hover'>
<thead class='thead-light'>
<tr>
<th colspan='1' class='text-center'>#</th>
<th colspan='1' class='text-center'>Nome</th>
<th colspan='1' class='text-center'>Categoria</th>
<th colspan='1' class='text-center'>Quantidade</th>
<th colspan='1' class='text-center'>Estante</th>
<th colspan='1' class='text-center'>QRCode</th>
<th colspan='1' class='text-center'>Anotações</th>
<th colspan='1' class='text-center'></th>
</tr>
</thead>";
             
$row_cnt = $result->num_rows;



    $u = 0;
while($row = mysqli_fetch_array($result))
{
echo "<tbody>";   
echo "<tr>";
//echo "<td> <input type='text' name='name' id = 'name'>' . $row['nome'] . '</td>";
echo '<td>'.$row['IDArmazem'].'</td>';  
echo '<td><input autocomplete="off" type="text" name="NomeProduto['.$u.']" class="form-control" maxlength="50" value="'.$row['NomeProduto'].'" size="6" style="min-width: 7em;"></td>'; 
echo '<td><input autocomplete="off" type="text" name="Categoria['.$u.']" class="form-control" maxlength="50" value="'.$row['Categoria'].'" size="8" style="min-width: 8em;"></td>';
echo '<td><input autocomplete="off" type="text" name="Quantidade['.$u.']" class="form-control" maxlength="50" value="'.$row['Quantidade'].'" size="1" style="min-width: 1em;"></td>';
echo '<td><input autocomplete="off" type="text" name="NumeroEstante['.$u.']" class="form-control" maxlength="25" value="'.$row['NumeroEstante'].'" size="1" style="min-width: 9em;"></td>';
echo '<td><input type="text" name="QRCode['.$u.']" class="form-control" maxlength="10" value="'.$row['QRCode'].'" size="1" style="min-width: 1em;"></td>';
echo '<td> <textarea class="form-control" rows="2" maxlength="146" id="comment" name="DescricaoProduto['.$u.']" style="min-width: 8em";>'.$row['DescricaoProduto'].'</textarea></td>';
echo '<td hidden><input type="text" name="IDArmazem['.$u .']"  class="form-control" value="'.$row['IDArmazem'].'" ></td>';
echo '<td><a href=/PAP_Site/Back/delete.php?id='.$row['IDArmazem'].'>Delete</a></td>';


echo "</tbody>"; 
 

$u++;       
    
    
    
    
echo "</tr>";

   
}




   
echo "</table>";

echo "</br>";
echo '<input type="submit" class="btn btn-primary"  value="Atualizar"/>'; 
echo "</form>"; 
     echo "</br>";




    
    
    
    ?>
    
  
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Adicionar Produto</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action ='/PAP_Site/Back/adicionar_Produto.php' method = 'post'>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input autocomplete="off" type="text" name="NomeProduto" class="form-control" maxlength="50" id="recipient-name" placeholder="Nome" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Categoria:</label>
            <input autocomplete="off" type="text" name="Categoria" class="form-control" maxlength="50" id="recipient-name" placeholder="Categoria">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantidade:</label>
            <input autocomplete="off" type="text" name="Quantidade" class="form-control" maxlength="50" id="recipient-name" placeholder="Quantidade">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estante:</label>
            <input autocomplete="off" type="text" name="NumeroEstante" class="form-control" maxlength="25" id="recipient-name" placeholder="Estante">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">QRCode:</label>
            <input autocomplete="off" type="text" name="QRCode" class="form-control" maxlength="10" id="recipient-name" placeholder="QRCode">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Anotações:</label>
            <textarea class="form-control" rows="2" maxlength="146" id="comment" name="DescricaoProduto"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary"  value="Inserir"/>
      </div>
          </form>
    </div>
  </div>
</div>
    <br>
    <br>
    <?php
    }else{
        header("Location: /PAP_Site/Back/logout.php");
    }
        ?>
    
    
</body>
</html>
