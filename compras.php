<!DOCTYPE html>
<html>
<head>
  
</head>
<body>

<?php
    include 'connect.php';
    // include 'checkLogin.php';
    // include 'checkAdmin.php';



    if(isset($_POST['addShoppingCart'])){
    
        $product_id = (int)$_POST['idProduto'];
        $quantity = (int)$_POST['quantity'];
        $nomeProduto = $_POST['nomeProduto'];

        $idCompra = 1;

        $sqlGetCompra="select * from compra_produto where FK_COMPRA={$idCompra} AND FK_PRODUTO ={$product_id}";
        $queryGetCompra= mysqli_query($con, $sqlGetCompra);
        $resultCompra=mysqli_fetch_assoc($queryGetCompra);

        $ExisteCompra = isset($resultCompra);    
        if(isset($resultCompra)){
            
            $sqlAddOrUpdate = "
            UPDATE compra_produto set QTD_PRODUTO={$quantity} 
            WHERE FK_PRODUTO ={$product_id} and FK_COMPRA={$idCompra};
            ";

        }else{
            $sqlAddOrUpdate = "
            INSERT INTO compra_produto (FK_PRODUTO,FK_COMPRA,QTD_PRODUTO) 
            VALUES ({$product_id}, {$idCompra},{$quantity});
            ";

        }

        mysqli_query($con, $sqlAddOrUpdate);




        // header('location:home.php');

    }

?>

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
                PLANOS
                    </span> 
            
         
                <div id="cadastro">
      <table border='1'>
    <tr>
        <th>
            Id
        </th>
        <th>
            Nome
        </th>
        <th>
            Preço
        </th>
        <th></th>

    </tr>

<?php
$sq="

select * from produto as p
left join compra_produto as cp on cp.FK_PRODUTO = P.ID_PRODUTO

";



$qu=mysqli_query($con,$sq);
while($produto=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $produto['ID_PRODUTO']?>
        </td>
        <td>
            <?php echo $produto['NOME_PRODUTO']?>
        </td>
        <td>
            <?php echo $produto['price']?>
        </td>
        <td>
            <form method="POST" enctype="multipart/form-data">
                <input type="number" name="quantity" value="<?=$produto['QTD_PRODUTO']?>" min="1" placeholder="Quantity" required>
                <input type="hidden" name="idProduto" value="<?=$produto['ID_PRODUTO']?>">
                <input type="hidden" name="nomeProduto" value="<?=$produto['NOME_PRODUTO']?>">
                <input type="submit" name="addShoppingCart" value="Adicionar">
            </form>
        </td>
    </tr>
    <?php
}
?>
</table>

<br>
<br>
<br>



<table border='1'>
    <tr>
        <th>
            Produto
        </th>
        <th>
            Preço
        </th>
        <th>
            Quantidade
        </th>
        <th>
            Total Preço
        </th>
    </tr>

<?php
$sq="

SELECT * FROM compra_produto as cp
inner join compra as c on c.ID_COMPRA = cp.FK_COMPRA
inner join produto as p on p.ID_PRODUTO = cp.FK_PRODUTO

";
$qu=mysqli_query($con,$sq);
while($compra_produto=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $compra_produto['NOME_PRODUTO']?>
        </td>
        <td>
            <?php echo $compra_produto['price']?>
        </td>
        <td>
            <?php echo $compra_produto['QTD_PRODUTO']?>
        </td>
        <td>
            <?php echo $compra_produto['QTD_PRODUTO']*$compra_produto['price']?>
        </td>

    </tr>

    <?php
}

?>
 <a href="home.php">ir para a pagina principal</a>
</table>


</body>
</html>
