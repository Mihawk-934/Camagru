<?php
    require_once("../controleur/capture.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title> <?php ?> </title>
    <link rel="stylesheet" href="../public/stylecaptur.css" />
    <link rel="stylesheet" href="../public/bootstrap.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!-- ///////////NAV///////////// -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="navbar-brand" href="#">Camagru</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
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
                <a class="nav-link"
                    href="<?php  if (isset($_SESSION['id_user'])){if ($_SESSION['id_user'] != NULL){echo "../model/session.php";}}else{echo "../view/connexion.php";} ?>">
                    <?php if (isset($_SESSION['id_user'])){if ($_SESSION['id_user'] != NULL){echo "Déconnexion";}}else{echo "Connexion";}?></a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <!-- ///////////cam///////////// -->

        <div class="camera_btn">
            <div id="cam_div" class="col">
                <video id="video" width="700" height="600"></video>
                <canvas id="canvas" width="700" height="600"></canvas>
            </div>

            <!-- ///////////bouton et filtre///////////// -->

            <div class='' id="btn">
                <button class="btn btn-primary" onclick='takePicture()' id="capture" class="pics">Prendre une
                    photo</button>
                <button class="btn btn-primary" onclick='deleteFilter()'>Supprimer le filtre</button>
                <button class="btn btn-primary" onclick='clearButton()' id="clear-button"
                    class="btn btn-light">Supprimer la galerie</button>
                <button class="btn btn-primary" onclick='camOn()' id="cam-on-of" class="btn btn-light">Cam
                    on/off</button>
                <!-- //////////telecharger img///////////// -->
                <div class="custom-file">
                    <label class="custom-file-label" for="inputGroupFile02">telecharger image</label>
                    <input class="input-group-text" type="file" name="file" id="inputGroupFile02">
                </div>
            </div>

            <div class='col' id='filter' style="display:flex;">
                <ul id="photo-montge">
                    <?php
                            //  $_SERVER['DOCUMENT_ROOT'].
                                $path ="../public/images/filter"; 
                                $index = 0;
                                $files = scandir($path);
                                foreach ($files as $file){
                                    $fl = explode('.', $file); 
                                if ($fl[1] == 'png'){
                                    $index++;
                            ?>
                    <li> <img onclick='addFilter(<?=$index?>)' class='filter' id='<?=$index?>'
                            src="<?='../public/images/filter/'.$file?>" /></li>
                    <?php
                                        }
                                }
                            ?>
                </ul>
            </div>
        </div>
        <!-- ///////////photo camera///////////// -->

        <div id="photos">

        </div>


        <div>
        </div>
    </div>
    </div>
    <script type="application/javascript" src="../js/test11.js"></script>
    <div id="co">
        <?php
            if (isset($message))
            {
                echo '<font color="red">' . $message . "</font>";
            }
        ?>
        <!-- ////////////gallery//////////////////// -->
        <div class="slideshow-container">
            <?php 
            foreach ($imge as $img)
            {
                ?>
            <div class="mySlides fade">
                <img src='<?= $img[0]?>' style="width:100%">
            </div>
            <?php
            }
            ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
</body>

</html>