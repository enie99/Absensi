<?php
    ini_set( 'display_errors', 1 );  
    error_reporting( E_ALL );    
    $from = "enie.yuliani.ey@gmail.com";    
    $to = "enieyuliani.99@gmail.com";    
    $subject = "Tes Email Konfirmasi";    
    $message = "PHP mail berjalan dengan baik";  
    $headers = "From:" . $from;    
    mail($to,$subject,$message, $headers);    
    echo "Pesan email sudah terkirim.";
?>