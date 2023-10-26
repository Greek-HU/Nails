<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            <div class="text-center form_box">
                <h1>Képfeltöltő űrlap</h1>
                 
                <form method="post" enctype="multipart/form-data">
                    <div>
                        <input type="file" id="kep" name="kep" accept="image/*">
                    </div>
                    <div >
                        <label for="cim">Cím:</label>
                        <input type="text" id="cim" name="cim">
                    </div>
                    <div class="fomr_btn">
                        <button class="btn btn-dark" type="submit" >Feltölt</button>
                    </div>
                </form>
            </div>
    
    <?php
        
    
            if(isset($_FILES['kep']) && $_FILES['kep']['error'] === 0){
                if(substr($_FILES['kep']['name'], -4)  == '.jpg' || substr($_FILES['kep']['name'], -4)  == 'jpeg' || substr($_FILES['kep']['name'], -4)  == '.png'){
                    $sourceImage = imagecreatefromjpeg($_FILES['kep']['tmp_name']);
                    if($sourceImage){
                        $originalWidth  = imagesx($sourceImage);
                        $originalHeight = imagesy($sourceImage);
                        $thumbWidth     = 100;
                        $thumbHeight    = floor($originalHeight * ($thumbWidth / $originalWidth));
                        $destImage      = imagecreatetruecolor($thumbWidth, $thumbHeight);
                        imagecopyresampled($destImage, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $originalWidth, $originalHeight);
                        
                        $fileName = $_POST['cim'] . '.jpg';
                        $filePath = '../img/'.$fileName;
                        copy($_FILES['kep']['tmp_name'], '../img/'.$fileName);
                        
                        $newImageObj = array(
                            "id" => date('YmdHis'),
                            "place" => "../img/" .$fileName,
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
    <div class="text-center">
        <?php
        require_once './helper.php';
        require_once './datahelper.php';
        ?>
        <?php
        $cart = ['ID', 'TITLE', 'PIC'];

        $tableData = [];

        if (isset($_GET['p'])) {
            $page = (int) $_GET['p'];
            $tableData = pageData($page);
            genPicCart($tableData, $cart, $page, 'pic_id');
            print(pager($page, 200));
        } else {
            $tableData = pageData(1);
            genPicCart($tableData, $cart, $page, 'pic_id');
            print(pager(1, 200));
        }
        
        ?>
                
    </div>
            </div>
    </div>
        <script src="./js/script.js"></script>

</body>
</html>