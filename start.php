<?php
// Połącz się z bazą danych
include ("db_action/db_connect.php");

// Połącz się z bazą danych
$db = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
// Sprawdź, czy baza danych jest pusta
try {
	$sql = "SELECT COUNT(*) FROM usrs";
	$result = $db->query($sql)->fetchColumn();
} catch (PDOException $e) {
    $file = fopen("audit.sql", "r");

    // Przeczytaj cały plik jako jeden ciąg znaków
    $sql = fread($file, filesize("audit.sql"));

    // Zamknij plik
    fclose($file);
    // Wykonaj polecenie SQL z pliku
    $db->exec($sql);
}
?>
