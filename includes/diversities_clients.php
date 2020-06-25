<?php
require_once 'db_connection.php';
$diversities_clients = mysqli_query($conn, "SELECT * FROM diversities_clients");
if (mysqli_num_rows($diversities_clients) > 0) {
  $rows = array();
  while ($row = mysqli_fetch_assoc($diversities_clients)) {
    $row['diversity_name'] = str_replace('_', ' ', $row['diversity_name']);
    $rows[] = $row;
  }
  echo json_encode($rows, JSON_UNESCAPED_UNICODE);
} else {
  echo -1;
}
