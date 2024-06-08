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
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$dogum_tarihi = $_POST['dogum_tarihi'];
$yabanci_dil = $_POST['yabanci_dil'];
$askerlik_durumu = $_POST['askerlik_durumu'];

// Veritabanında arama sorgusu oluşturma
$sql = "SELECT * FROM kisiler WHERE ";

// Arama kriterlerine göre sorguya ekleme yapma
$conditions = array();

if (!empty($ad)) {
    $conditions[] = "ad = '$ad'";
}

if (!empty($soyad)) {
    $conditions[] = "soyad = '$soyad'";
}

if (!empty($email)) {
    $conditions[] = "email = '$email'";
}

if (!empty($telefon)) {
    $conditions[] = "telefon = '$telefon'";
}

if (!empty($dogum_tarihi)) {
    $conditions[] = "dogum_tarihi = '$dogum_tarihi'";
}

if (!empty($yabanci_dil)) {
    $conditions[] = "yabanci_dil = '$yabanci_dil'";
}

if (!empty($askerlik_durumu)) {
    $conditions[] = "askerlik_durumu = '$askerlik_durumu'";
}

// Sorguya koşulları ekleyerek tamamlama
if (!empty($conditions)) {
    $sql .= implode(" AND ", $conditions);
} else {
    $sql .= "1"; // Tüm kayıtları getirme
}

// Veritabanında sorguyu çalıştırma
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Arama sonuçlarını gösterme
    while ($row = $result->fetch_assoc()) {
        echo "Ad: " . $row['ad'] . "<br>";
        echo "Soyad: " . $row['soyad'] . "<br>";
        echo "E-posta: " . $row['email'] . "<br>";
        echo "Telefon Numarası: " . $row['telefon'] . "<br>";
        echo "Doğum Tarihi: " . $row['dogum_tarihi'] . "<br>";
        echo "Yabancı Dil Seviyesi: " . $row['yabanci_dil'] . "<br>";
        echo "Askerlik Durumu: " . $row['askerlik_durumu'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Arama sonucunda kayıt bulunamadı.";
}

// Veritabanı bağlantısını kapatma
$conn->close();
?>
