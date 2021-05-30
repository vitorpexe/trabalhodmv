<?php
include 'connect.php';
include 'checkLogin.php';

if(isset($_POST['sub'])){
    $t=$_POST['text'];
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $c=$_POST['city'];
    $g=$_POST['gen'];
    if($_FILES['f1']['name']){
    move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
    $img="image/".$_FILES['f1']['name'];
    }
    else{
        $img=$_POST['img1'];
    }
    $i="update reg set name='$t',username='$u',password='$p',city='$c',gender='$g',image='$img' where id='$_SESSION[id]'";
    mysqli_query($con, $i);
    header('location:home.php');
}
    $s="select*from reg where id='$_SESSION[id]'";
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
                 EDITAR
                    </span>
<form method="POST" enctype="multipart/form-data">

            <table>
                <tr>
                    <td>
                        Name
                        <input type="text" name="text" value="<?php echo $f['name']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Username
                        <input type="text" name="user" value="<?php echo $f['username']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        password
                        <input type="password" name="pass" value="<?php echo $f['password']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        city
                        <select name="city">
                            <option value="">-select-</option>
                        
                            <?php
                            $sqlCity= mysqli_query($con, "select * from city");
                                                        
                            while($item = mysqli_fetch_assoc($sqlCity))
                            {
                                $nomeItem = utf8_encode($item['nameCity']);
              
                                if($f['city'] == $nomeItem){
                                    echo "                                
                                        <option value=$nomeItem selected='selected'>$nomeItem</option>                                
                                    ";
                                }else{
                                    echo " <option value=$nomeItem>$nomeItem</option>";
                                }
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Gender
                        <?php if($f['gender']=='male'){
                            ?>
                          <input type="radio"name="gen" id="gen" value="male" checked>
                        <?php
                        } else {
?>
                        <input type="radio"name="gen" id="gen" value="male">
                        <?php } ?>male
                       <?php if($f['gender']=='female'){
                            ?>
                          <input type="radio"name="gen" id="gen" value="female" checked>
                        <?php
                        } else {
?>
                        <input type="radio"name="gen" id="gen" value="female">
                        <?php } ?>female
                    </td>
                </tr>
                <tr>
                    <td>
                        Image
                        <img src="<?php echo $f['image']?>" width="100px" height="100px">
                        <input type="file" name="f1">
                        <input type="hidden" name="img1" value="<?php echo $f['image']?>">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">
                               
                    </td>
                </tr>
            </table>
</form>