<?php

include 'conexion_deposit.php';

    $sql="SELECT * FROM invesment";
    $depositos=$conexion_deposit->query($sql);

    $sql1="SELECT * FROM retiros";
    $retiros=$conexion_deposit->query($sql1);
    
?>

