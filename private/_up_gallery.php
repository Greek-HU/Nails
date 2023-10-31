<?php
    $p=DH::Selectdata();
            
                   echo'
                        <div class="container-fluid mt-5">
                            <div class="row">
                                <div class="gallery col-12 col-md-8 gal_show">';                
                                    for ($i=0; $i < count($p); $i++) { 
                                    echo ('<div class="gallery__column">
                                        <a href="${p.place}" target="_blank" class="gallery__link">
                                            <figure class="gallery__thumb">
                                                <img src="'.$p[$i]['picture_url'].'" alt="Portrait by Jessica Felicio"
                                                    class="gallery__image">
                                                    <figcaption class="gallery__caption">'.$p[$i]['title'].'</figcaption>
                                            </figure>
                                            <td colspan="2">
                                                <a href="edit.php?id_up='.$p[$i]['id'].'" class="btn btn-danger m-3">Szerkeszt</a>
                                                <a href="upload.php?id='.$p[$i]['id'].'" class="btn btn-danger">Töröl</a>
                                            </td>
                                        </a> 
                                    </div>
                                    ');
                                }
                                echo('</div>
                            </div>
                        </div>');
?>

