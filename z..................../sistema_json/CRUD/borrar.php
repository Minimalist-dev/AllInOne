<?php
    $file = "kategori.json";
    $kategori = file_get_contents($file);
    $data = json_decode($kategori, true);
    
    foreach ($data as $key => $value) {
        if ($value["id_kategori"] == 2) {
            array_splice($data, $key, 1);
        }
    }
    
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    $kategori = file_put_contents($file, $jsonfile);
?>
