<?php 
require_once 'Levy.php';
// K‰ynnist‰ istunto
session_start();



if (isset($_SESSION["sessiolevy"])){
	$levy = $_SESSION ["sessiolevy"];
	
}
else{

	$levy= new Levy ();
}

// Onko olemassa painiketta name="talleta"
if (isset($_POST["talleta"])) {
	

mysql_connect ("localhost", "root", "salainen") or die(mysql_error());
mysql_select_db("1100328") or die(mysql_error());


$nimi = $levy->getNimi();
$artisti = $levy->getArtisti();
$vuosi = $levy->getVuosi();
$kesto = $levy->getKesto();
$levy_yhtio = $levy->getLevy_yhtio();
$kommentti = $levy->getKommentti();
mysql_query("Insert into palaute (levyn_nimi, artisti, julkaisuvuosi, kesto, levy_yhtio, kommentti)
		values ('$nimi', '$artisti', $vuosi, '$kesto', '$levy_yhtio', '$kommentti')
		") or die(mysql_error());

	

			
		// Siirret‰‰n selain tietojen n‰yttˆsivulle
		header("location: tallennus.php");
		exit;
		}
		 
	




// Onko olemassa paniketta name="peruuta"
if (isset($_POST["peruuta"])) {
	
	
	// Tyhjennet‰‰n istuntomuuttujat palvelimelta
	$_SESSION = array();

	if (isset($_COOKIE[session_name()]))
		// Poistetaan istunnon tunniste k‰ytt‰j‰n koneelta
		setcookie(session_name(), '', time()-100, '/');

	// Tuhotaan istunto
	session_destroy();

	// ohjataan etusivulle
	header("location: index.php");
}



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="levy" />
<meta name="author" content="Joonas Korhonen" />
<link type="text/css" rel="stylesheet" href="perus_tyyli.css" />
<title>Levykauppa</title>








</head>
<body>
	<div class="container">
		<div class="headeri">
			<div class="logo">
				<img src="kuvat/logo.jpg" alt="Smiley face" height="77" width="100" />

			</div>
			<div class="navi">
				<img src="kuvat/navi.jpg" alt="Smiley face" height="77" width="1000" />
			</div>
		</div>


		<div class="content">


			<div class="main_box">
				<ul class="toiminnot">
					<li class="viiva"><a href="index.php" class="linkkiteksti">Etusivu</a>
					</li>

					<li class="viiva"><a href="lisaa.php" class="linkkiteksti">Lisaa
							levy</a>
					</li>

					<li class="viiva"><a href="listaa.php" class="linkkiteksti">Listaa
							levyt</a>
					</li>

					<li class="viiva"><a href="hae.php" class="linkkiteksti">Hae levy</a>
					</li>

					<li class="viiva"><a href="poista.php" class="linkkiteksti">Poista
							levy</a>
					</li>
					<li class="viiva"><a href="asetukset.php" class="linkkiteksti">Asetukset</a>
					</li>



				</ul>

				<div class="pohja">
					<p class="levy_teksti">Kuukauden levy</p>
					<img src="kuvat/kreator.jpg" class="levy" alt="Smiley face"
						height="77" width="100" />
					<p class="levy_teksti">Artisti: Kreator</p>
					<p class="levy_teksti">Levy: Phantom Antichrist</p>
					<p class="levy_teksti">Hinta: 19,95$</p>
				</div>








			</div>
			<div class="main_box2">
				

				<h2>Annoit seuraavat tiedot</h2>
<?php
try
{

   if (! $db = new PDO('mysql:host=localhost;dbname=1100328', 'root', 'salainen'))
      die (mysql_error());

   


   $kysely = "SELECT id, levyn_nimi, artisti, julkaisuvuosi, kesto, levy_yhtio, kommentti FROM palaute" ;


   if (! $stmt = $db->prepare($kysely))
      throw new Exception("Levyjen listauksessa onkelma.", 2);

   if (! $stmt->execute())
       throw new Exception ("Levyjen listauksessa onkelma.", 3);
//Luodaan taulukko rakenne
   print("<table border='1' cellpadding='1' cellspacing='1'>\n");
   print("<tr><th>id</th><th>Levyn nimi</th><th>Artisti</th><th>Julkaisuvuosi</th><th>Kesto</th><th>Levy-yhtio</th><th>Kommentti</th></tr>\n");

//Asetetaan tiedot tauluun objektista
   while ($row = $stmt->fetchObject())
   {
       print("<tr>");

	   print("<td>$row->id</td>");

       $nimi = utf8_encode($row->levyn_nimi);
       print("<td>$nimi</td>");

       $artisti = utf8_encode($row->artisti);
	   print("<td>$artisti</td>");

	   print("<td>$row->julkaisuvuosi</td>");
	   
	   print("<td>$row->kesto</td>");

	   $levy_yhtio = utf8_encode($row->levy_yhtio);
	   print("<td>$row->levy_yhtio</td>");

	   $kommentti = utf8_encode($row->kommentti);
	   print("<td>$kommentti</td>");
	   
	   print("</tr>");

       
   }
   print("</table>");

   //Lasketaan rivien m‰‰r‰
   print("<p>Yhteens√§ " . $stmt->rowCount() . " levya</p>");


} catch (Exception $error) {
	 print($error->getMessage());
}

?>


					<p>
					<form action="Lisaa.php" method="post" >
					<input class="nappi1" type="submit" name="korjaa" value="Korjaa" />
					</p>
					</form>
					
					

					<form action="" method="post" >
					
					<p> 	
				
				<input
					class="napit" type="submit" name="talleta" value="Tallenna" /> <input class ="napit"
					type="submit" name="peruuta" value="Peruuta" />

</p>

					</form>
					
				

			</div>

		</div>
	</div>

	<div class="footteri" style="padding-bottom: 200px"></div>
	<div class="clr"></div>

</body>

</html>
