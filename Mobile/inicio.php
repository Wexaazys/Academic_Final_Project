<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="geston_logoPequeno.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <title>Início</title>
</head>

<body background="/PAP_Site/Pattern.jpg">
    <?php
    session_start();
    if($_SESSION["funcao"] == "Admin"){
    ?>
    
    
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/PAP_Site/Mobile/inicio.php"><img src="geston_logo.png" width="100" height="30" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/PAP_Site/Mobile/inicio.php">Início <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PAP_Site/Mobile/conta.php">Conta</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action='/PAP_Site/Back/logout.php' method='post'>
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="LogOut">LogOut</button>
                </form>
            </div>
        </nav>
        <br>
<?php
        if(isset($_GET["QRVar"])){
            $QR = $_GET["QRVar"];
        }else{
            $QR = "";
        }
?>

        
    <div class="col-sm-3">
        <div class="input-group sm-3">
        <?php echo('<input value="'.$QR.'" type="text" id="QRCodePesquisaCam" class="form-control form-control-sm" name="QRCodePesquisaCam" placeholder="QR Code">'); ?>
        <div class="input-group-append">
        <div id="code">
        <input id="QRCodePesquisaCamPesquiButton" class="btn btn-outline-secondary" type="submit" value="Pesquisar">
        </div>
        </div>
        </div>
    </div>
        

        <?php
   
   $con=mysqli_connect("localhost","root","","geston");
   // Check connection
   if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   
   if($QR == ""){
    $result = mysqli_query($con,"SELECT * FROM armazem");
   }else{
    $result = mysqli_query($con,"SELECT * FROM armazem WHERE QRCode ='$QR'");
   }


   echo "</br>";
   


           
   
   echo "<table class='table table-sm table-bordered' id='TableMobile'>
   <thead class='thead-light'>
   <tr>
   <th colspan='1' class='text-center' hidden>#</th>
   <th colspan='1' class='text-center'>Nome</th>
   <th colspan='1' class='text-center'>Categoria</th>
   <th colspan='1' class='text-center' >Quant.</th>
   <th colspan='1' class='text-center'>Estante</th>
   <th colspan='1' class='text-center' hidden>QRCode</th>
   <th colspan='1' class='text-center' hidden>Anotações</th>
   <th colspan='1' class='text-center' hidden></th>
   </tr>
   </thead>";
                
   $row_cnt = $result->num_rows;
   
   
   
       $u = 0;
   while($row = mysqli_fetch_array($result))
   {
   echo "<tbody>";   
   echo "<tr>";
   //echo "<td> <input type='text' name='name' id = 'name'>' . $row['nome'] . '</td>";
   echo "<td hidden>"; echo htmlspecialchars($row['IDArmazem']); echo"</td>";
   echo "<td>"; echo htmlspecialchars($row['NomeProduto']); echo"</td>";
   echo "<td>"; echo htmlspecialchars($row['Categoria']); echo"</td>";
   echo "<td>"; echo htmlspecialchars($row['Quantidade']); echo"</td>";
   echo "<td>"; echo htmlspecialchars($row['NumeroEstante']); echo"</td>";
   echo "<td hidden>"; echo htmlspecialchars($row['QRCode']); echo"</td>";
   echo "<td hidden>"; echo htmlspecialchars($row['DescricaoProduto']); echo"</td>";
   
   
   echo "</tbody>"; 
    
   $u++;       
        
   echo "</tr>";
      
   }
   
   echo "</table>";
   
        ?>
   <br><br><br><br>

<button style="position:fixed;bottom:0;" type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#AdicionarProdutoModal" data-whatever="@mdo">Adicionar Produto</button>

<div class="modal fade" id="AdicionarProdutoModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Adicionar Produto</h5>
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
            <?php echo('<input autocomplete="off" type="text" name="QRCode" class="form-control" maxlength="10" id="recipient-nameQR" placeholder="QRCode" value="'.$QR.'">'); ?>
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



<div class="modal fade" id="AlterarProdutoModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Alterar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
      if($QR == ""){
       echo "<form action ='/PAP_Site/Back/ProdutosMobile.php' method = 'post'>";
      }else{
        echo "<form action ='/PAP_Site/Back/ProdutosMobile.php?QRVar=$QR' method = 'post'>";
      }
      ?>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input autocomplete="off" type="text" name="NomeProduto" class="form-control" maxlength="50" id="NomeAlt" placeholder="Nome" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Categoria:</label>
            <input autocomplete="off" type="text" name="Categoria" class="form-control" maxlength="50" id="CatAlt" placeholder="Categoria">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantidade:</label>
            <input autocomplete="off" type="text" name="Quantidade" class="form-control" maxlength="50" id="QuantAlt" placeholder="Quantidade">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estante:</label>
            <input autocomplete="off" type="text" name="NumeroEstante" class="form-control" maxlength="25" id="EstanteAlt" placeholder="Estante">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">QRCode:</label>
            <?php echo('<input autocomplete="off" type="text" name="QRCode" class="form-control" maxlength="10" id="QRAlt" placeholder="QRCode" value="'.$QR.'">'); ?>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Anotações:</label>
            <textarea class="form-control" rows="2" maxlength="146" id="commentAnotacoes" name="DescricaoProduto"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input hidden type="text" name="IDArmazem" class="form-control" maxlength="10" id="IDArmazem">
        <div id="DeleteButton"></div>
        <input type="submit" class="btn btn-primary"  value="Atualizar"/>
      </div>
          </form>
    </div>
  </div>
</div>

















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
                    <li class="nav-item active">
                        <a class="nav-link" href="/PAP_Site/Mobile/inicio.php">Início <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PAP_Site/Mobile/conta.php">Conta</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action='/PAP_Site/Back/logout.php' method='post'>
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="LogOut">LogOut</button>
                </form>
            </div>
        </nav>
        <br>
<?php
        if(isset($_GET["QRVar"])){
            $QR = $_GET["QRVar"];
        }else{
            $QR = "";
        }
?>

        
    <div class="col-sm-3">
        <div class="input-group sm-3">
        <?php echo('<input value="'.$QR.'" type="text" id="QRCodePesquisaCam" class="form-control form-control-sm" name="QRCodePesquisaCam" placeholder="QR Code">'); ?>
        <div class="input-group-append">
        <div id="code">
        <input id="QRCodePesquisaCamPesquiButton" class="btn btn-outline-secondary" type="submit" value="Pesquisar">
        </div>
        </div>
        </div>
    </div>
        

        <?php
   
   $con=mysqli_connect("localhost","root","","geston");
   // Check connection
   if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   
   if($QR == ""){
    $result = mysqli_query($con,"SELECT * FROM armazem");
   }else{
    $result = mysqli_query($con,"SELECT * FROM armazem WHERE QRCode ='$QR'");
   }


   echo "</br>";
   


           
   
   echo "<table class='table table-sm table-bordered' id='TableMobile'>
   <thead class='thead-light'>
   <tr>
   <th colspan='1' class='text-center' hidden>#</th>
   <th colspan='1' class='text-center'>Nome</th>
   <th colspan='1' class='text-center'>Categoria</th>
   <th colspan='1' class='text-center' >Quant.</th>
   <th colspan='1' class='text-center'>Estante</th>
   <th colspan='1' class='text-center' hidden>QRCode</th>
   <th colspan='1' class='text-center' hidden>Anotações</th>
   <th colspan='1' class='text-center' hidden></th>
   </tr>
   </thead>";
                
   $row_cnt = $result->num_rows;
   
   
   
       $u = 0;
   while($row = mysqli_fetch_array($result))
   {
   echo "<tbody>";   
   echo "<tr>";
   //echo "<td> <input type='text' name='name' id = 'name'>' . $row['nome'] . '</td>";
   echo "<td hidden>"; echo htmlspecialchars($row['IDArmazem']); echo"</td>";
   echo "<td>"; echo htmlspecialchars($row['NomeProduto']); echo"</td>";
   echo "<td>"; echo htmlspecialchars($row['Categoria']); echo"</td>";
   echo "<td>"; echo htmlspecialchars($row['Quantidade']); echo"</td>";
   echo "<td>"; echo htmlspecialchars($row['NumeroEstante']); echo"</td>";
   echo "<td hidden>"; echo htmlspecialchars($row['QRCode']); echo"</td>";
   echo "<td hidden>"; echo htmlspecialchars($row['DescricaoProduto']); echo"</td>";
   
   
   echo "</tbody>"; 
    
   $u++;       
        
   echo "</tr>";
      
   }
   
   echo "</table>";
   
        ?>
   <br><br><br><br>

<button style="position:fixed;bottom:0;" type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#AdicionarProdutoModal" data-whatever="@mdo">Adicionar Produto</button>

<div class="modal fade" id="AdicionarProdutoModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Adicionar Produto</h5>
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
            <?php echo('<input autocomplete="off" type="text" name="QRCode" class="form-control" maxlength="10" id="recipient-nameQR" placeholder="QRCode" value="'.$QR.'">'); ?>
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



<div class="modal fade" id="AlterarProdutoModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Alterar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
      if($QR == ""){
       echo "<form action ='/PAP_Site/Back/ProdutosMobile.php' method = 'post'>";
      }else{
        echo "<form action ='/PAP_Site/Back/ProdutosMobile.php?QRVar=$QR' method = 'post'>";
      }
      ?>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input autocomplete="off" type="text" name="NomeProduto" class="form-control" maxlength="50" id="NomeAlt" placeholder="Nome" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Categoria:</label>
            <input autocomplete="off" type="text" name="Categoria" class="form-control" maxlength="50" id="CatAlt" placeholder="Categoria">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantidade:</label>
            <input autocomplete="off" type="text" name="Quantidade" class="form-control" maxlength="50" id="QuantAlt" placeholder="Quantidade">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estante:</label>
            <input autocomplete="off" type="text" name="NumeroEstante" class="form-control" maxlength="25" id="EstanteAlt" placeholder="Estante">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">QRCode:</label>
            <?php echo('<input autocomplete="off" type="text" name="QRCode" class="form-control" maxlength="10" id="QRAlt" placeholder="QRCode" value="'.$QR.'">'); ?>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Anotações:</label>
            <textarea class="form-control" rows="2" maxlength="146" id="commentAnotacoes" name="DescricaoProduto"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input hidden type="text" name="IDArmazem" class="form-control" maxlength="10" id="IDArmazem">
        <div id="DeleteButton"></div>
        <input type="submit" class="btn btn-primary"  value="Atualizar"/>
      </div>
          </form>
    </div>
  </div>
</div>

    <?php
    }else{
        header("Location: /PAP_Site/Back/logout.php");
    }
        ?>
    
    <script type="text/javascript">

$('#QRCodePesquisaCam').click(function() {
    window.location = "QRCam.php";
 });
    
    </script>


    <script type="text/javascript">

var QRvarJS= <?php if(isset($_GET["QRVar"])){echo json_encode($_GET['QRVar']);}else{echo json_encode("");} ?>;

if(QRvarJS == ""){

$('#QRCodePesquisaCamPesquiButton').click(function() {
   window.location = "QRCam.php";
});

}else{

document.getElementById('code').innerHTML = '<form action="/PAP_Site/Mobile/inicio.php?QRVar=<?php echo $QR; ?> " method="post"> <input id="QRCodePesquisaCamPesquiButton" class="btn btn-outline-secondary" type="submit" value="Pesquisar"></form>';
$("#recipient-nameQR").attr("readonly", true)

}

$("#TableMobile tr").click(function(){    
   var value0=$(this).find('td:first-child').html();
   var value1=$(this).find('td:eq(1)').html();
   var value2=$(this).find('td:eq(2)').html();
   var value3=$(this).find('td:eq(3)').html();
   var value4=$(this).find('td:eq(4)').html();
   var value5=$(this).find('td:eq(5)').html();
   var value6=$(this).find('td:eq(6)').html();
   //console.log(value6);
    if (value1 == undefined){

    }else{
   document.getElementById('NomeAlt').value = value1;
   document.getElementById('CatAlt').value = value2;
   document.getElementById('QuantAlt').value = value3;
   document.getElementById('EstanteAlt').value = value4;
   document.getElementById('QRAlt').value = value5;
   document.getElementById('commentAnotacoes').value = value6;
   document.getElementById('IDArmazem').value = value0;
   document.getElementById('DeleteButton').innerHTML = '<a class="btn btn-danger" href="/PAP_Site/Back/delete.php?id='+value0+'" role="button">Delete</a>';
   <?php
   /*
    echo "document.writeln(value0);";
   */
   ?>  
   $('#AlterarProdutoModal').modal('show');


    }



  
});


    </script>

</body>
</html>