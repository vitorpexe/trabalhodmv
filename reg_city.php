<?php


include 'connect.php';
include 'checkLogin.php';


if(isset($_POST['sub'])){
    $nameCity=$_POST['nameCity'];

    $sqlInsertCity="insert into city (nameCity) values ('$nameCity');";
    mysqli_query($con, $sqlInsertCity);
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
                EDITAR
                    </span> 
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Name da cidade: 
                        <input type="text" name="nameCity">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">
                    </td>
                </tr>


                <tr>
                    <td>
                        <a href="pessoa.php"> Voltar para o perfil</a>
                    </td>
                </tr>
            </table>

            <table border='1'>
                    <tr>
                        <th>
                            Nome da cidade
                        </th>
                        <th>  
                        deletar? 
                        </th>


                    </tr>

                <?php
                $sq="select * from city";
                $qu=mysqli_query($con,$sq);
                while($f=  mysqli_fetch_assoc($qu)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $f['nameCity']?>
                        </td>
                       
                        <td>
                            <a href="delete_city.php?idCity=<?php echo $f['idCity']?>&nameCity=<?php echo $f['nameCity']?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
    </body>
</html>
