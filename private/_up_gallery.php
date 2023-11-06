<?php

    $p=DataHelper::Selectdata();
            
                   echo'
                        <div class="container mt-5">
                            <div class="row">
                                <div class="gallery col-12 col-md-8">';                
                                    for ($i=0; $i < count($p); $i++) { 
                                    echo ('<div class="gallery__column">
                                        <div class="gallery__link">
                                            <figure class="gallery__thumb">
                                                <img src="'.$p[$i]['picture_url'].'" alt="Portrait by Jessica Felicio"
                                                    class="gallery__image">
                                                    <figcaption class="gallery__caption">'.$p[$i]['title'].'</figcaption>
                                            </figure>
                                            <td colspan="2">
                                                <a href="edit.php?id_up='.$p[$i]['id'].'" class="btn btn-danger m-3">Szerkeszt</a>
                                                <a href="upload.php?title='.$p[$i]['title'].'" class="btn btn-danger">Töröl</a>
                                            </td>
                                        </div> 
                                    </div>
                                    ');
                                }
                                echo('</div>
                            </div>
                        </div>');
?>

