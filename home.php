<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("logo.jpeg");
  min-height: 75%;
}

.menu {
  display: none;
}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="loggingpessoas.php" class="w3-button w3-block w3-black">CADASTRAR SEU LOGGING</a>
    </div>
    <div class="w3-col s3">
      <a href="pessoa.php" class="w3-button w3-block w3-black">VER SEU LOGIN</a>
    </div>
    <div class="w3-col s3">
      <a href="compras.php" class="w3-button w3-block w3-black">VER NOSSOS PLANOS</a>
    </div>
    <div class="w3-col s3">
      <a href="clientes.php" class="w3-button w3-block w3-black">VER NOSSOS CLIENTES</a>
    </div>
     
  </div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  

  <div class="w3-display-bottomright w3-center w3-padding-large">
    <span class="w3-text-white">15 Adr street, 5015</span>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Quem somos?</span></h5>
    <p>A DMV é uma empresa que atua no mercado 100% brasileiro de webhosting e tem como missão oferecer a empresas e pessoas físicas serviços com melhor relação custo-benefício, qualidade e conforto.
Nossa visão pro futuro é que muitas novas empresas precisaram dos nossos serviços com o crescimento da internet.
Valores :  a partir de R$10,00 por mês hospedagem plano básico/primeiro mês grátis</p>
   
    <img src="logo.jpeg" style="width:100%;max-width:1000px" class="w3-margin-top">
    
  </div>
</div>

<!-- Menu Container -->



   
      


<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">Murilo, Vitor, Daniel</a></p>
</footer>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

</body>
</html>

