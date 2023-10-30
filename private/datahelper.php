<?php

$cart = ['ID', 'TITLE', 'PIC'];

function genPicCart(array $data, array $cart, $page, string $id = 'id', string $title = 'title', string $pics = 'pics') 

{
    if (isset($_GET['pic_id'])) {
        $id=$_GET['pic_id'];
        $e=DH::delete($id);
        }
    print('<div class="container-fluid">
            <div class="row">
                <div class="gallery col-12 col-md-8 gal_show">');
                $countHead = count($cart);
                    for($i = 0; $i < $countHead; $i++){
                        print ('<div class="gallery__column">
                                    <a href="${p.place}" target="_blank" class="gallery__link">
                                        <figure class="gallery__thumb">
                                            <img src="'.$data[$i][$pics].'" alt="Portrait by Jessica Felicio"
                                                class="gallery__image">
                                                <figcaption class="gallery__caption">' . $data[$i][$title] . '</figcaption>
                                        </figure>
                                        <td colspan="2">'
                                            . '<a href="edit.php?pic_id='.$data[$i][$id].'" class="btn btn-danger m-3">Szerkeszt</a>'
                                            . '<a href="uploader.php?pic_id='.$data[$i][$id].'" class="btn btn-danger">Töröl</a>'
                                        . '</td>
                                    </a> 
                                </div>
                                ');   
                    }
    print('
                </div>
            </div>
        </div>'
    );
}

