<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinif_yarat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı Hatası:Veri tabanı: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csvFile"])) {
    $fileName = $_FILES["csvFile"]["name"];
    $fileTmpName = $_FILES["csvFile"]["tmp_name"];
    $fileSize = $_FILES["csvFile"]["size"];
    $fileType = $_FILES["csvFile"]["type"];
    
    $uploadPath = 'C:\xampp1\htdocs\yukle/';

    if (move_uploaded_file($fileTmpName, $uploadPath . $fileName)) {
        $csvFile = fopen($uploadPath . $fileName, 'r');

        $headers = fgetcsv($csvFile);

        $sql = "INSERT INTO ogrenci (Ogrenci_ismi, Sinif) VALUES ";

        while (($data = fgetcsv($csvFile)) !== false) {
            $values = array_map(function ($value) use ($conn) {
                return "'" . $conn->real_escape_string($value) . "'";
            }, $data);

            $sql .= "(" . implode(',', $values) . "),";
        }

        $sql = rtrim($sql, ',');

        if ($conn->query($sql) === TRUE) {
            echo "Veriler başarıyla yüklendi.";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        fclose($csvFile);

        echo "Dosyalar başarıyla yüklendi.";
    } else {
        echo "Dosya yüklenemedi.";
    }
} else {
    echo "Geçersiz İstek.";
}
echo "<p>Copyright Mert Ata Baber</p>";

?>