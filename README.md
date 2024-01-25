# Rastgele Ogrenci İsmi ile Sinif Olusturucu
 Sistem veri tabanından istenilen kademelerden istenilen öğrenci saysısı kadar seçip istenilen sınıf boyutlarına böler.
 UYARI!!!!!!!!!!!!!!!!
 BU SİSTEMİN KODLARI OPTİMİZDE VE GÜVENLİ DEĞİLDİR. SADECE LOCALHOST'TA ÇALIŞTIRILMAYA UYGUNDUR. ÇALIŞMASININ VEYA SORUN ÇIKARTMAMASININ HERHANGİ BİR GARANTİSİ YOKTUR. MERT ATA BABER'E AİT OLDUĞU BELİRTİLMEK KOŞULUYLA YENİDEN PAYLAŞILABİLİR ANCAK HİÇBİR ŞARTTA SATILAMAZ VEYA CREDIT VERMEDEN PAYLAŞILAMAZ.


 Kurulum;
 Sinif_yarat klasörünün içindeki dosyaları erişmek istediğiniz ana dizinin içine yükleyin. Veri tabanı(.sql) dosyasını veri tabanınıza import edin.
 
 Toplam kişi sayısı kısmına seçilecek toplam kişi sayısını giriniz.
 
 Sınıf Başına Öğrenci Sayısı kısmına her sınıfa kaç kişi düşmesini istiyorsanız onu seçiniz.
 
 Sınıf Başlangıç Numarası kısmına sınıfların numaralandırılmaya başlayacağı sayıyı giriniz. Örn: 101 yazarsanız 102,103,104... şeklinde numaralı sınıflara bölümlendirilir öğrenciler.
 
 Öğrenci Yükle Kısmından öğrencileri .csv formatında veri tabanına dosya yükleyebilirsiniz. Bu dosya için gerekli örnek ornek.csv olarak mevcuttur.
 
 hem sınıf.php hem d upload.php içinden aşağıdaki bilgileri düzenleyiniz.
 $hostname = "localhost";
 $username = "root";
 $password = "";
$database = "sinif_yarat";

upload.php içinden     $uploadPath = 'C:\xampp1\htdocs\yukle/'; satırını kendinize göre düzenleyiniz. .csv dosyalarını yükleneceği klasördür.

9,10,11,12 sayıları seçilecek kademeleri ifade etmektedir.


 
 
