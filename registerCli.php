<?php session_start();

$con=  mysqli_connect("localhost","root","","tradmv")

?>
 <?php

if(isset($_POST['sub'])){
    $u=$_POST['nomeCliente'];
    $p=$_POST['planoCliente'];

    $sqlInsertcadastro="insert into clientes(nomeCliente, planoCliente) values ('$u','$p')";
   
    mysqli_query($con, $sqlInsertcadastro);
}
?>
      
     
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V9</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  
  <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

        <span class="login100-form-title p-b-37">

        <img src="logo.jpeg" alt="Image" height="110" width="130">        
        CADASTRO 
          </span> 
      <div id="cadastro">
      <form method="POST" enctype="multipart/form-data">
            <table>
          
           <p> 
            <label for="nomecliente">Nome Cliente</label>
            <input id="nomecliente" name="nomeCliente" required="required" type="text" placeholder="" /> 
          </p>

           <p> 
            <label for="empresa">Plano Cliente</label>
            <input id="empresa" name="planoCliente" required="required" type="text" placeholder=""/>
          </p>
           
         
           
          
          
          <input type="submit" value="submit" name="sub">

          <p class="link">
            Voltar para ver Clientes?
            <a href="clientes.php">clique aqui</a>
          </p>

 </table>
      

      
    </div>
  </div>
  
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>
              
           
          
           
          
        
      </div>
    </div>
  </div>  
</body>
</html>