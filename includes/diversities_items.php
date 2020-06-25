<?php
require_once 'db_connection.php';
$diversities_items = mysqli_query($conn, "SELECT d.diversity_name, i.name from items i JOIN diversities_items d ON i.catalog_number = d.item_id");
if (mysqli_num_rows($diversities_items) > 0) {
  $rows = array();
  while ($row = mysqli_fetch_assoc($diversities_items)) {
    $row['diversity_name'] = str_replace('_', ' ', $row['diversity_name']);
    $rows[] = $row;
  }
  echo json_encode($rows, JSON_UNESCAPED_UNICODE);
} else {
  echo -1;
}
