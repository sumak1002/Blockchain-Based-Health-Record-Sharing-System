<?php

include 'Crypt/RSA.php';
 $myfile = fopen("sss.txt", "r") or die("Unable to open file!");
 $allcontent=fread($myfile,filesize("sss.txt"));
 fclose($myfile);
 $rsa = new Crypt_RSA();
 extract($rsa->createKey());
 $plaintext = $allcontent;
 $rsa->loadKey($privatekey);
 $ciphertext = $rsa->encrypt($plaintext);
 $ciphertext;
 $myfile = fopen("sss.txt", "w") or die("Unable to open file!");
 fwrite($myfile, $ciphertext);
 fclose($myfile);
 
 ?>
