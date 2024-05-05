<?php

include 'conexion_deposit.php';

$wallet_retiro = $_POST['wallet_retiro'];
$correo_retiro = $_POST['correo_retiro'];
$fecha_retiro = $_POST['fecha_retiro'];
$monto_retiro = $_POST['monto_retiro'];
$red_retiro = $_POST['red_retiro'];

$query = "INSERT INTO `retiros`(`wallet_retiro`,`correo_retiro`, `fecha_retiro`, `monto_retiro`, `red_retiro`)
          VALUES('$wallet_retiro','$correo_retiro', '$fecha_retiro', '$monto_retiro', '$red_retiro')";

$execution = mysqli_query($conexion_deposit, $query);

if($execution){
    echo '
    <script>
        alert("Retiro en espera...");
        alert("El tiempo estimado es de 24 horas");
        window.location = "../dashboard.php";
    </script>';
}else{
    echo '
    <script>
        alert("Fallo en el registro del pago");
        window.location = "../dashboard.php";
    </script>
    ';
}


mysqli_close($conexion_deposit);

?>


