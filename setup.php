<?php

$con = new mysqli('host','user','parola','database');
if (mysqli_connect_errno()) {
  exit('Conectare nereusita: '. mysqli_connect_error());
}

$cr="CREATE TABLE `participanti`(
`nume` VARCHAR(40) NOT NULL,
`mail` VARCHAR(40) NOT NULL
) ";

if ($con->query($cr) === TRUE) {
  echo 'Scriptul a fost instalat cu succes';
}
else {
 echo 'Eroare: '. $con2->error;
 echo '<br>';
}

$con->close();

?>