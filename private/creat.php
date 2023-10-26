<?php
function push_pic($newImageObj){
    if(isset($_POST['submit'])){ 
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
    };}
};