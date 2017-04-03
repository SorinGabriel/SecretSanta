<html>

<head>
<meta name="author" content="Marica Sorin">
<title>Formular inscriere Secret Santa</title>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>

<body style="font-family: 'Roboto';align:center;background-color:grey;background-image:url('asmi.jpg');background-attachment:scroll;background-size:cover;">

<div align="center">
<div id="center" style="background-size:cover;box-shadow: 5px 5px 3px black;background-image:url('bk.jpg');border:1px solid black;margin-top:20px;text-align:left;padding-left:30px;font-size:16px;text-decoration:bold;width:600px;background-color:white;min-height:500px;">
<img src="asmi.png" height="50px" style="padding-top:30px;">
<a href="index.html" style="color:black;text-decoration:none;"><h1>Formular inscriere Secret Santa</h1></a>
<font style="text-indent:15px;">
<br>
<?php

$nume=$_POST['nume'];
$mail=$_POST['mail'];


// conectare la baza de date
$conn = new mysqli('host','user','parola','database');
// verifica conexiunea
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

$verifica="SELECT mail FROM `participanti` WHERE `mail`='$mail'";
$resver = $conn->query($verifica);
if ($resver->num_rows > 0) {
	echo 'Cineva s-a inregistrat deja dupa acest mail';
}
else
{
	$sql = "INSERT INTO `participanti` (`nume`, `mail`)
			VALUES ('$nume','$mail')";
	if ($conn->query($sql) === TRUE) {
		echo 'Bun venit in echipa de elfi ASMI! Succes in cautarea cadoului perfect!';
	}
	else {
		echo 'Error: '. $conn->error;
	}
}

$conn->close();

?>
</font>
</div>
</div>
</body>

</html>