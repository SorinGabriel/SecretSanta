<?php

function run()
{
	// conectare la baza de date
	$conn = new mysqli('localhost','user','parola','db');
	// verifica conexiunea
	if (mysqli_connect_errno()) {
	  exit('Connect failed: '. mysqli_connect_error());
	}
	//daca a ajuns aici inseamna ca s-a conectat ok la baza de date

	//adunam datele din baza
	$sql = "SELECT * FROM  `participanti` ";
	$result = $conn->query($sql);
	$vector=array(); //retine numele 
	$mail=array(); //retine mailurile
	$atribuit=array(); //are grija ca o persoana sa nu primeasca mai mult de un cadou
	$combinare=array();

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($vector,$row['nume']);
			array_push($mail,$row['mail']);
			array_push($atribuit,0);
			array_push($combinare,0);
		}
	}

	echo "Numarul de participanti:".count($vector)."\n";
	$n=count($vector);
	if ($n<3) 
		die("Nu sunt suficienti participanti");
	$myfile = fopen("testfile.txt", "w");
	$trys=0;

	for ($i=0;$i<$n;$i++)
	{
		$ok=true; //folosit pentru inchiderea whileului
		do 
		{
			$x=rand(0,$n-1);
			while ($x==$i) 
			{
				$trys++;
				if ($trys>50)
				{
					run();
					exit();
				}
				$x=rand(0,$n-1);
			}
			if($atribuit[$x]==0) 
			{
				$combinare[$i]=$x;
				$ok=false;
			}
		}  
		while ($ok);
		$atribuit[$x]=1;
	}

	for ($i=0;$i<$n;$i++)
	{
				fwrite($myfile,$vector[$i]." a primit pe ".$vector[$combinare[$i]]." \n");
				$content="Felicitări! \n \n
				Vei petrece două săptămâni gândindu-te la cadoul perfect pentru ".$vector[$combinare[$i]]."!";
				$from="From: MosCraciun@as-mi.ro";
				if (mail($mail[$i], "ASMI - Secret Santa", $content, $from)) {
					echo "Mail send<br>";
				}
				else echo "EROARE LA MAILUL".$mail[$i]."<br>";
	}

	fclose($myfile);

	echo 'Mailurile au fost trimise';

	$conn->close();
}

run();

?>