<?php 
$conn=mysqli_connect('localhost', 'root', '', 'gest_etud') or die (mysqli_error());
$MAT=$_POST['mat_etud'];
$NOM=$_POST['nom_etud'];
$PNOM=$_POST['pnom_etud'];
$SEXE=$_POST['genre_etud'];
$NVO=$_POST['niv_etud'];
$PTO=$_POST['photo_etud'];
$FIL=$_POST['fil_etud'];
$MAIL=$_POST['mail_etud'];
$MP=$_POST['mp_etud'];

    

$req="INSERT INTO etudiant (mat_etud, nom_etud, pnom_etud, genre_etud, niv_etud, photo_etud, fil_etud, mail_etud, mp_etud) 
VALUES ('$MAT', '$NOM', '$PNOM', '$SEXE', '$NVO', '$PTO', '$FIL', '$MAIL', '$MP' )";
$res=mysqli_query($conn,$req);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="media/images/logo/logo bde blanc.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>www.bde.com</title>
</head>
<body>
    
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="index.html"><img src="media/images/logo/logo bde.png" alt=""></a>
            </div>
            <div class="btn btn-nav">
                <a href="connexion.html">Connexion</a>
            </div>
        </div>
    </header>
    <section>
        <div id="container">
            <form>
                <table align="center">
                    <tr>
                        <td align="center">
                            <p><b><span><?php echo ($NOM) ?> </span></b>
                            <b><span><?php echo ($PNOM) ?> </span></b>
                            <br>email: <b><span><?php echo ($MAIL) ?></span></b>
                            étudiant en <b><span><?php echo ($NVO) ?></span></b><br>
                            vous êtes enregistrer avec succès !!!
                            </p>
                            <div class="btn">
                            <p><a href="connexion.html">Continuer</a></p>  
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>

    <footer>
        <div class="copyright">
            <span> &copy; 2023 Tous droits réservés <a href="#">BDE</a></span>
        </div>
    </footer>
</body>
</html>