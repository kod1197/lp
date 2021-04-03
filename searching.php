<?php
session_start();
$term = trim($_GET['term']);
$a_json = array();
$a_json_row = array();
$connect = mysqli_connect('localhost', 'root', '311297gamer', 'lp');
$parts = explode(' ', $term);
$p = count($parts);
$qr = "SELECT * FROM img where name like '%".$term."%' order by name limit 7";
$result = mysqli_query($connect, $qr);
while($row = $result->fetch_assoc()) {
  $a_json_row["id"] = $row['id'];
  $a_json_row["value"] = $row['name'];
  array_push($a_json, $a_json_row);
}
$json = json_encode($a_json);
print $json;
?>

