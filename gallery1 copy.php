<?php
    require_once('../controleur/gallery.php');
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

<body style="background-color: #222 ">

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
                        href="<?php  if (isset($_SESSION['id_user'])){if ($_SESSION['id_user'] != NULL){echo "model/session.php";}}else{echo "view/connexion.php";} ?>">
                        <?php if (isset($_SESSION['id_user'])){if ($_SESSION['id_user'] != NULL){echo "Déconnexion";}}else{echo "Connexion";}?></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="containerr">
        <div class="div-galerie">
            <?php

            foreach ($pho as $img)
            {   
                if (isset($_SESSION['id_user'])!= NULL)
                {

                    echo"<div id ='div-in-galerie'  class=''>";   
                        echo"<img id= 'img-galerie' src=$img[1] alt='image'/><br>";
                            $id_image = $img[0];
                            $couleur = like_inf_info($id_user,$id_image);
                            $nb = like_photo($img[0]);
                            $style = "";
                            if ($couleur == 1){$style = "background: red;width:50%;";}else{$style = "background: #375a7f;width:50%;";}
                    echo"<div id='nn'>";
                        echo "<form action='gallery.php' method='POST' id = 'form_like'>";
                            echo "<input type='hidden' id = 'id_img_gal' name = 'id_img_gal' value = $img[0] >";
                            echo "<h1 id='like-p'>Personnes qui ont aimer<h1>";
                            echo "<button id='but-like' style='width:200px;". $style ." class='btn_del' type='submit' name = 'like' >J'aime</button>";
                        echo "</form>";
                        echo "<h1>COMMENTAIRE<h3>";
                        $cm = comment_recup($img[0]);
                        $cmf = $cm;
                        echo "<div id='comment'> ".$cmf."</div>";
                        echo "<form action='gallery.php' method='POST' id = 'form_comment'>";
                            echo "<textarea class='comment' name = 'input_comment' placeholder = 'votre commentaire'></textarea>";
                            echo "<input type='hidden' id = 'id_img_gal' name = 'id_img_gal' value = $img[0] ><br />";
                            echo "<button  class='btn_del' type='submit' name = 'btn_comment'>Poster</button>";
                        echo "</form>";
                    echo"</div>";
                    echo"</div>";
                                    }
                                }
                                ?>
        </div>
        <!-- <footer class="page-footer font-small mdb-color lighten-3 pt-4" style="margin-top: 16em;">

                <div class="footer-copyright text-center py-3" style="color: white; margin-top: 1em;">© 2019 Copyright:
                    Miclaude
                </div>
            </footer> -->
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

</body>

</html>