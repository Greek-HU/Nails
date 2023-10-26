<?php
// Kapcsolódás az adatbázishoz
$conn = mysqli_connect("localhost", "root", "", "my_database");

// Ellenőrizzük, hogy a feltöltés sikeres volt-e
if ($_FILES["kep"]["error"] != UPLOAD_ERR_OK) {
  die("A feltöltés nem sikerült!");
}

// Másoljuk át a feltöltött képet egy biztonságos helyre
$kep_url = "images/" . $_FILES["kep"]["name"];
move_uploaded_file($_FILES["kep"]["tmp_name"], $kep_url);

// Tároljuk a feltöltött kép adatait az adatbázisban
$sql = "INSERT INTO kep (kep_url) VALUES ('$kep_url')";
mysqli_query($conn, $sql);

// Jelezzük a felhasználónak, hogy a feltöltés sikeres volt
echo "A feltöltés sikeres volt!";

// Zárjuk be az adatbázis kapcsolatot
mysqli_close($conn);
?>
