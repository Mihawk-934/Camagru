<?php
    require_once('../controleur/gallery.php');

    if ($_SESSION != NULL )
    {
        header("Location:gallery.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title> <?php ?> </title>
    <link rel="stylesheet" href="../public/style.css" />
    <link rel="stylesheet" href="../public/bootstrap.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body style="background-color: #fff ">

    <!-- ///////////NAV///////////// -->
    <p></p>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="margin-top: -1em;">
        <div class="navbar-collapse collapse show" id="navbarColor01" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="navbar-brand" s href="../index.php">Camagru</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/inscription.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/gallery.php">Galerie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/capture.php">Photo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php  if (isset($_SESSION['id_user'])){if ($_SESSION['id_user'] != NULL){echo "../model/session.php";}}else{echo "../view/connexion.php";} ?>">
                        <?php if (isset($_SESSION['id_user'])){if ($_SESSION['id_user'] != NULL){echo "Déconnexion";}}else{echo "Connexion";}?></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- //////////img galerie/////////// -->
    <div class=galerie-visiteur>
        <?php

                    foreach ($pho as $img)
                    {   
                    
                ?>
        <div id='galerie-visiteur'>
            <img id='img-galerie' src=<?=$img[1]?> alt='image' />
        </div>
        <?php   
                
                    }
                    
                ?>
    </div>

    <div class="page">
        <?php
                        if (isset($message))
                        {
                            echo '<font color="red">' . $message . "</font><br />";
                    }
                        for($i=1;$i<=$pages_totales;$i++) 
                        {
                            if($i == $page_courante) 
                            {
                                echo $i.' ';
                            } 
                            else 
                            {
                                echo '<a href="gallery.php?page='.$i.'">'.$i.'</a> ';
                            }
                        }
                ?>
    </div>
    <footer class="page-footer font-small mdb-color lighten-3 pt-4" style="margin-top: 16em;">
        <div class="footer-copyright text-center py-3" style="color: black; margin-top: 1em;">© 2019 Copyright:
            Miclaude
        </div>
    </footer>
</body>

</html>