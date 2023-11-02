<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="köröm, nails, körömfestés, körömlakk, géllakk gél lakk,">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Galléria</title>
    
</head>
<body>
<div class="navbar">
    <div class="logo">
        <img src="../img/logo.jpg" class="logo justify-content-start" alt="Körmös logó">
    </div>
        <div class="nav_links">
            <a href="../index.html"class="fst_pg">Kezdőlap</a>
            <a href="../pages/service.html"class="services">Szolgáltatások</a>
            <a href="../pages/gallery.php"class="gall_on">Galéria</a>
            <a href="../private/upload.php" class="upload">Képfeltöltés</a>
            <div class="d-flex justify-content-end">
                <a href="../pages/cont.html" class="contact">Elérhetőség</a>
            </div>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="mobil_navbar()">
            <i class="fa fa-bars"></i>
          </a>
    </div>
    <?php 
require ('../private/helper.php');
    $p=DH::Selectdata();
                   echo'
                   <div class="d-flex justify-content-center">
                   <div class="op_img">
                   </div>
                   </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="gallery col-12 col-md-8">';                
                                    for ($i=0; $i < count($p); $i++) { 
                                    echo ('<div class="gallery__column">
                                        <div  class="gallery__link">
                                            <figure class="gallery__thumb">
                                                <img src="'.$p[$i]['picture_url'].'" onclick="img_box(this)" alt="Portrait by Jessica Felicio"
                                                    class="gallery__image">
                                                    <figcaption class="gallery__caption">'.$p[$i]['title'].'</figcaption>
                                            </figure>
                                        </div> 
                                    </div>
                                    ');
                                }
                                echo('</div>
                            </div>
                        </div>');
?>

<script src="../js/script.js"></script>

</body>
</html>