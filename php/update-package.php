<?php
$filename = '../db/data-kamar.txt';
$file = fopen($filename, 'r+');
if ($file) {
  $data = fread($file, filesize($filename));
  $lines = explode("\n", $data);
  $newData = '';
  foreach ($lines as $line) {
    $parts = explode(':', $line);
    $packageType = trim($parts[0]);
    $packageCount = trim($parts[1]);
    if ($packageType == $_POST['packageType']) {
      $packageCount += $_POST['packageCount'];
    }
    if ($line != end($lines)) {
      $newData .= $packageType . ':' . $packageCount . "\n";
    } else {
      $newData .= $packageType . ':' . $packageCount;
    }
  }
  fseek($file, 0);
  fwrite($file, $newData);
  fclose($file);
  echo json_encode(['success' => true]);
}

?>