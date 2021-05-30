<?php
    include 'connect.php';
    include 'checkLogin.php';

    $s="select * from reg where id='$_SESSION[id]'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);

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
                 PERFIl
                    </span> 
<table>
    <tr>
        <td>
            Name
        </td><td>
            
<?php echo $f['name'];?>
            </td>
    </tr>
    <tr>
    <td> Username</td>
    
    <td>
            
<?php
echo $f['username'];?>
        </td></tr>
<tr><td> Password</td>
    <td>
<?php
echo $f['password']."<br>";?>
    </td></tr>
  <tr><td> City </td>   <td>           
 <?php
 echo $f['city']."<br>";?></td></tr>
  <tr>
      <td>Gender</td>
      <td><?php
echo $f['gender']."<br>";?></td>
  </tr>
  <tr><td> Image</td><td>

 <img src="<?php
echo $f['image'];?>" width="100px" height="100px">
</td>

</tr>
</table>


<?php
    if($_SESSION['profile']=='Admin'){
        echo "
            <a href='edit.php'>Edit</a>
<a href='delete.php'>Delete</a>

            <a href='reg_city.php'>Reg City</a>
             <a href='loggingVer.php'>Ver loggings</a>
        ";
    }else{
        echo "
            <a href=''>Você não ADM</a>
        ";
    }
?>



    </body>
</html>