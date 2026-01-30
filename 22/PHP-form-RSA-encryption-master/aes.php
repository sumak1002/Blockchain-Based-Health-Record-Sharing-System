<?php
     include 'Crypt/RSA.php';
 
     $rsa = new Crypt_RSA();
     extract($rsa->createKey());
 
     $plaintext = 'terrafrost';
 
     $rsa->loadKey($privatekey);
	 
	 echo "<br><br>".$privatekey;
     $ciphertext = $rsa->encrypt($plaintext);
 
     $rsa->loadKey($publickey);
      $rsa->decrypt($ciphertext);
  ?>