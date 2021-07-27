<?php
$file = "kategori.json";
$ketegori = file_get_contents($file);

$data = json_decode($ketegori, true);

foreach ($data as $value) {
    echo "<b>ID: </b>" . $value["id_kategori"] . " : <b>Nombre: </b> " . $value["name_ketegori"] . "<br>";
}
?>

