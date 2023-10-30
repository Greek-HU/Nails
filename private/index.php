<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <title>Képfeltöltő űrlap</title>
</head>
<body>
<div class="navbar">
    <div class="logo">
        <img src="../img/logo.jpg" class="logo justify-content-start" alt="Körmös logó">
    </div>
        <div class="nav_links">
            <a href="../index.html"class="fst_pg">Kezdőlap</a>
            <a href="../index.html"class="services">Szolgáltatások</a>
            <a href="../index.html"class="gall_on">Galéria</a>
            <a href="#" class="upload">Képfeltöltés</a>
            <div class="d-flex align-items-end justify-content-end">
                <a href="../index.html" class="contact">Elérhetőség</a>
            </div>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="mobil_navbar()">
            <i class="fa fa-bars"></i>
          </a>
    </div>
    <div class="box">
        <div class="text box_color">
            <div class="text-center form_box">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div>
                        <input type="file" id="kep" name="kep" accept="image/*">
                    </div>
                    <div >
                        <label for="cim">Cím:</label>
                        <input type="text" id="cim" name="title">
                    </div>
                    <div class="fomr_btn">
                        <input class="btn btn-dark" type="submit" value="Kép feltöltése" />
                    </div>
                  </form>
            </div>
        </div>
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
                $tableData = DH::pageData($page);
                genPicCart($tableData, $cart, $page, 'pic_id');
                print(pager($page, 200));
            } else {
                $tableData = DH::pageData(1);
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