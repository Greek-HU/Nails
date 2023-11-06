<?php

class DataHelper{
    public static function conect()
    {
       try {
        $con=new PDO('mysql:localhost=host; dbname=nails','root','');
        return $con;
       } catch (PDOException $error1) {
            echo 'Something went wrong, with you conection!'.$error1->getMessage();
       }catch (Exception $error2){
             echo 'Generic error!'.$error2->getMessage();
       }
    }
    public static function Upload($title, $picture){
        $fileName = $title.'.jpg';
        $pic_url = "../img/".$title.'.jpg';
        if (!empty($title)&& !empty($picture)) {
            $p=DataHelper::conect()->prepare('SELECT * FROM pictures WHERE title=:title');
            $p->bindValue(':title',$title);
            $p->execute();
            $results = $p->fetchAll();
            if(!empty($results)){
                //header('Location: upload.php');
                echo('Ilyen néven "'.$title.'" már létezik kép!');
            }else{ 
            
                if(substr($picture, -4)  == '.jpg' || substr($picture, -4)  == 'jpeg' || substr($picture, -4)  == '.png'){
                    $p=DataHelper::conect()->prepare('INSERT INTO pictures (title,picture_url) VALUES(:t,:p)');
                    $p->bindValue(':t', $title);
                    $p->bindValue(':p', $pic_url);
                    move_uploaded_file($_FILES["picture"]["tmp_name"], $pic_url);
                    $p->execute();
                    
                }else{
                    echo('<div class=" d-block p-3 text-center bg-danger text-light">
                        <p>Hiba történt, a kép nem töltődött fel!</p>
                    </div>');
                }
            }
        }else{
            echo 'A kép nem töldődött fel!';
        }
    }
    public static function Selectdata()
    {
        $data=array();
        $p=DataHelper::conect()->prepare('SELECT * FROM pictures');
        $p->execute();
       $data=$p->fetchAll(PDO::FETCH_ASSOC);
       return $data;
    }
    public static function Update($id_up, $new_title){
        $p=DataHelper::conect()->prepare('SELECT * FROM pictures WHERE title=:new_title');
        $p->bindValue(':new_title',$new_title);
        $p->execute();
        $results = $p->fetchAll();
        if(!empty($results)){
            //header('Location: upload.php');
            echo('Ilyen néven "'.$new_title.'" már létezik kép!');
        }else{ 
        $p=DataHelper::conect()->prepare('SELECT * FROM pictures WHERE id=:id');
            $p->bindValue(':id',$id_up);
            $p->execute();
            $img = $p->fetch();
            $old_url = $img['picture_url'];
        
        $new_url = '../img/'.$new_title.'.jpg';
            $p=DataHelper::conect()->prepare('UPDATE pictures SET title=:t, picture_url=:new_url where id=:id');
                $p->bindValue(':id',$id_up);
                $p->bindValue(':t', $new_title);
                $p->bindValue(':new_url', $new_url);
                $p->execute();
                rename($old_url, $new_url);

            header('Location: upload.php');
        }
    }
    public static function Delete($title)
    {
        $p=DataHelper::conect()->prepare('DELETE FROM pictures WHERE title=:title');
        $p->bindValue(':title',$title);
        $p->execute();
        $img_path = '../img/' .$title. '.jpg';
        
        unlink($img_path);
    }
    public static function userDataPerId($id)
        {
            $data=array();
            $p=DataHelper::conect()->prepare('SELECT * FROM pictures WHERE id=:id');
            $p->bindValue(':id',$id);
            $p->execute();
            $data=$p->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
}