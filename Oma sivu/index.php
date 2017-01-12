


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="keywords" content="levy" />
<meta name="author" content="Joonas Korhonen" />
<link type="text/css" rel="stylesheet" href="perus_tyyli.css"/>
<title>Levykauppa



</title>








</head>
<body>
	<div class="container">
		<div class="headeri">
		<div class = "logo">
		<img src="kuvat/logo.jpg" alt="Smiley face" height="77" width="100"/> 
		
		</div>
		<div class = "navi">
		<img src="kuvat/navi.jpg" alt="Smiley face" height="77" width="1000"/> 
		</div>
		</div>

		
<div class="content">


		<div class="main_box">
			<ul class="toiminnot">
						<li class = "viiva"><a href="index.php" class="linkkiteksti" >Etusivu</a>
						</li>
						
						<li class = "viiva"><a href="Lisaa.php" class="linkkiteksti">Lisaa levy</a>
						</li>
						
						<li class = "viiva"><a href="listaa.php" class="linkkiteksti">Listaa levyt</a>
						</li>
						
						<li class = "viiva"><a href="hae.php" class="linkkiteksti">Hae levy</a>
						</li>
						
						<li class = "viiva"><a href="poista.php" class="linkkiteksti">Poista levy</a>
						</li>
						<li class = "viiva"><a href="asetukset.php" class="linkkiteksti">Asetukset</a>
						</li>



					</ul>
					
					<div class = "pohja">
					<p class = "levy_teksti">
					Kuukauden levy
					</p>
					<img src="kuvat/kreator.jpg" class="levy" alt="Smiley face" height="77" width="100"/> 
					<p class = "levy_teksti">
					Artisti: Kreator
					</p>
					<p class = "levy_teksti">
					Levy: Phantom Antichrist
					</p>
					<p class = "levy_teksti">
					Hinta: 19,95$
					</p>
					</div>

			

				
			

			

		</div>
		<div class = "main_box2">
		<p class ="viesti">Tervetuloa levykauppaan <?php if (isset($_COOKIE["kayttaja"])) echo $_COOKIE["kayttaja"];?></p>
		
		
		
		</div>
</div>		
	</div>

	<div class="footteri" style="padding-bottom: 200px"></div>
	<div class="clr"></div>

</body>

</html>
