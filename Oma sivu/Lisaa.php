<?php

// Luokan liittäminen mukaan
require_once ("Levy.php");

session_start();

// Onko olemassa paniketta "talleta"
if (isset($_POST["talleta"])) {
	// Luodaan olio lomakkeella olevista tiedoista
	$levy = new Levy($_POST["nimi"], $_POST["artisti"], $_POST["vuosi"], $_POST["kesto"],$_POST["levy_yhtio"], $_POST["kommentti"]);

	// Tarkastetaan kentät
	$nimiVirhe = $levy->checkNimi(false, 2, 50);
	$artistiVirhe = $levy->checkArtisti();
	$vuosiVirhe = $levy->checkVuosi();
	$kestoVirhe = $levy->checkKesto();
	$levy_yhtioVirhe = $levy->checkLevy_yhtio();
	$kommenttiVirhe = $levy->checkKommentti();
	
	if ($nimiVirhe == 0 && $artistiVirhe == 0 && $vuosiVirhe == 0 && $kestoVirhe == 0 && $levy_yhtioVirhe == 0 && $kommenttiVirhe == 0) {
		//Laitetaan olio istuntoon
		$_SESSION["sessiolevy"] = $levy;
		// Varmistetaan olion talletus istuntoon
		// ts suljetaan istunto tämän sivun osalta
		session_write_close();
	
		// Siirretään selain tietojen näyttösivulle
		header("location: listaa.php");
		exit;
	}
}




// Onko olemassa paniketta name="peruuta"
elseif (isset($_POST["peruuta"])) {
	// Tyhjennetään istuntomuuttujat palvelimelta
	$_SESSION = array();

	if (isset($_COOKIE[session_name()]))
	// Poistetaan istunnon tunniste käyttäjän koneelta
		setcookie(session_name(), '', time()-100, '/');

	// Tuhotaan istunto
	session_destroy();

	// ohjataan etusivulle
	header("location: index.php");
}

else{

if (isset($_SESSION["sessiolevy"]))
	$levy = $_SESSION["sessiolevy"];

else {
	$levy = new Levy();
	
	
}


if (empty($_SESSION["sessiolevy"]))


	
	$levy = new Levy ();
	$nimiVirhe = 0;
	$artistiVirhe = 0;
	$vuosiVirhe = 0;
	$kestoVirhe = 0;
	$levy_yhtioVirhe = 0;
	$kommenttiVirhe = 0;
	

	
	
	
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
<style type="text/css">



</style>







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
			<p class="lisays">Uusi levy</p>
			<div class="levy_boxi">
				<form action="" method="post">

					<p>
						<label>Levyn nimi</label>
						<!-- $_POST["nimi"] -->
						<input type="text" name="nimi" size="30"
							value="<?php print(htmlentities($levy->getNimi(), ENT_QUOTES, "UTF-8"));?>" />
						<?php print("<span class='pun'>" . $levy->annaVirhe($nimiVirhe) . "</span>"); ?>
					</p>

					<p>
						<label>Artisti</label>
						<!-- $_POST["artisti"] -->
						<input type="text" name="artisti" size="30" maxlength="30"
							value="<?php print(htmlentities($levy->getArtisti(), ENT_QUOTES, "UTF-8"));?>" />
						<?php print("<span class='pun'>" . $levy->annaVirhe($artistiVirhe) . "</span>"); ?>
					</p>

					<p>

						<label>Julkaisuvuosi</label>
						<!-- $_POST["vuosi"] -->
						<input type="text" name="vuosi" size="4" maxlength="4"
							value="<?php print(htmlentities($levy->getVuosi(), ENT_QUOTES, "UTF-8"));?>" />
						<?php print("<span class='pun'>" . $levy->annaVirhe($vuosiVirhe) . "</span>"); ?>
					</p>

					<p>
						<label>Kesto</label>
						 <!-- $_POST["kesto"] -->
						<input type="text" name="kesto" size="4"
							maxlength="4"
							value="<?php print(htmlentities($levy->getKesto(), ENT_QUOTES, "UTF-8"));?>" />
						<?php print("<span class='pun'>" . $levy->annaVirhe($kestoVirhe) . "</span>"); ?>
					</p>

					<p>
						<label>Levy-yhtio</label>
						<!-- $_POST["levy_yhtio"] -->
						<input type="text" name="levy_yhtio"
							size="30" maxlength="30"
							value="<?php print(htmlentities($levy->getLevy_yhtio(), ENT_QUOTES, "UTF-8"));?>" />
						<?php print("<span class='pun'>" . $levy->annaVirhe($levy_yhtioVirhe) . "</span>"); ?>
					</p>


					<p>
						<label>Kommentti</label>
						<!-- $_POST["kommentti"] -->
						<textarea rows="5" cols="40" name="kommentti" class = "kommentti">
							<?php print(htmlentities($levy->getKommentti(), ENT_QUOTES, "UTF-8"));?>
						</textarea>
						<?php print("<span class='pun'>" . $levy->annaVirhe($kommenttiVirhe) . "</span>"); ?>
					</p>





					<p>
						<label>&nbsp;</label> <input type="submit" name="talleta"
							value="Tallenna" /> <input type="submit" name="peruuta"
							value="Peruuta" />
					</p>

				</form>







			</div>
		</div>
	</div>

	<div class="footteri" style="padding-bottom: 100px"></div>
	<div class="clr"></div>

</body>

</html>
