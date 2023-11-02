<?php include './_header.php'; ?>
    <?php
        require('./helper.php');
        if(isset($_GET['title'])){
            $title = $_GET['title'];
            $e=DH::delete($title);           
        }
        if (isset($_POST['upload_button'])) {
            $title=$_POST['title'];
            $fileName = $_POST['title'].'.jpg';
            $pic_url = "../img/".$_POST['title'].'.jpg';
           if (!empty($_POST['title'])&& !empty($_FILES['picture'])) {
            if(substr($_FILES['picture']['name'], -4)  == '.jpg' || substr($_FILES['picture']['name'], -4)  == 'jpeg' || substr($_FILES['picture']['name'], -4)  == '.png'){
                $p=DH::conect()->prepare('INSERT INTO pictures (title,picture_url) VALUES(:t,:p)');
                $p->bindValue(':t', $title);
                $p->bindValue(':p', $pic_url);
                move_uploaded_file($_FILES["picture"]["tmp_name"], $pic_url);
                $p->execute();
                
            }else{
                echo('<div class=" d-block p-3 text-center bg-danger text-light">
                    <p>Hiba történt, a kép nem töltődött fel!</p>
                </div>');
            }
            }else{
                echo 'A kép nem töldődött fel!';
            }
           
        }
    ?>
    <div class="box pb-4">
        <div class="text box_color">
            <div class="text-center form_box">
                <h1>Képfeltöltő űrlap</h1>
                 
                <form method="post" enctype="multipart/form-data">
                    <div>
                        <input type="file" name="picture" accept="image/*">
                    </div>
                    <div >
                        <label for="cim">Cím:</label>
                        <input type="text" name="title">
                    </div>
                    <div class="fomr_btn">
                        <input class="btn btn-dark" type="submit" value="Feltöltés" name="upload_button">
                    </div>
                </form>
            </div>
            </div>
            </div>
    </div>
    <?php include './_up_gallery.php'; ?>
        <script src="./js/script.js"></script>

</body>
</html>