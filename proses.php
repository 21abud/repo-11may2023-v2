<?php
//sumber
$file= "mydata.json";

//ambil isi file lalu ubah jadi array
$ambilData= file_get_contents($file);
$decodeData= json_decode($ambilData, TRUE);

//ambil isi form & jadikan dalam bentuk array
$array= array();
$data= array(
    "nama" => $_POST['nama'],
    "kelamin" => $_POST['kelamin'],
    "email" => $_POST['email'],
    "alamat" => $_POST['alamat'],
    "program" => $_POST['program'],
    "tahun" => $_POST['tahun']
);

//push data dari $data ke dalam $decodeData (saat ini masih berbentuk array)
array_push($decodeData, $data);
//ubah array menjadi json
$json= json_encode($decodeData, JSON_PRETTY_PRINT);
//tulis data (dari $json) ke dalam file ($file)
file_put_contents($file, $json)

?>