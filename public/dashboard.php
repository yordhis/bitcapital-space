<?php

  session_start();

  if(!isset($_SESSION['user'])){
    echo '
    <script>
      alert("Por favor debes iniciar sesion");
      window.location = "index.php";
    </script>
    ';
    session_destroy();
    die();

  }

?>


<!DOCTYPE html>
<html lang="en">
  <!-- Head -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
	 crossorigin="anonymous">
   <!-- Style -->
   <style>
      *{
box-sizing: border-box;
}

.card{
  display:flex;
  margin-bottom: 20px;
  flex-direction: row;
}
.deposit{
  color: #fff;
  padding: 40px;
  width: 30%;
  border-radius: 10px;
  margin: 10px 20px;
  font-size: 25px;
}


.current{
  background-color: slateblue;
}

.withdraw{
  background-color: lightblue;
}

.total{
  background-color: orange;
}


.input{
  display: flex;
}

.input h4{
  color: #000
}

.depositbtn{
  width: 50%;
  box-shadow: 5px 5px 10px gray;
  
}

.withdrawbtn{
  width: 50%;
  box-shadow: 5px 5px 10px gray;
  
}

#last{
  list-style: none;
  font-weight: 700;
}

ul li{
  padding: 8px;
  background: #eee;
  width: 100%;
  margin-bottom: 2px;
}

.wt {
    position: fixed;
    right: 0px;
    bottom: 0px;
    display: inline;
    text-align: end
  }

  .wt-icon svg {
    fill: #46c154;
    width: 80px
  }

  .popup {
    position: relative;
    background-color: #fff;
    color: #2eb242;
    padding: 5px 15px 5px 15px;
    border-radius: 40px;
    right: 10px;
    transition: 1s;
    bottom: -10px;
    opacity: 0;
    box-shadow: 0px 0px 5px #2eb242
  }

  .wt:hover .popup {
    display: block;
    bottom: 0px;
    opacity: 1
  }
   </style>
<!-- end style -->
</head>
<!-- end head -->
<body>
<!-- Header -->
<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.html">Bitcapital Space</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link logged-in" href="php/logout.php" id="logout">Logout</a>
      </div>
    </div>
  </div>
</nav>
</header>
	<!--end Header  -->

  <!-- Main -->
  <main>
    <h1 id="alert" class="text-center"></h1>
    <div class="card">
      <div class="deposit current">
      <h4>Deposit</h4>
      <h1> $ <span>
      <?php
include 'php/conexion_deposit.php';

// Obtener el correo del usuario de la sesión
$correo_usuario = $_SESSION['user'];

// Consultar los depósitos relacionados al usuario
$sql_depositos = "SELECT * FROM invesment WHERE correo_pago = '$correo_usuario' AND completado = 1";
$dep_resultado = $conexion_deposit->query($sql_depositos);

// Calcular el total de depósitos
$total_depositos = 0;

while ($row = $dep_resultado->fetch_assoc()) {
    $total_depositos += $row['monto'];
}

// Mostrar el total de depósitos
echo $total_depositos;
?>
      </span></h1>
    </div>
    
    <div class="deposit withdraw">
      <h4>Withdraw</h4>
      <h1> $ <span>
      <?php
include 'php/conexion_deposit.php';

// Obtener el correo del usuario de la sesión
$correo_usuario = $_SESSION['user'];

// Consultar los depósitos relacionados al usuario
$sql_retiros = "SELECT * FROM retiros WHERE correo_retiro = '$correo_usuario' AND completado = 1";
$dep_resultado = $conexion_deposit->query($sql_retiros);

// Calcular el total de depósitos
$total_retirado = 0;

while ($row = $dep_resultado->fetch_assoc()) {
    $total_retirado += $row['monto_retiro'];
}

// Mostrar el total de depósitos
echo $total_retirado;
?>
      </span>    </h1>
    </div>
    
    <div class="deposit total">  
      <h4>Ganancias</h4>
    <h1>$ <span id="gananciasPorSegundo">

    </span> </h1>
    </div>
    </div>
    
    
    <div class="input">
      <div class="depositbtn deposit">
      <h4>Deposit</h4>
    <p>
    <button type="button" class="btn btn-success" id="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Enter</button>

    <div class="alert alert-primary" action="#" method="GET">
      <h2>Historial de Inversiones</h2>
      <?php
include 'php/conexion_deposit.php';

// Obtener el correo del usuario de la sesión
$correo_usuario = $_SESSION['user'];

// Consultar los depósitos relacionados al usuario
$sql_depositos = "SELECT * FROM invesment WHERE correo_pago = '$correo_usuario'";
$dep_resultado = $conexion_deposit->query($sql_depositos);

// Mostrar la lista de depósitos
echo '<ul name="result" class="list-group">';
while ($row = $dep_resultado->fetch_assoc()) {
    echo '<li class="list-group-item">';
    echo '<span class="float-start">';
    echo $row['fecha']. '&nbsp';
    echo $row['monto']. '&nbsp';
    echo $row['correo_pago']. '&nbsp';
    echo ($row['completado'] == 1) ? '<h1 class="badge text-bg-success">Completado</h1>' : '<h1 class="badge text-bg-warning">En revisión...</h1>';
    echo '</span>';
    echo '</li>';
}
echo '</ul>';
?>
    </div>

    <!-- Inicio modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background: black;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deposita Ahora:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="d-flex align-items-center">
        <strong role="status">Procesando...</strong>
      <div class="spinner-border ms-auto" aria-hidden="true"></div>
      </div>
      <div class="modal-body">
      <form action="php/deposit.php" method="POST" class="form__login">

        <!-- wallet para depositar -->
        <input type="text" name="wallet_pago" id="wallet" readonly value="TNvrgijWyVfkeLEbr8jD90PTYLkZepNzsd" class="form-control">
        <!-- fin de seccion -->

        <!-- almacenar correo del depositante -->
            <label for="email">Correo</label>
            <input type="text" class="form-control mb-3" placeholder="Correo electronico" readonly value="<?php echo $_SESSION['user'];?>" name="correo_pago" required>
        <!-- fin de almacenamiento -->

        <!-- almacenar fecha de pago -->
            <label for="date">Fecha de pago</label>
            <input type="date" class="form-control mb-3" placeholder="Introduzca fecha de pago" name="fecha" required>
        <!-- fin de almacenamiento -->

        <!-- almacenar monto depositado -->
            <h1>$<span id="dollar">Monto a depositar</span></h1>
            <input type="monto" class="form-control mb-3" placeholder="Repetir monto:" name="monto" required>
        <!-- fin de almacenamiento -->

        <!-- almacenar hash de txns -->
            <label for="hash">Pegue el hash del deposito</label>
            <input type="hex" class="form-control mb-3" placeholder="Hash de la transaccion:" name="hash" required>
        <!-- Fin de formulario de pago -->

        <!-- almacenar red en la que se deposito -->
            <label for="red">Selecciona red en la que pagaste</label>
            <select class="form-select form-select-sm" aria-label="Small select example" name="red">
                <option selected>Seleccionar red</option>
                <option value="tron">Tron</option>
                <option value="bep-20">BEP-20</option>
            </select>
        <!-- fin de almacenamiento -->
            
        <button class="btn btn-primary">Guardar Pago</button>
      </div>
    </div>
    </form>
  </div>
  <!-- fin de modal -->
</div>
    </div>
    
    <!-- Inicio de seccion de retiro -->
    <div class="withdrawbtn deposit">
      <h4>Total retirado</h4>
    <p>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1">Enter</button>
    <!-- Historial de transacciones -->
    <div class="alert alert-primary" action="#" method="GET">
      <h2>Historial de retiros</h2>
      <?php
include 'php/conexion_deposit.php';

// Obtener el correo del usuario de la sesión
$correo_usuario = $_SESSION['user'];

// Consultar los depósitos relacionados al usuario
$sql_depositos = "SELECT * FROM retiros WHERE correo_retiro = '$correo_usuario'";
$dep_resultado = $conexion_deposit->query($sql_depositos);

// Mostrar la lista de depósitos
echo '<ul name="result" class="list-group">';
while ($row = $dep_resultado->fetch_assoc()) {
    echo '<li class="list-group-item">';
    echo '<span class="float-start">';
    echo $row['fecha_retiro']. '&nbsp';
    echo $row['monto_retiro']. '&nbsp';
    echo $row['correo_retiro']. '&nbsp';
    echo ($row['completado'] == 1) ? '<h1 class="badge text-bg-success">Completado</h1>' : '<h1 class="badge text-bg-warning">En Espera...</h1>';
    echo '</span>';
    echo '</li>';
}
echo '</ul>';
?>
    </div>
    <!-- Fin de historial de transacciones -->

    <!-- Modal de retiro de dinero -->

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background: black;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Retirar Ahora:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="d-flex align-items-center">
        <strong role="status">Procesando...</strong>
      <div class="spinner-border ms-auto" aria-hidden="true"></div>
      </div>
      <div class="modal-body">
      <form action="php/hretiros.php" method="POST" class="form__wdraw">

        <!-- wallet para retirar -->
        <label for="wallet">Ingrese wallet de retiro:</label>
        <input type="text" name="wallet_retiro" class="form-control">
        <!-- fin de seccion -->

        <!-- Enviar correo del retiro pendiente -->
            <label for="email">Correo</label>
            <input type="text" class="form-control mb-3" placeholder="Correo electronico" name="correo_retiro" readonly value="<?php echo $_SESSION['user'];?>" required>
        <!-- fin de envio -->

        <!-- almacenar fecha de retiro -->
            <label for="date">Seleccione la fecha de hoy para procesar su retiro.</label>
            <input type="date" class="form-control mb-3" placeholder="Introduzca fecha de retiro" name="fecha_retiro" required>
        <!-- fin de almacenamiento -->

        <!-- almacenar monto retirado -->
            <h1> $ <span>Monto a retirar</span></h1>
            <input type="monto" class="form-control mb-3" placeholder="Repetir monto:" name="monto_retiro" required>
        <!-- fin de almacenamiento -->

        <!-- almacenar red de retiro -->
            <label for="red">Selecciona red de retiro</label>
            <select class="form-select form-select-sm" aria-label="Small select example" name="red_retiro">
                <option selected>Seleccionar red</option>
                <option value="tron">Tron</option>
                <option value="bep-20">BEP-20</option>
            </select>
        <!-- fin de almacenamiento -->
            
        <button class="btn btn-primary">Guardar Pago</button>
      </div>
    </div>
    </form>
  </div>
    <!-- Fin de modal de retiro -->
    </div>
    </div>      
  </main>
  <!-- end Main -->


  <!-- Initial Script -->
  <script>
    // Deposit
const button= document.getElementById("button");
button.addEventListener('click', function (){
  const depositInput = document.getElementById("name").value;
  let depositNumber =parseInt(depositInput);
  if(depositInput < 500 || depositInput == null){
    const alert = document.getElementById("alert").innerText= "Deposito minimo 500 dolares";
    return true;
    
  }
  else{
    depositNumber = depositNumber;
    const alert = document.getElementById("alert").innerText= "";
  }
  
  
  
  const lastDeposit =document.getElementById('last');
  const newlist =document.createElement('li');
  const d = new Date();
  newlist.innerText = d.toDateString() + "-" + " Deposit Amount $" + ' ' + depositNumber; lastDeposit.prepend(newlist);
  
inputNumber("dollar", depositNumber);
inputNumber1("dollarTotal", depositNumber);
  document.getElementById("name").value = '';
})

// Withdraw
const wButton =document.getElementById('wbutton');
wButton.addEventListener('click', function(){
  const withdrawAmount = document.getElementById('wname').value;
  let withdrawNumber= parseInt(withdrawAmount);
   if(withdrawAmount < 100 || withdrawAmount == null){
    const alert = document.getElementById("alert").innerText= "El minimo de retiro son 100 dolares";
    return false;
  }
  else{
    withdrawNumber = withdrawNumber;
    
  }
  
  
  inputNumber('wdollar', withdrawNumber);
  
  inputNumber('dollarTotal', -1 * withdrawNumber)
  
  document.getElementById('wname').value = '';
  
  
  const lastDeposit =document.getElementById('last');
  const newlist =document.createElement('li');
  const d = new Date();
  newlist.innerText = d.toDateString() + "-" + " Withdraw Amount $" + ' ' + withdrawNumber; lastDeposit.prepend(newlist);
})




function inputNumber(id, depositNumber){
  console.log(id)
   const dollar = document.getElementById(id).innerText;
  const dollarNumber =parseInt(dollar);
  const totalDepositAmount = dollarNumber + depositNumber;
  localStorage.setItem('total-deposit', JSON.stringify(totalDepositAmount));
  let totalDepo = JSON.parse(localStorage.getItem('total-deposit'));
  document.getElementById(id).innerText = totalDepo;
}


function inputNumber1(id, depositNumber){
   const dollar = document.getElementById(id).innerText;
  const dollarNumber =parseInt(dollar);
  const totalDepositAmount = dollarNumber + depositNumber;
  document.getElementById(id).innerText = totalDepositAmount;
}
  </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
      // Generate a randomized wallet address from a predefined array
      const wallets = [
        'TNvrgijWyVfkeLEbr8jD90PTYLkZepNzsd',
        'TNvrgijWyVfkeLEbr5jD90PTYLkZepNzsd',
        'TNvrgijWyVfkeLEbr6jD90PTYLkZepNzsd',
        'TNvrgijWyVfkeLEbr1jD90PTYLkZepNzsd',
        'TNvrgijWyVfkeLEbr2jD90PTYLkZepNzsd',
        'TNvrgijWyVfkeLEbr4jD90PTYLkZepNzsd',
        'TNvrgijWyVfkeLEbr9jD90PTYLkZepNzsd',
        'TNvrgijWyVfkeLEbr0jD90PTYLkZepNzsd',
        'TNvrgijWyVfkeLEbr22jD90PTYLkZepNzsd',
        'TNvrgijWyVfkeLEbr11jD90PTYLkZepNzsd'
      ];
      function getRandomWallet() {
        const index = Math.floor(Math.random() * wallets.length);
        return wallets[index];
      }
      const wallet = getRandomWallet();
      document.getElementById('wallet').value = wallet;

      // Add deposit history to the page
      function addDepositHistory(amount, date) {
        const history = document.getElementById('deposit history');
        const entry = document.createElement('p'); 
        entry.textContent =  `$${amount} deposited on ${date}`; 
        history.appendChild(entry);
       }
      document.getElementById('deposit-button').addEventListener('click', () => { const depositAmount = document.getElementById('deposit-amount').value;
 if (depositAmount < 500) { alert('Please deposit a minimum of 500 USDT.');
  return;
   } addDepositHistory(depositAmount, new Date().toLocaleString());
    document.getElementById('deposit-amount').value = '';
     });
      </script> 
<!-- End Script -->

<!-- Inicio boton whatsapp -->

<div class="wt">
  <div class="popup">
    <p>Buen dia, hablemos por Whatsapp</p>
  </div>
  <div class="wt-icon">
    <a target="_blank" href="#https://wa.me/+593964094558"><svg viewBox="0 0 46.4 45.9">

        <g>
          <path d="M-13.9-13.7A19.1,19.1,0,0,1,0-19.4a19.1,19.1,0,0,1,14,5.7A18.6,18.6,0,0,1,19.7,0a18.6,18.6,0,0,1-5.8,13.7A19.1,19.1,0,0,1,0,19.4a19.1,19.1,0,0,1-13.9-5.7A18.6,18.6,0,0,1-19.7,0,18.6,18.6,0,0,1-13.9-13.7ZM13.4-2a12.9,12.9,0,0,0-3.8-8.2,12.9,12.9,0,0,0-8.3-3.7H-0.2A12.7,12.7,0,0,0-8.6-10a12.7,12.7,0,0,0-3.7,8.7,13.1,13.1,0,0,0,1.5,6,1.9,1.9,0,0,1,.2.8,2.3,2.3,0,0,1-.1.8l-2.1,6V12.1h0.1L-9.1,11l3.5-1.1A13.7,13.7,0,0,0,.6,11.5H1A12.7,12.7,0,0,0,7.3,9.7,12.7,12.7,0,0,0,13.4-.4V-2ZM4.9,8.6a10.7,10.7,0,0,1-4.4.9H-0.6A11.9,11.9,0,0,1-5.3,7.7L-9.4,9l1-2.9,0.4-1L-8.8,4A10.3,10.3,0,0,1-10.1-.1a11.3,11.3,0,0,1-.1-1.3A10.1,10.1,0,0,1-5.6-9.9,10,10,0,0,1-.2-11.8H0.6A10.3,10.3,0,0,1,8.8-8.1a10,10,0,0,1,2.6,6.7A11.2,11.2,0,0,1,11,1.8,10.5,10.5,0,0,1,4.9,8.6ZM5.6,0.9L4,0.3H4a2.3,2.3,0,0,0-.8.8,2.2,2.2,0,0,1-.8.8h0A4.2,4.2,0,0,1,.8,1.3,8.2,8.2,0,0,1-1.5-.8a3.9,3.9,0,0,1-.8-1.4L-1.8-3a1.5,1.5,0,0,0,.5-0.9L-2-5.4a5.4,5.4,0,0,0-.8-1.4H-4Q-5.6-6.5-5.6-4A6.8,6.8,0,0,0-4.1-.4,12.2,12.2,0,0,0,.4,3.7,12.1,12.1,0,0,0,3.7,4.8H4a3.8,3.8,0,0,0,1.7-.4A2.4,2.4,0,0,0,7.1,2.1a1.8,1.8,0,0,0,0-.4Z" transform="translate(23.2 22.9)" fill="#46c154" />
          <path d="M-13.9-13.7A19.1,19.1,0,0,1,0-19.4a19.1,19.1,0,0,1,14,5.7A18.6,18.6,0,0,1,19.7,0a18.6,18.6,0,0,1-5.8,13.7A19.1,19.1,0,0,1,0,19.4a19.1,19.1,0,0,1-13.9-5.7A18.6,18.6,0,0,1-19.7,0,18.6,18.6,0,0,1-13.9-13.7ZM13.4-2a12.9,12.9,0,0,0-3.8-8.2,12.9,12.9,0,0,0-8.3-3.7H-0.2A12.7,12.7,0,0,0-8.6-10a12.7,12.7,0,0,0-3.7,8.7,13.1,13.1,0,0,0,1.5,6,1.9,1.9,0,0,1,.2.8,2.3,2.3,0,0,1-.1.8l-2.1,6V12.1h0.1L-9.1,11l3.5-1.1A13.7,13.7,0,0,0,.6,11.5H1A12.7,12.7,0,0,0,7.3,9.7,12.7,12.7,0,0,0,13.4-.4V-2ZM4.9,8.6a10.7,10.7,0,0,1-4.4.9H-0.6A11.9,11.9,0,0,1-5.3,7.7L-9.4,9l1-2.9,0.4-1L-8.8,4A10.3,10.3,0,0,1-10.1-.1a11.3,11.3,0,0,1-.1-1.3A10.1,10.1,0,0,1-5.6-9.9,10,10,0,0,1-.2-11.8H0.6A10.3,10.3,0,0,1,8.8-8.1a10,10,0,0,1,2.6,6.7A11.2,11.2,0,0,1,11,1.8,10.5,10.5,0,0,1,4.9,8.6ZM5.6,0.9L4,0.3H4a2.3,2.3,0,0,0-.8.8,2.2,2.2,0,0,1-.8.8h0A4.2,4.2,0,0,1,.8,1.3,8.2,8.2,0,0,1-1.5-.8a3.9,3.9,0,0,1-.8-1.4L-1.8-3a1.5,1.5,0,0,0,.5-0.9L-2-5.4a5.4,5.4,0,0,0-.8-1.4H-4Q-5.6-6.5-5.6-4A6.8,6.8,0,0,0-4.1-.4,12.2,12.2,0,0,0,.4,3.7,12.1,12.1,0,0,0,3.7,4.8H4a3.8,3.8,0,0,0,1.7-.4A2.4,2.4,0,0,0,7.1,2.1a1.8,1.8,0,0,0,0-.4Z" transform="translate(23.2 22.9)" fill="none" stroke="#fff" stroke-width="7" />
          <path d="M-13.9-13.7A19.1,19.1,0,0,1,0-19.4a19.1,19.1,0,0,1,14,5.7A18.6,18.6,0,0,1,19.7,0a18.6,18.6,0,0,1-5.8,13.7A19.1,19.1,0,0,1,0,19.4a19.1,19.1,0,0,1-13.9-5.7A18.6,18.6,0,0,1-19.7,0,18.6,18.6,0,0,1-13.9-13.7ZM13.4-2a12.9,12.9,0,0,0-3.8-8.2,12.9,12.9,0,0,0-8.3-3.7H-0.2A12.7,12.7,0,0,0-8.6-10a12.7,12.7,0,0,0-3.7,8.7,13.1,13.1,0,0,0,1.5,6,1.9,1.9,0,0,1,.2.8,2.3,2.3,0,0,1-.1.8l-2.1,6V12.1h0.1L-9.1,11l3.5-1.1A13.7,13.7,0,0,0,.6,11.5H1A12.7,12.7,0,0,0,7.3,9.7,12.7,12.7,0,0,0,13.4-.4V-2ZM4.9,8.6a10.7,10.7,0,0,1-4.4.9H-0.6A11.9,11.9,0,0,1-5.3,7.7L-9.4,9l1-2.9,0.4-1L-8.8,4A10.3,10.3,0,0,1-10.1-.1a11.3,11.3,0,0,1-.1-1.3A10.1,10.1,0,0,1-5.6-9.9,10,10,0,0,1-.2-11.8H0.6A10.3,10.3,0,0,1,8.8-8.1a10,10,0,0,1,2.6,6.7A11.2,11.2,0,0,1,11,1.8,10.5,10.5,0,0,1,4.9,8.6ZM5.6,0.9L4,0.3H4a2.3,2.3,0,0,0-.8.8,2.2,2.2,0,0,1-.8.8h0A4.2,4.2,0,0,1,.8,1.3,8.2,8.2,0,0,1-1.5-.8a3.9,3.9,0,0,1-.8-1.4L-1.8-3a1.5,1.5,0,0,0,.5-0.9L-2-5.4a5.4,5.4,0,0,0-.8-1.4H-4Q-5.6-6.5-5.6-4A6.8,6.8,0,0,0-4.1-.4,12.2,12.2,0,0,0,.4,3.7,12.1,12.1,0,0,0,3.7,4.8H4a3.8,3.8,0,0,0,1.7-.4A2.4,2.4,0,0,0,7.1,2.1a1.8,1.8,0,0,0,0-.4Z" transform="translate(23.2 22.9)" />
        </g>
      </svg>

    </a>
  </div>
</div>
<!-- fin boton whatsapp -->

</body>
</html>