<?php include './_header.php'; ?>
    <?php
        require('./DataHelper.php');
        if(isset($_GET['title'])){
            $title = $_GET['title'];
            $e=DataHelper::Delete($title);           
        }
        if (isset($_POST['upload_button'])) {
            $new_title=$_POST['title'];
            $picture=$_FILES['picture']['name'];
            $p=DataHelper::Upload($new_title, $picture);                     
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
        <script src="../js/script.js"></script>

</body>
</html>