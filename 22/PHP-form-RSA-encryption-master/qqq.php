<?php
 include 'Crypt/RSA.php';
 /* $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
 $allcontent=fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);

*/

  $rsa = new Crypt_RSA();
     extract($rsa->createKey());
 
    $plaintext = 'hello how are you!!';
    $rsa->loadKey($privatekey);
     $ciphertext = $rsa->encrypt($plaintext);
  echo $ciphertext;
  
  echo "<br><br>";
     $rsa->loadKey($publickey);
     $kk=$rsa->decrypt($ciphertext);
	 echo $kk;
	 
	/* $myfile = fopen("webdictionary1.txt", "w") or die("Unable to open file!");

fwrite($myfile, $ciphertext);

fclose($myfile);
	 */
	
 ?>
