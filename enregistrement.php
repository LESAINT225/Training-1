<?php 
    $conn=mysqli_connect('localhost', 'root', '', 'classe') or die (mysqli_error());

    $req="SELECT * FROM etudiant";

    $res=mysqli_query($conn,$req);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylenregist.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="media/images/logo/logo bde.png" alt=""></a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="index.html #service">Services</a></li>
                    <li><a href="#">Réalisations</a></li>
                    <li><a href="index.html #contact">Nous contacter</a></li>
                </ul>
            </nav>
        </div>
        <div id="form-bg">
            <table>
            <tr>
                <td>Identifiant</td><td>Nom</td><td>Prénom</td><td>Email</td><td>profession</td>
            </tr>
            <?php while ($ET=mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?php echo ($ET['id']) ?></td>
                <td><?php echo ($ET['nom']) ?></td>
                <td><?php echo ($ET['prenom']) ?></td>
                <td><?php echo ($ET['email']) ?></td>
                <td><?php echo ($ET['profession']) ?></td>
                <td><a href="" class="btn-modif">MODIFIER</a></td>
                <td><a href="" class="btn-supp">SUPPRIMER</a></td>
            </tr>
            <?php }?>
            
                <td class="btn-ajout" colspan="7">
                    <a href="formulaire.html">AJOUTER</a>
                </td >
            
        </table>
        </div>
    </header>
    
    <footer>
        <div class="copyright">
            <span> &copy; 2023 Tous droits réservés <a href="#">BDE</a></span>
        </div>
    </footer>
</body>
</html>