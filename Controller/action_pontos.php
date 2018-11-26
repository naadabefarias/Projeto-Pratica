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
$result_pontos = "SELECT * FROM pontos_turisticos";
$resultado_pontos = mysqli_query($conn, $result_pontos);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_pontos = mysqli_fetch_assoc($resultado_pontos)){
  // Add to XML document node
  echo '<marker ';
  echo 'name="' . parseToXML($row_pontos['nome_ponto']) . '" ';
  echo 'address="' . parseToXML($row_pontos['address']) . '" ';
  echo 'lat="' . $row_pontos['lat'] . '" ';
  echo 'lng="' . $row_pontos['lng'] . '" ';
  echo 'type="' . $row_pontos['type'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

