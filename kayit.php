<?php
// Veritabanı bağlantısı
$servername = "localhost"; // MySQL sunucusu
$username = "root"; // MySQL kullanıcı adı
$password = ""; // MySQL şifresi
$dbname = "kayit"; // Kullanmak istediğiniz veritabanının adı

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Formdan gelen verileri alma
$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$adres = $_POST['adres'];
$telefon = $_POST['telefon'];
$email = $_POST['email'];
$ev_telefonu = $_POST['ev_telefonu'];
$cinsiyet = $_POST['cinsiyet'];
$dogum_yeri = $_POST['dogum_yeri'];
$dogum_tarihi = $_POST['dogum_tarihi'];
$medeni_durum = $_POST['medeni_durum'];
$ehliyet_durumu = $_POST['ehliyet_durumu'];
$askerlik_durumu = $_POST['askerlik_durumu'];
$uyruk = $_POST['uyruk'];
$yabanci_dil = $_POST['yabanci_dil'];
$referans_ad = $_POST['referans_ad'];
$referans_isyeri = $_POST['referans_isyeri'];
$referans_telefon = $_POST['referans_telefon'];
$referans_pozisyon = $_POST['referans_pozisyon'];
// Veritabanına kayıt ekleme
$sql = "INSERT INTO kisiler (ad, soyad, adres, telefon, email, ev_telefonu, cinsiyet, dogum_yeri, dogum_tarihi, medeni_durum, ehliyet_durumu, askerlik_durumu, uyruk, yabanci_dil , referans_ad , referans_isyeri , referans_telefon,referans_pozisyon)
        VALUES ('$ad', '$soyad', '$adres', '$telefon', '$email', '$ev_telefonu', '$cinsiyet', '$dogum_yeri', '$dogum_tarihi', '$medeni_durum', '$ehliyet_durumu', '$askerlik_durumu', '$uyruk' , '$yabanci_dil' , '$referans_ad' , '$referans_isyeri' , '$referans_telefon' , '$referans_pozisyon')";

if ($conn->query($sql) === TRUE) {
    echo "Kayıt başarıyla eklendi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Veritabanı bağlantısını kapatma
$conn->close();
?>
