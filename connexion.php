<?php
    
    $con = mysqli_connect("localhost","root","","gest_etud");
    if(!$con)
    {
        die("Impossible de faire la connexion".mysqli_error());
    }
?>