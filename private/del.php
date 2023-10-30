<!DOCTYPE html>
<?php
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $e=DH::delete($id);
    }
?>
<html>
    <head>
        <meta charset = "UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Valóban törölni szeretné?</h3>
        <form method="POST">
            <input type = "hidden" value = "<?php print($id); ?>" name = "delete_id">
            <button type="submit" name="igen">Igen</button>
            <a href="index.php?p=<?php print($page); ?>">Nem</a>
        </form>
        <?php
        if (isset($_POST['igen']) && isset($_POST['deleted_id'])) {
            $id = (int) $_POST['deleted_id'];
            require_once './conn.php';
            mysqli_connect($server, $user, $password, $db,);
            $sql = "DELETE FROM pictures WHERE pic_id = '" . $id . "'";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                print(mysqli_error($conn));
            }
            
            mysqli_close($conn);
            header('Location: index.php?p='.$page);
        }
        ?>

    </body>
</html>
