<?php
    
    include 'conexion.php';

    $nombre_completo = $_POST['nombre_completo'];
    $dni_document = $_POST['dni_document'];
    $numero_telefono = $_POST['numero_telefono'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    //encriptacion de contraseña
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO `usuarios`(`nombre_completo`, `dni_document`, `numero_telefono`, `correo`, `contrasena`)
              VALUES('$nombre_completo', '$dni_document', '$numero_telefono', '$correo', '$contrasena')";

    //Verificar que el DNI no se repita
    $verify_dni = mysqli_query($conexion, "SELECT * FROM usuarios WHERE dni_document='$dni_document' ");

    if(mysqli_num_rows($verify_dni) > 0){
        echo '
        <script>
            alert("El numero de identidad ya esta en uso, Intenta con otro diferente");
            window.location = "../index.php";
        </script>
        ';
        exit();
    }
    // Fin de verificacion de documento de identidad

    //Verificar que el numero de telefono no se repita
    $verify_phone = mysqli_query($conexion, "SELECT * FROM usuarios WHERE numero_telefono='$numero_telefono' ");

    if(mysqli_num_rows($verify_phone) > 0){
        echo '
        <script>
            alert("El numero telefonico ya esta en uso, intento otro diferente");
            window.location = "../index.php";
        </script>
        ';
        exit();
    }
    // Fin de verificacion de telefono

    //Verificar que el correo no se repita en la DB
    $verify_mail = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

    if(mysqli_num_rows($verify_mail) > 0){
        echo '
        <script>
            alert("El correo ya esta en uso, Intenta con otro diferente");
            window.location = "../index.php";
        </script>
        ';
        exit();
    }
    // Fin de verificacion de mail


    $execution = mysqli_query($conexion, $query);

    if($execution){
        echo '
        <script>
            alert("Registro Exitosamente");
            window.location = "../index.php";
        </script>';
    }else{
        echo '
        <script>
            alert("Fallo en el registro de usuario");
            window.location = "../index.php";
        </script>
        ';
    }

    mysqli_close($conexion);

?>

