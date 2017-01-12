<?php

if (isset($_COOKIE["kayttaja"]))
	$value = $_COOKIE["kayttaja"];
else
	$value = "";

if (isset($_POST["muuta_nimea"])){
	
$keksi_ika = time() + 60*60*24*7;

$value = $_POST['nimi'];
	
setcookie("kayttaja", $value,$keksi_ika);

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
				<img src="kuvat/logo.jpg" alt="levykauppa" height="77" width="100" />

			</div>
			<div class="navi">
				<img src="kuvat/navi.jpg" alt="headeri_tausta" height="77" width="1000" />
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
					<li class = "viiva"><a href="asetukset.php" class="linkkiteksti">Asetukset</a>
						</li>
					



				</ul>

				<div class="pohja">
					<p class = "levy_teksti">Kuukauden levy</p>
					<img src="kuvat/kreator.jpg" class="levy" alt="Smiley face" height="77"
						width="100" />
					<p class = "levy_teksti">Artisti: Kreator</p>
					<p class = "levy_teksti">Levy: Phantom Antichrist</p>
					<p class = "levy_teksti">Hinta: 19,95$</p>
				</div>








			</div>
			<div class="levy_boxi">
				<form action="" method="post" > 

					<p>
						<label class= "nimenmuutos">Nimesi:</label>
						
						<input type="text" name='nimi' size="10" value='<?php echo $value;?>'  />
						
						<input class="nappi" type="submit" name="muuta_nimea"
							value="Muuta nimea"/>
							
							
					</p>
					
					







				</form>







			</div>
		</div>
	</div>

	<div class="footteri" style="padding-bottom: 100px"></div>
	<div class="clr"></div>

</body>

</html>
