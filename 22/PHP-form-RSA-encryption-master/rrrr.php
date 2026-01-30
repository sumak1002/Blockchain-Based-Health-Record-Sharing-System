<?php
 include 'Crypt/RSA.php';
 $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
 $allcontent=fread($myfile,filesize("webdictionary.txt"));
 fclose($myfile);
 $rsa = new Crypt_RSA();
 extract($rsa->createKey());
 $rsa->loadKey($privatekey);

 $rsa->loadKey($publickey);
 $kk=$rsa->decrypt($allcontent);
 echo $kk;
 $myfile = fopen("webdictionary1.txt", "w") or die("Unable to open file!");
 fwrite($myfile, $kk);
 fclose($myfile);
?>
