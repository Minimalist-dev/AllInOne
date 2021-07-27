<?php
//https://www.youtube.com/watch?v=Y1bwTl1oGaA

//$nombre_fichero = '/path/to/foo.txt';
//
//if (file_exists($nombre_fichero)) {
//    echo "El fichero $nombre_fichero existe";
//} else {
//    echo "El fichero $nombre_fichero no existe";
//}
    $data[] = array(
        "id_kategori" => 1,
        "name_ketegori" => "Sajarah Indonesia"
    );
    
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("kategori.json", $jsonfile);
?>

