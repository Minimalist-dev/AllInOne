<?php
$file = "kategori.json";
$kategori = file_get_contents($file);
$data = json_decode($kategori, true);

//    $data[] = array(
//        "id_kategori" => "2",
//        "name_ketegori" => "teknolegi"
//    );

foreach ($data as $key => $value) {
    if ($value["id_kategori"] == 1) {
        $data[$key]["name_ketegori"] = "Productif TKJ";
    }
}

$jsonfile = json_encode($data, JSON_PRETTY_PRINT);
$kategori = file_put_contents($file, $jsonfile);
?>
