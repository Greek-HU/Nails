<?php include('_header.php'); ?>
<?php
    require('./DataHelper.php');
    if (isset($_GET['id_up'])) {
        $id_up=$_GET['id_up'];
        $data=DataHelper::userDataPerId($id_up);
    }
    if (isset($_POST['upgrade_btn'])) {
        $title=$_POST['title'];
        
        if (!empty($_POST['title'])) {
        $u=DataHelper::Update($id_up, $title);}
       }
?>
<div class="text-center">
<?php
    $p=DataHelper::Selectdata();  
         
        echo ('<div class="gallery__column">
            
                <figure class="gallery__thumb">
                    <img src="'.$data['picture_url'].'" alt="Portrait by Jessica Felicio"
                        class="gallery__image">
                        <figcaption class="gallery__caption"></figcaption>
                </figure>
                
                <td colspan="2">
                <form action="" method="POST">
                    <div class="text-center">'); ?>
                        <input type="text" name="title" value="<?php if(isset($data)){ echo $data['title'];
            } ?>">
                    <?php echo('<div>
                    
                    <input type="submit" class="btn btn-danger m-3" value="Frissít" name="upgrade_btn"> 
                </form>
                </td>
            
        </div>
        ');
    
?>
</div>

<script src="./js/script.js"></script>

</body>
</html>