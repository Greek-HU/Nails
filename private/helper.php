<?php

class DH{
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
    public static function Selectdata()
    {
        $data=array();
        $p=DH::conect()->prepare('SELECT * FROM pictures');
        $p->execute();
       $data=$p->fetchAll(PDO::FETCH_ASSOC);
       return $data;
    }
    public static function delete($id)
    {
        $p=DH::conect()->prepare('DELETE FROM pictures WHERE id=:id');
        $p->bindValue(':id',$id);
        $p->execute();
    }
    public static function userDataPerId($id)
        {
            $data=array();
            $p=DH::conect()->prepare('SELECT * FROM pictures WHERE id=:id');
            $p->bindValue(':id',$id);
            $p->execute();
            $data=$p->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
}