<?php

class Levy
{

  private static $virhelista = array (
     -1 => "Virheellinen tieto",
      0 => "",
     11 => "Nimi on pakollinen",
     12 => "Nimen pituus tulee olla 2-30 merkkiÃ¤",
  	 13 => "Nimi on liian lyhyt",
  	 14 => "Nimi on liian pitkÃ¤",	
     21 => "Artisti on pakollinen",
     22 => "Artistin nimessa saa olla vain kirjaimia ja -",
     23 => "Artistin pituus tulee olla 2-30 merkkiÃ¤",
     31 => "Vuosi on pakollinen",
     32 => "Vuosi muodossa vvvv (numeroilla)",
     33 => "Ennen vuotta 1900 ei ole levyja",
  	 34 => "Levyä ei ole vielä julkaistu",
     41 => "Kesto on pakollinen",
  	 42 => "Kesto muodossa t:mm (numeroilla)",
  	 43 => "Minuutit vÃ¤lillÃ¤ 0-60",
  	 44 => "Liian lyhyt kesto",
  	 51 => "Kommentti on pakollinen",
  	 52 => "Kommentti on liian lyhyt",
  	 53 => "Kommentti on liian pitkÃ¤",
  	 61 => "Levy-yhtio on pakollinen",
  	 62 => "Levy-yhtion nimessa saa olla vain kirjaimia",
  	 63 => "Levy-yhtion maksimi pituus on 10-30 merkkia",		
  );

  private $nimi;
  private $artisti;
  private $vuosi;
  private $kesto;
  private $kommentti;
  private $levy_yhtio;

  //Alustus eli muodostin


  function __construct($uusiNimi = "", $uusiArtisti = "",$uusiVuosi = "", $uusiKesto = "", $uusiLevy_yhtio = "", $uusiKommentti = "") {
     $this->nimi = trim($uusiNimi);
     $this->setArtisti($uusiArtisti);
     $this->vuosi = trim($uusiVuosi);
     $this->kesto = trim($uusiKesto);
     $this->levy_yhtio = trim($uusiLevy_yhtio);
     $this->kommentti = trim($uusiKommentti);
  }
  
 
  public function setNimi($uusiNimi) {
     $this->nimi = trim($uusiNimi);	
  }
  

  public function getNimi() {
     return $this->nimi;
  }
  

  public function checkNimi ($empty = false, $min = 2, $max = 30) {
      // Jos saa olla tyhjä ja on tyhjä
     if ($empty == true && strlen($this->nimi) == 0)
          return 0;  
          
     // Jos ei saa olla tyhjä, ja on tyhjä
     if ($empty == false && strlen($this->nimi) == 0)
          return 11;

     // Jos nimi on liian lyhyt
     if (strlen($this->nimi) < $min)
          return 13; 

     // Jos nimi on liian pitkä
     if (strlen($this->nimi) > $max)
     	return 14;
        
     // Nimi voi olla millainen tahansa muodoltaan joten enempää tarkistuksia ei tarvita
    
  			
     return 0;
  }
  
  public function setArtisti($uusiArtisti) {
  	//etukirjaimet isoilla kirjaimilla
  	$Onimi = trim($uusiArtisti);
  	$Onimi = mb_convert_case($Onimi, MB_CASE_LOWER, "UTF-8");
  	$Onimi = mb_convert_case($Onimi ,MB_CASE_TITLE, "UTF-8");
  	$this->artisti = $Onimi;
  }
  

  public function getArtisti() {
  	return $this->artisti;
  }
  
  // $artistiVirhe = $leffa->checkartisti();
  public function checkArtisti ($empty = false, $min = 2, $max = 30) {
  	// Jos saa olla tyhjä ja on tyhjä
  	if ($empty == true && strlen($this->artisti) == 0)
  		return 0;
  
  	// Jos ei saa olla tyhjä ja on tyhjä
  	if ($empty == false && strlen($this->artisti) == 0)
  		return 21;
  
  	// Jos artistin nimi on liian lyhyt tai pitkä
  	if (strlen($this->artisti) < $min || strlen($this->artisti) > $max)
  		return 23;
  
  	// Artistin nimessä saa olla vain pieniä ja isoja kirjaimia, välilyöntejä, ja numeroita
  if(!preg_match("/[0-9a-z]/",$this->artisti))
  	return  22;
  

  	  
  	return 0;
  }


  public function setVuosi($uusiVuosi) {
     $this->vuosi = $uusiVuosi;	
  }

  
  
  public function getVuosi() {
     return $this->vuosi;
  }
 

  public function checkVuosi($empty = false, $min = 1900) {

  	// Jos saa olla tyhjä ja on tyhjä
  	if ($empty == true && strlen($this->vuosi) == 0)
  		return 0;
  	
  	// Jos ei saa olla tyhjäja on tyhjä
  	if ($empty == false && strlen($this->vuosi) == 0)
  		return 31;
  	
    // Jos vuodessa ei neljää numeroa?
  if (!preg_match('/(\d{4})/', $this->vuosi))
  	return 32;
  	
  	// Tutkitaan, onko käyttäjän antama vuosi suurempi kuin nykyinen
  	$aika = time();
  	$vuosi = date("Y", $aika);
  	if ($this->vuosi > $vuosi)
  		return 34;
  	
  	// Onko vuosi liian pieni
  	if ($this->vuosi < $min)
  		return 33;
  	
    return 0;
  }
  
  public function setKesto($uusiKesto) {
  	$this->kesto = $uusiKesto;
  }
  
  
  
  public function getKesto() {
  	return $this->kesto;
  }
  
  
  public function checkKesto($empty = false, $min = 4, $max = 4) {

// Jos saa olla tyhjä, ja on tyhjä
if ($empty == true && strlen($this->kesto) == 0)
return 0;	  	

if ($empty == false && strlen($this->kesto) == 0)
	return 41;
// Alkaa 0 (voi toistua 0-1 kertaa), jota seuraa mikä tahansa numero.
//Kaksoispisteiden jälkeen, tulee kaksi numeroa
if (!preg_match("/(0?\d):(\d{2})/i ", $this->kesto))
	return 42;

// Jos minuutit ovat yli 60
if (preg_match("/(0?\d):([6-9]\d)/i ", $this->kesto))
	return 43;

// Jos liian lyhyt kesto (alle 10 min)
if (preg_match("/(0?):(0[1-9])/i ", $this->kesto))
	return 44;



return 0;
  }
  
public function setLevy_yhtio($uusiLevy_yhtio){
$this->levy_yhtio = trim($uusiLevy_yhtio);		
}  

public function getLevy_yhtio(){
return $this->levy_yhtio;	
	
}

public function checkLevy_yhtio ($empty = false, $min = 10, $max = 30) { 
  
// Jos saa olla tyhjä, ja on tyhjä
if ($empty == true && strlen($this->levy_yhtio) == 0)
return 0;   
// Jos ei saa olla tyhjä, ja on tyhjä
if ($empty == false && strlen($this->levy_yhtio) == 0)
return	61;

// Saa olla ainoastaan kirjaimia, ja välilyöntejä
  if(!preg_match("#^[-A-Za-z' ]*$#",$this->levy_yhtio))
return 62;

 // Jos pituus ei täsmää 
if (strlen($this->levy_yhtio) < $min || strlen($this->levy_yhtio) > $max)
return 63;	

	
	
return 0;
}	
	
	
  public function setKommentti($uusiKommentti) {
  	$this->kommentti = trim($uusiKommentti);
  }
  
  
  public function getKommentti() {
  	return $this->kommentti;
  }
  
  
  public function checkKommentti ($empty = false, $min = 10, $max = 300) {
  	// Jos saa olla tyhjä, ja on tyhjä
  	if ($empty == true && strlen($this->kommentti) == 0)
  		return 0;
  
  	// Jos ei saa olla tyhjä, ja on tyhjä
  	if ($empty == false && strlen($this->kommentti) == 0)
  		return 51;
  	
  // Liian lyhyt kommentti	
  if (strlen($this->kommentti) < $min )
	return 52;
  // Liian pitkä kommentti
  if (strlen ($this->kommentti) > $max)
  	return 53;
 
  	return 0;
  }


  // $virheteksti = $leffa->annaVirhe(11);
  public static function annaVirhe($virhekoodi) {
     if (isset(self::$virhelista[$virhekoodi]))
          return self::$virhelista[$virhekoodi];

     return self::$virhelista[-1];
  }
}
?>