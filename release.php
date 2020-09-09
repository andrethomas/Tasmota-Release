<?php

  include 'class.php';
  $release = new ReleaseClass();

  $release->setversion("tasmota", trim(file_get_contents('version')), "20200909");

  $release->addfile("","English"); // tasmota.bin
  $release->addfile("minimal","English");
  $release->addfile("lite","English");
  $release->addfile("knx","English");
  $release->addfile("sensors","English");
  $release->addfile("display","English");
  $release->addfile("ir","English");
  $release->addfile("ircustom","English");
  $release->addfile("zbbridge","English");
  $release->addfile("BG","Bulgarian (Bulgaria)");
  $release->addfile("BR","Portuguese (Brazil)");
  $release->addfile("CN","Simplified Chinese (China)");
  $release->addfile("CZ","Czech with diacritics (Czech)");
  $release->addfile("DE","German (Germany)");
  $release->addfile("ES","Spanish (Spain)");
  $release->addfile("FR","French (France)");
  $release->addfile("GR","Greek (Greek)");
  $release->addfile("HE","Hebrew (Israel)");
  $release->addfile("HU","Hungarian (Hungary)");
  $release->addfile("IT","Italian (Italy)");
  $release->addfile("KO","Korean (Korea)");
  $release->addfile("NL","Dutch (Nederland)");
  $release->addfile("PL","Polish with diacritics (Poland)");
  $release->addfile("PT","Portuguese (Portugal)");
  $release->addfile("RO","Romanian (Romania)");
  $release->addfile("RU","Russian (Russia)");
  $release->addfile("SE","Swedish (Svenska)");
  $release->addfile("SK","Slovak with diacritics (Slovak)");
  $release->addfile("TR","Turkish (Turkey)");
  $release->addfile("TW","Chinese Traditional (Taiwan)");
  $release->addfile("UK","Ukrainian (Ukraine)");

// Below should not require any modification

  header('Content-Type: application/json');
  echo "{\r\n"; // Begin JSON
  echo "\"release-" . $release->version . "\": [\r\n";
  for ($v = 0; $v < $release->releasecount; $v++) {
    $fs = 0;
    $fs = filesize("./" . $release->releaselist[$v][2]);
    echo "{\r\n";
    echo "\"variant\": \"" . $release->releaselist[$v][0] . "\",\r\n";
    echo "\"language\": \"" . $release->releaselist[$v][1] . "\",\r\n";
    echo "\"binary\": \"" . $release->releaselist[$v][2] . "\",\r\n";
    echo "\"otaurl\": \"http://thehackbox.org/tasmota/release/" . $release->releaselist[$v][2] . "\",\r\n";
    echo "\"built\": \"" . $release->releasedate . "\",\r\n";
    echo "\"filesize\":" . $fs;
    echo "\r\n}";
    if ($v < ($release->releasecount-1)) {
      echo ",\r\n";
    } else {
      echo "\r\n";
    }
  }

  echo "]\r\n"; // end release-xxx
  echo "}\r\n"; // end JSON

?>
