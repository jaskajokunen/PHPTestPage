<?php



if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'salainen';
	$conn= mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db('1100328');
	$sql="DELETE FROM palaute WHERE id=$id";



	$result = mysql_query($sql);
	if(!$result )
	{
		die('Ei pystytty poistamaan dataa: ' . mysql_error());
	}

	mysql_close($conn);

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

				<h1>Poistaminen</h1>


				<?php 
				try
				{
					// 1. Ota yhteys kantaan
					if (! $db = new PDO('mysql:host=localhost;dbname=1100328', 'root', 'salainen'))
						throw new Exception("Levyjen listauksessa onkelma.", 1);

					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


					$sql = "SELECT id, levyn_nimi, artisti, julkaisuvuosi, kesto, levy_yhtio, kommentti FROM palaute" ;


					if (! $stmt = $db->prepare($sql))
						throw new Exception("Levyjen listauksessa onkelma.", 2);

					if (! $stmt->execute())
						throw new Exception ("Levyjen listauksessa onkelma.", 3);

					print('<form action="" method="post">');
	print("<table border='0' cellpadding='5' cellspacing='0'>\n");

	// 5. Käsittele hakulausekkeen tulos
	while ($row = $stmt->fetchObject())
	{
		print("<tr>\n");
		;
		print("<td>{$row->id}</td>\n");


		$nimi = utf8_encode($row->levyn_nimi);
		print("<td>$nimi</td>\n");
		echo("<br>");

		print ("<td><a class='nappi3' href='?id=$row->id'><button type='button' >Poista</button></a></td>");


	}

	print("</table>\n");

	print("</form>

<br/>");





				} catch (Exception $error) {
	print($error->getMessage());
}










?>




			</div>
		</div>
	</div>

	<div class="footteri" style="padding-bottom: 200px"></div>
	<div class="clr"></div>

</body>

</html>
