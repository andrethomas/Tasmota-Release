<pre>
 <b></b>Alternative firmware for ESP8266 based devices like iTead Sonoff with web UI,<br> rules and timers, OTA updates, custom device templates and sensor support.<br><br> Allows control over MQTT, HTTP, Serial and KNX for integrations with smart home systems. </b>

 Copyright (C) 2020  Theo Arends
</pre>

<?php

$gz_color = " bgcolor=#fcf7cf bordercolor=#fcf7cf";

function round_up($number, $precision = 2)
{
    $fig = (int) str_pad('1', $precision, '0');
    return (ceil($number * $fig) / $fig);
}

$dir = "./";

$firmware_version = file_get_contents("version");

if (is_dir($dir)){
  echo "<pre>";
  echo " Release binaries for Tasmota firmware from <a href=\"https://github.com/arendst/Tasmota/releases/\">https://github.com/arendst/Tasmota/releases/</a>\n\n";
  echo " If you benefit from the Tasmota project please consider making a donation\n\n <a href=https://paypal.me/tasmota><img src=donate.svg></a>\n\n";
  echo " <font color=red><b>These binaries are built using core 2.7.4.1</b></font>\n\n";
  echo "</pre>";
  echo "<table cellpadding=5>";
//  echo "<tr><td>Firmware Link</td><td>OTA URL</td><td>Size</td><td>Firmware Version</td><td>Linker MAP</td></tr>";
  echo "<tr><td" . $gz_color . ">GZipped Firmware Link</td><td" . $gz_color . ">GZipped OTA URL</td><td" . $gz_color . ">GZipped Size</td><td>Firmware Link</td><td>OTA URL</td><td>Size</td><td>Firmware Version</td><td>Timestamp</td></tr>";
  $files = scandir($dir);
  rsort($files);
  foreach ($files as $file) {
      $listfile = true;
      $fs = filesize($file);
      $fsgz = filesize($file . ".gz");
      if ($file === ".") $listfile=false;
      if ($file === "..") $listfile=false;
      if ($file === ".git") $listfile=false;
      if ($file === "index.php") $listfile=false;
      if ($file === "error_log") $listfile=false;
      if ($file === "version") $listfile=false;
      if ($file === "donate.svg") $listfile=false;
      if ($file === "README.md") $listfile=false;
      if ($file === "release.php") $listfile=false;
      if ($file === "class.php") $listfile=false;

      if (strpos($file,'4m') !== false) {
          $listfile=false;
      }
      if (strpos($file,'map') !== false) {
          $listfile=false;
      }
      if (strpos($file,'bin.gz') !== false) {
          $listfile=false;
      }
      if ($listfile === true) {
          echo "<tr>";
          $mapfile = substr($file,0,strlen($file)-3) . "map.gz";
          echo "<td" . $gz_color . "><a href=" . $file . ".gz>" . $file . ".gz</a></td><td" . $gz_color . ">http://thehackbox.org/tasmota/release/" . $file . ".gz</td><td" . $gz_color . ">" . round_up($fsgz/1024,0) . "k</td><td><a href=" . $file . ">" . $file . "</a></td><td>http://thehackbox.org/tasmota/release/" . $file . "</td><td>" . round_up($fs/1024,0) . "k</td><td>" . $firmware_version . "</td></td><td> " . date("Ymd H:i",filemtime($file)+7200) . "</td>";
          echo "</tr>";
      }
  }
  echo "</table>";
}
?>
<pre>

 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <a href="http://www.gnu.org/licenses/">http://www.gnu.org/licenses/</a>
</pre>

