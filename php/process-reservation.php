<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$paket = $_POST['paket'];
$message = $_POST['message'];
$tanggal = $_POST['tanggal'];

$data = "$name,$phone,$email,$paket,$message,$tanggal\n"; 

$file = '../db/reservations.txt'; 
file_put_contents($file, $data, FILE_APPEND); 

$kamarFile = '../db/data-kamar.txt';
$kamarContents = file_get_contents($kamarFile);
$kamarLines = explode("\n", $kamarContents);
foreach ($kamarLines as &$line) {
  $parts = explode(":", $line);
  if ($parts[0] == $paket) {
    $parts[1] = max(0, $parts[1] - 1);
    $line = implode(":", $parts);
    break;
  }
}
$kamarContents = implode("\n", $kamarLines);
file_put_contents($kamarFile, $kamarContents);

echo 'Terima kasih, reservasi Anda telah kami terima.'; 
?>