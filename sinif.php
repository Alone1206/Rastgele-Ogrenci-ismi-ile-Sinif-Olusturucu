<?php



$hostname = "localhost";
$username = "root";
$password = "";
$database = "sinif_yarat";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Database connection is OK<br>";



if (isset($_POST['submit'])) {
    global $answer;
    global $seperatorgirdi;
    global $sinifbaslangicnum;


    $answer = $_POST['answer'];
    $seperatorgirdi = $_POST['seperatorgirdi'];
    $sinifbaslangicnum = $_POST['sinifbaslangicnum'];

    global $int;
    $int = (int)$answer;
    echo $int;

    if ($answer != null) {
        echo " “Sınıf Başına Öğrenci Sayısı: $answer";
    } else {
        echo "Lütfen Sınıf Başına Öğrenci Sayısını Boş Bırakmayınız";
    }
}
echo '<form method="post" action="sinif.php">  <p>Toplam kişi sayısı</p> <input type="number" name="answer"> <br> <p>Sınıf Başına Öğrenci Sayısı:</p> <input type="number" name="seperatorgirdi"><br> <p>Sınıf Başlangıç Numarası:</p> <input type="number" name="sinifbaslangicnum"> <br> <p>Dahil Edilecek Kademeler</p>> <input type="checkbox" name="multiple[]" value="9"> <span>9</span>
<input type="checkbox" name="multiple[]" value="10"><span>10</span>
<input type="checkbox" name="multiple[]" value="11"><span>11</span>
<input type="checkbox" name="multiple[]" value="12"><span>12</span>
<input type="submit" name="submit" value="Submit"> </form>';

global $ogrnum; 
global $sinifnumarasi;
$sinifnumarasi = $sinifbaslangicnum;
$ogrunm = 0;
if(isset($_POST['multiple'])) {
    $secilenler_kademeler = $_POST['multiple'];
 
 
    foreach($secilenler_kademeler as $sinif) {
        global $ilksinif;
        global $sinifsayisi;
        $ilksinif = $secilenler_kademeler[0];  
       $sinifsayisi = count($secilenler_kademeler);
     





     }
     if($sinifsayisi == 1){
                $sql = "SELECT Ogrenci_ismi, sinif FROM ogrenci WHERE sinif = $ilksinif; 
                ";
                $result = $conn->query($sql);
                $row = $result->fetch_all();


                $rand_keys = array_rand($row, 2);
                function getRandomAndRemove(&$array) {
                    $keys = array_keys($array);
                    $randomKey = $keys[array_rand($keys)];
                    $randomValue = $array[$randomKey];
                    unset($array[$randomKey]); 
                    return $randomValue;
                }
                
                
                
                for ($i = 0, $separatorCounter = 0; $i < $answer && !empty($row); $i++, $separatorCounter++) {
                    $randomValue = getRandomAndRemove($row);
                    echo $separatorCounter;
                
                    if (is_array($randomValue)) {
                        echo "Sayı Sırasındaki Öğrenci: " . print_r($randomValue, true) . "<br>";
                    } else {
                        echo "Rastgele Sayı: $randomValue<br>";
                    }
                
                    if ($separatorCounter === 11 && $i + 1 < $answer) {
                        echo "------------ ". $sinifnumarasi++ ." ------------<br>";
                        $separatorCounter = 0;
                    }
                }
            }
     if($sinifsayisi == 2){
global $ikincisinif;
        $ikincisinif = $secilenler_kademeler[1];
        $sql = "SELECT Ogrenci_ismi, sinif FROM ogrenci WHERE sinif = $ilksinif OR sinif = $ikincisinif; 
        ";
        $result = $conn->query($sql);
        $row = $result->fetch_all();

        function getRandomAndRemove(&$array) {
            $keys = array_keys($array);
            $randomKey = $keys[array_rand($keys)];
            $randomValue = $array[$randomKey];
            unset($array[$randomKey]); 
            return $randomValue;
        }
        
        
        for ($i = 0, $separatorCounter = 0; $i < $answer && !empty($row); $i++, $separatorCounter++) {
            $randomValue = getRandomAndRemove($row);
        
            if (is_array($randomValue)) {
                echo "Sayı Sırasındaki Öğrenci: " . print_r($randomValue, true) . "<br>";
            } else {
                echo "Rastgele Sayı: $randomValue<br>";
            }
        
            if ($separatorCounter === 11 && $i + 1 < $answer) {
                echo "------------ ". $sinifnumarasi++ ."  ------------<br>";
                $separatorCounter = 0;
            }
        }
}
    elseif($sinifsayisi == 3){
        global $ikincisinif;
        global $ucuncusinif;
        $ikincisinif = $secilenler_kademeler[1];
        $ucuncusinif = $secilenler_kademeler[2];
        $sql = "SELECT Ogrenci_ismi, sinif FROM ogrenci WHERE sinif = $ilksinif OR sinif = $ikincisinif OR sinif = $ucuncusinif; 
";
$result = $conn->query($sql);
$row = $result->fetch_all();
function getRandomAndRemove(&$array) {
    $keys = array_keys($array);
    $randomKey = $keys[array_rand($keys)];
    $randomValue = $array[$randomKey];
    unset($array[$randomKey]); 
    return $randomValue;
}


for ($i = 0, $separatorCounter = 0; $i < $answer && !empty($row); $i++, $separatorCounter++) {
    $randomValue = getRandomAndRemove($row);
echo $separatorCounter+1;
    if (is_array($randomValue)) {
        echo "Sayı Sırasındaki Öğrenci: " . print_r($randomValue, true) . "<br>";
    } else {
        echo "Rastgele Sayı: $randomValue<br>";
    }

    if ($separatorCounter === $seperatorgirdi-1 && $i + 1 < $answer) {
        echo "------------ ". $sinifnumarasi++ ."------------<br>";
        $separatorCounter = 0;
    }
}
    }
    elseif($sinifsayisi == 4){
        global $ikincisinif;
        global $ucuncusinif;    
        global $dorduncusinif;
        $ikincisinif = $secilenler_kademeler[1];
        $ucuncusinif = $secilenler_kademeler[2];
        $dorduncusinif = $secilenler_kademeler[3];
        $sql = "SELECT Ogrenci_ismi, sinif FROM ogrenci WHERE sinif = $ilksinif OR sinif = $ikincisinif OR sinif = $ucuncusinif OR sinif = $dorduncusinif; 
        ";
$result = $conn->query($sql);
$row = $result->fetch_all();
function getRandomAndRemove(&$array) {
    $keys = array_keys($array);
    $randomKey = $keys[array_rand($keys)];
    $randomValue = $array[$randomKey];
    unset($array[$randomKey]); 
    return $randomValue;
}

echo $sinifnumarasi ."<br>";
$sinifnumarasi = $sinifnumarasi + 1;
for ($i = 0, $separatorCounter = 0; $i < $answer && !empty($row); $i++, $separatorCounter++) {
    $randomValue = getRandomAndRemove($row);
echo $separatorCounter+1;
    if (is_array($randomValue)) {
        echo "Sayı Sırasındaki Öğrenci: " . print_r($randomValue, true) . "<br>";
    } else {
        echo "Rastgele Sayı: $randomValue<br>";
    }

    if ($separatorCounter === $seperatorgirdi-1 && $i + 1 < $answer) {


        echo "------------" . $sinifnumarasi++ . "------------<br>";
        $separatorCounter = 0;
    }
}
    }
     


} else {
    echo 'Hiçbir veri girilmedi.';
}








$page = $_SERVER['PHP_SELF'];
print "<a href=\"$page\">Sayfayı Sıfırla</a>";
echo ' <br><a href="/ogrenci_yukle.html">Öğrencileri Veri Tabanına Eklemek İçin</a>';
echo "<p>Copyright Mert Ata Baber</p>";

?>