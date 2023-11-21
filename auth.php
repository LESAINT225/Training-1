<?php 
    session_start();

    if (isset($_SESSION['Connexion']) && $_SESSION['Connexion']=== true) {
        header('location:index.html');
        exit;
    }

    require_once"connexion.php";
    $mail_etud = $mp_etud = "";
    $mail_etud_err = $mp_etud_err = "";

    if ($_SERVER["REQUEST_METHOD"]=="POST" ) {
        if (empty(trim($_POST["mail_etud"]))) {
            $mail_etud_err ="Veuillez entrez votre identifiant";
        }
        else {
            $mail_etud_err = trim($_POST["mail_etud"]);
        }
    
        if (empty(trim($_POST["mp_etud"]))) {
            $mp_etud_err ="Veuillez entrez votre mot de passe";
        }
        else {
            $mail_etud_err = trim($_POST["mp_etud"]);
        }

        if (empty($mail_etud_err) && emp_etudty($mp_etud_err)) {
            $mail_etud_err ="Veuillez entrez votre mot de passe";
        
            $sql="SELECT id, mail_etud, mp_etud FROM etudiant WHERE mail_etud=?";

            if ($stmt = mysql_prepare($link,$sql)) {
                mysqli_stmt_bind_param($stmt, "S", $param_mail_etud);
                
                $param_mail_etud=$mail_etud;

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_rsult($stmt);

                    if (mysqli_stmt_num_rows($stmt==1)) {
                        mysqli_stmt_bind_result($stmt, $id, $mail_etud, $hashed_mp_etud);

                        if (mysqli_stmt_fetch($stmt)) {
                            if (mp_etud_verify($mp_etud, $hashed_mp_etud)) {
                                session_start();

                                $_SESSION["Connexion"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["mail_etud"] = $mail_etud;

                                header("location:pannel.html");

                            }else {
                                $mp_etud_err = "Le mot de passe saisi est n'est pas valide";
                            }
                        }else {
                            $mail_etud_err = "Aucun compte trouvé avec ce nom d'utiilisateur";
                        }
                    }else {
                        echo "Oops ! Quelque chose s'est mal passé. Veuillez réessayer ultériellement.";
                    }
                }
                mysqli_stmt_close($stmt);
            }
            mysqli_close($link);
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Comp_etudatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="media/images/logo/logo bde blanc.png">
    <link rel="stylesheet" href="style.css"><title>www.bde.com</title>
    <style>
        .wrapper{width: 360px; padding: 20px;};
    </style>
</head>
    
<body>
    <div class="wrapper">
        <h2>Connexion</h2>
        <p>Veuillez remplir vos idendifiant pour vous connecter.</p>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?> " method="post">
            <div>
                <label for="">Adresse email</label>
                <input type="mail" name="mail_etud" id="" value="<?php echo $mail_etud; ?>">
                <span><?php echo $mail_etud_err; ?></span>

                <label for="">Mot de passe</label>
                <input type="password" name="mp_etud" id="" value="<?php echo $mp_etud; ?>">
                <span><?php echo $mp_etud_err; ?></span>

                <input type="submit" value="Connexion">
                <p>Vous n'avez pas de compte?<a href="inscription.html">Inscrivez-vous maintenat</a></p>
            </div>
        </form>
    </div>
</body>
</html>
