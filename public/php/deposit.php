<?php
    
    include 'conexion_deposit.php';
    
    $wallet_pago = $_POST['wallet_pago'];
    $correo_pago = $_POST['correo_pago'];
    $fecha = $_POST['fecha'];
    $monto = $_POST['monto'];
    $hash = $_POST['hash'];
    $red = $_POST['red'];

    $query = "INSERT INTO `invesment`(`wallet_pago`,`correo_pago`, `fecha`, `monto`, `hash`, `red`)
              VALUES('$wallet_pago','$correo_pago', '$fecha', '$monto', '$hash', '$red')";

    //Verificar que el hash no se repita
    $verify_hash = mysqli_query($conexion_deposit, "SELECT * FROM invesment WHERE hash='$hash' ");

    if(mysqli_num_rows($verify_hash) > 0){
        echo '
        <script>
            alert("El hash de transaccion ya se registro en otro pago, Verifica tu hash");
            window.location = "../dashboard.php";
        </script>
        ';
        exit();
    }
    // Fin de verificacion de hash

    $execution = mysqli_query($conexion_deposit, $query);

    if($execution){
        echo '
        <script>
            alert("Pago en tramite");
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

