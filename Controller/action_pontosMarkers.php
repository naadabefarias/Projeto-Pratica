<?php
require("conexao.php");

function parseToXML($htmlStr){
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  return $xmlStr;
}

// Select all the rows in the markers table
$consulta = $conn -> query("SELECT * FROM pontos_turisticos"); 
$linha = $consulta -> fetch(PDO::FETCH_ASSOC); 

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
foreach ($linha as $pontos) {
   # code...
  echo '<marker ';
  echo 'name="' . parseToXML($pontos['nome_ponto']) . '" ';
  echo 'lat="' . $pontos['lat'] . '" ';
  echo 'lng="' . $pontos['lng'] . '" ';
  echo 'logradouro="' . parseToXML($pontos['logradouro']) . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

