<?php

$paket = $_POST['paket']; 
$data = file_get_contents('../db/data-kamar.txt');
$rows = explode("\n", $data);

foreach($rows as $row){
  
  $pecah = explode(":", $row);
  $nama_paket = $pecah[0];
  $sisa_kamar = $pecah[1];  

  if($nama_paket == $paket){
    
    if($sisa_kamar > 0){
        $message = "Paket $paket masih tersedia.";
      } else {
        $message = "Maaf, paket $paket sudah penuh.";
      }
      
    
    break;
    
  }
}

echo $message;

?>