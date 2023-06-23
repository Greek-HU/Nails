<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <title>Képfeltöltő űrlap</title>
    
</head>
<body>
<div class="navbar">
        <div class="nav_links">
            <a href="../index.html"class="fst_pg">Kezdőlap</a>
            <a href="../index.html"class="services">Szolgáltatások</a>
            <a href="../index.html"class="gall_on">Galéria</a>
            <a href="uploader.php" class="upload">Belépés</a>
            <a href="../index.html" class="contact">Elérhetőség</a>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="mobil_navbar()">
            <i class="fa fa-bars"></i>
          </a>
    </div>
    <div class="box">
        <div class="text box_color">
            <h1>Képfeltöltő űrlap</h1>
            <form method="post" enctype="multipart/form-data">
                <input type="file" id="kep" name="kep" accept="image/*">
            <label for="cim">Cím:</label>
            <input type="text" id="cim" name="cim">
            <button type="submit">Feltölt</button>
            </form>
            <?php
                    if(isset($_FILES['kep']) && $_FILES['kep']['error'] === 0){
                        if(substr($_FILES['kep']['name'], -4)  == '.jpg' || substr($_FILES['kep']['name'], -4)  == 'jpeg'){
                            $sourceImage = imagecreatefromjpeg($_FILES['kep']['tmp_name']);
                            if($sourceImage){
                                $originalWidth  = imagesx($sourceImage);
                                $originalHeight = imagesy($sourceImage);
                                $thumbWidth     = 100;
                                $thumbHeight    = floor($originalHeight * ($thumbWidth / $originalWidth));
                                $destImage      = imagecreatetruecolor($thumbWidth, $thumbHeight);
                                imagecopyresampled($destImage, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $originalWidth, $originalHeight);
                                
                                $fileName = $_POST['cim'] . '.jpg';
                                imagejpeg($destImage, './private/img/'.$fileName);
                                imagedestroy($sourceImage);
                                imagedestroy($destImage);
                                copy($_FILES['kep']['tmp_name'], '../img/'.$fileName);
                                
                                $newImageObj = array(
                        "place" => $fileName,
                        "title" => $_POST['cim']
                    );
                    
                    // Módosítás: Korábbi adatok betöltése a JSON fájlból
                    $galleryData = array();
                    $galleryFile = '../galleryPic.json';
                    if (file_exists($galleryFile)) {
                        $galleryData = json_decode(file_get_contents($galleryFile), true);
                    }
                    
                    // Módosítás: Új objektum hozzáadása az adatokhoz
                    $galleryData[] = $newImageObj;
                    
                    // Módosítás: Az adatok mentése a JSON fájlba
                    file_put_contents($galleryFile, json_encode($galleryData, JSON_PRETTY_PRINT));
                            }else{
                                //hiba üzenet, mert a jpg-et nem sikerült betöltenie
                                print('hiba, szóljón a rendszergazdának!');
                            }
                        }
                    }
                ?>
            <div class="gallery"></div>
        </div>
    </div>
        <script src="./js/script.js"></script>
</body>
</html>