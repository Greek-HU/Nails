<?php
$cart = ['ID', 'TITLE', 'PIC'];

function genPicCart(array $data, array $cart, $page, string $primaryKey = 'id', string $title = 'title') 
{
    
    print('<div class="container-fluid">
            <div class="row">
                <div class="gallery col-12 col-md-8 gal_show">');
                $countHead = count($cart);
                    for($i = 0; $i < $countHead; $i++){
                        print ('<div class="gallery__column"> ');
                            print(' <a href="${p.place}" target="_blank" class="gallery__link">');

                        
                                

                                    
                                        print('<figure class="gallery__thumb">');
                                        print('<img src="${p.place}" alt="Portrait by Jessica Felicio"
                                            class="gallery__image">
                                            <figcaption class="gallery__caption">' . $data[$i][$title] . '</figcaption>');
                                        print('</figure>');
                                    
                                    print('<td colspan="2">'
                                            . '<a href="edit.php?id='.$data[$i][$primaryKey].'&p=' . $page . '" class="btn btn-danger m-3">Szerkeszt</a>'
                                            . '<a href="del.php?id='.$data[$i][$primaryKey].'&p=' . $page . '" class="btn btn-danger">Töröl</a>'
                                            . '</td>');
                                    
                            
                        
                        print('
                            </a> 
                        </div>');
                        
                    }
    print('
                </div>
            </div>
        </div>'
    );
}
function getData($conn, int $from, int $count) {
    $reData = [];
    //if (is_resource($conn)) {
        $sql = "SELECT pic_id, title, pics FROM pictures LIMIT " . $from . " , " . $count;
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $reData[] = $row;
            }
        } else {
            return false;
        }
    //}
    return $reData;
}