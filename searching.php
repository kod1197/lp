<?php
session_start();

// contains utility functions mb_stripos_all() and apply_highlight()
 
$term = trim($_GET['term']);
 
$a_json = array();
$a_json_row = array();

$connect = mysqli_connect('localhost', '046653965_kod', '311297gamer', '9092902629');
 

 
$parts = explode(' ', $term);
$p = count($parts);
 


$qr = "SELECT * FROM img where name like '%".$term."%' order by name limit 7";

//$qr = "SELECT name FROM img ";
//for($i = 0; $i < $p; $i++) {
//  $qr .= 'AND name LIKE ' . "'%" . $connect->real_escape_string($parts[$i]) . "%'";
//}
 
$result = mysqli_query($connect, $qr);

 
while($row = $result->fetch_assoc()) {
  $a_json_row["id"] = $row['id'];
  $a_json_row["value"] = $row['name'];
  array_push($a_json, $a_json_row);
}
 
// highlight search results
//$a_json = apply_highlight($a_json_row);
 
$json = json_encode($a_json);
print $json;
?>