<?php
$file = "kategori.json";
$kategori = file_get_contents($file);
$data = json_decode($kategori, true);

$data[] = array(
    "id_kategori" => 2,
    "name_ketegori" => "Fisika"
);

$jsonfile = json_encode($data, JSON_PRETTY_PRINT);
$kategori = file_put_contents($file, $jsonfile);
?>
